<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketList;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TicketListTest extends TestCase
{
    use RefreshDatabase;

    private TicketCategory $category;

    private User $user;

    private User $otherUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = TicketCategory::factory()->create();
        $this->user = User::factory()->create();
        $this->otherUser = User::factory()->create();
    }

    public function test_guest_cannot_access_ticket_list(): void
    {
        $this->get(route('tickets.index'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_ticket_list(): void
    {
        $this->actingAs($this->user)
            ->get(route('tickets.index'))
            ->assertOk();
    }

    public function test_user_only_sees_own_tickets(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'My ticket',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->otherUser->id,
            'category_id' => $this->category->id,
            'title' => 'Other user ticket',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->assertSee('My ticket')
            ->assertDontSee('Other user ticket');
    }

    public function test_user_can_filter_tickets_by_status(): void
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
            'title' => 'Closed ticket',
            'status' => 'cerrado',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto'])
            ->assertSee('Open ticket')
            ->assertDontSee('Closed ticket');
    }

    public function test_user_can_filter_tickets_by_priority(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'High priority ticket',
            'priority' => 'alta',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Low priority ticket',
            'priority' => 'baja',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('priority', ['alta'])
            ->assertSee('High priority ticket')
            ->assertDontSee('Low priority ticket');
    }

    public function test_user_can_search_tickets_by_title(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Computer problem',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Network issue',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('search', 'Computer')
            ->assertSee('Computer problem')
            ->assertDontSee('Network issue');
    }

    public function test_user_can_filter_tickets_by_deadline(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Ticket with deadline',
            'deadline' => now()->addDays(2),
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Ticket without deadline',
            'deadline' => null,
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('deadline', ['sin_fecha'])
            ->assertSee('Ticket without deadline')
            ->assertDontSee('Ticket with deadline');
    }

    public function test_user_can_clear_filters(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Test ticket',
            'status' => 'abierto',
            'priority' => 'alta',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['cerrado'])
            ->set('priority', ['baja'])
            ->set('search', 'nothing')
            ->assertDontSee('Test ticket')
            ->call('clearFilters')
            ->assertSee('Test ticket');
    }
}
