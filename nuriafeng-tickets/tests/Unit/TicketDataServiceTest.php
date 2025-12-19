<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use App\Services\TicketDataService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class TicketDataServiceTest extends TestCase
{
    use RefreshDatabase;

    private TicketDataService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new TicketDataService();
        Cache::flush();
    }

    protected function tearDown(): void
    {
        Cache::flush();
        parent::tearDown();
    }

    public function test_get_active_categories_returns_active_only(): void
    {
        TicketCategory::factory()->create(['name' => 'Active Category', 'active' => true]);
        TicketCategory::factory()->create(['name' => 'Another Active', 'active' => true]);

        $categories = $this->service->getActiveCategories();

        $this->assertCount(2, $categories);
        $this->assertTrue($categories->every(fn($cat) => $cat->active === true));
    }

    public function test_get_active_categories_excludes_inactive(): void
    {
        TicketCategory::factory()->create(['name' => 'Active Category', 'active' => true]);
        TicketCategory::factory()->create(['name' => 'Inactive Category', 'active' => false]);

        $categories = $this->service->getActiveCategories();

        $this->assertCount(1, $categories);
        $this->assertEquals('Active Category', $categories->first()->name);
    }

    public function test_get_active_categories_orders_by_name(): void
    {
        TicketCategory::factory()->create(['name' => 'Zebra', 'active' => true]);
        TicketCategory::factory()->create(['name' => 'Alpha', 'active' => true]);
        TicketCategory::factory()->create(['name' => 'Beta', 'active' => true]);

        $categories = $this->service->getActiveCategories();

        $names = $categories->pluck('name')->toArray();
        $this->assertEquals(['Alpha', 'Beta', 'Zebra'], $names);
    }

    public function test_get_ordered_users_returns_all_users(): void
    {
        User::factory()->count(5)->create();

        $users = $this->service->getOrderedUsers();

        $this->assertCount(5, $users);
    }

    public function test_get_ordered_users_orders_by_name(): void
    {
        User::factory()->create(['name' => 'Zoe']);
        User::factory()->create(['name' => 'Alice']);
        User::factory()->create(['name' => 'Bob']);

        $users = $this->service->getOrderedUsers();

        $names = $users->pluck('name')->toArray();
        $this->assertEquals(['Alice', 'Bob', 'Zoe'], $names);
    }

    public function test_get_ticket_form_data_returns_all_options(): void
    {
        TicketCategory::factory()->create(['active' => true]);

        $data = $this->service->getTicketFormData();

        $this->assertArrayHasKey('categories', $data);
        $this->assertArrayHasKey('statuses', $data);
        $this->assertArrayHasKey('priorities', $data);
        $this->assertArrayHasKey('types', $data);
        $this->assertEquals(Ticket::STATUSES, $data['statuses']);
        $this->assertEquals(Ticket::PRIORITIES, $data['priorities']);
        $this->assertEquals(Ticket::TYPES, $data['types']);
    }

    public function test_get_ticket_form_data_includes_users_when_requested(): void
    {
        User::factory()->count(3)->create();

        $data = $this->service->getTicketFormData(includeUsers: true);

        $this->assertArrayHasKey('users', $data);
        $this->assertCount(3, $data['users']);
    }

    public function test_get_ticket_form_data_excludes_users_by_default(): void
    {
        User::factory()->count(3)->create();

        $data = $this->service->getTicketFormData();

        $this->assertArrayNotHasKey('users', $data);
    }

    public function test_get_status_stats_returns_counts_by_status(): void
    {
        $user = User::factory()->create();
        $category = TicketCategory::factory()->create(['active' => true]);

        Ticket::factory()->count(3)->create([
            'status' => 'open',
            'user_id' => $user->id,
            'ticket_category_id' => $category->id,
        ]);
        Ticket::factory()->count(2)->create([
            'status' => 'closed',
            'user_id' => $user->id,
            'ticket_category_id' => $category->id,
        ]);
        Ticket::factory()->create([
            'status' => 'in_progress',
            'user_id' => $user->id,
            'ticket_category_id' => $category->id,
        ]);

        $stats = $this->service->getStatusStats();

        $this->assertEquals(3, $stats['open']);
        $this->assertEquals(2, $stats['closed']);
        $this->assertEquals(1, $stats['in_progress']);
    }

    public function test_clear_cache_removes_cached_keys(): void
    {
        // Populate cache by calling methods
        TicketCategory::factory()->create(['active' => true]);
        User::factory()->create();
        $user = User::factory()->create();
        $category = TicketCategory::factory()->create(['active' => true]);
        Ticket::factory()->create([
            'user_id' => $user->id,
            'ticket_category_id' => $category->id,
        ]);

        $this->service->getActiveCategories();
        $this->service->getOrderedUsers();
        $this->service->getStatusStats();

        // Verify data is cached
        $this->assertTrue(Cache::has('ticket_categories_active'));
        $this->assertTrue(Cache::has('users_ordered'));
        $this->assertTrue(Cache::has('ticket_status_stats'));

        // Clear cache
        $this->service->clearCache();

        // Verify cache is cleared
        $this->assertFalse(Cache::has('ticket_categories_active'));
        $this->assertFalse(Cache::has('users_ordered'));
        $this->assertFalse(Cache::has('ticket_status_stats'));
    }
}
