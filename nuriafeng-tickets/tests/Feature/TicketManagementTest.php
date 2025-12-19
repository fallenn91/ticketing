<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketManagement;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TicketManagementTest extends TestCase
{
    use RefreshDatabase;

    private TicketCategory $category;

    private User $user;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = TicketCategory::factory()->create();
        $this->user = User::factory()->create(['is_admin' => false]);
        $this->admin = User::factory()->create(['is_admin' => true]);
    }

    public function test_guest_cannot_access_admin_panel(): void
    {
        $this->get(route('admin.tickets'))
            ->assertRedirect(route('login'));
    }

    public function test_regular_user_cannot_access_admin_panel(): void
    {
        $this->actingAs($this->user)
            ->get(route('admin.tickets'))
            ->assertForbidden();
    }

    public function test_admin_can_access_admin_panel(): void
    {
        $this->actingAs($this->admin)
            ->get(route('admin.tickets'))
            ->assertOk();
    }

    public function test_admin_sees_all_tickets(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'User ticket',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
            'title' => 'Admin ticket',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->assertSee('User ticket')
            ->assertSee('Admin ticket');
    }

    public function test_admin_can_filter_by_status(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Open ticket',
            'status' => 'abierto',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'In progress ticket',
            'status' => 'en_proceso',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->set('status', ['en_proceso'])
            ->assertSee('In progress ticket')
            ->assertDontSee('Open ticket');
    }

    public function test_admin_can_filter_by_type(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Incident ticket',
            'type' => 'incidencia',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Request ticket',
            'type' => 'peticion',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->set('type', ['peticion'])
            ->assertSee('Request ticket')
            ->assertDontSee('Incident ticket');
    }

    public function test_admin_can_filter_by_category(): void
    {
        $category2 = TicketCategory::factory()->create(['name' => 'Software']);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Category 1 ticket',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $category2->id,
            'title' => 'Software ticket',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->set('category', [$category2->id])
            ->assertSee('Software ticket')
            ->assertDontSee('Category 1 ticket');
    }
}
