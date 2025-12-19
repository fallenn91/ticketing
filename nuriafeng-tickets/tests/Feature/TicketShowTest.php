<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketShow;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TicketShowTest extends TestCase
{
    use RefreshDatabase;

    private TicketCategory $category;

    private User $user;

    private User $otherUser;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = TicketCategory::factory()->create();
        $this->user = User::factory()->create(['is_admin' => false]);
        $this->otherUser = User::factory()->create(['is_admin' => false]);
        $this->admin = User::factory()->create(['is_admin' => true]);
    }

    public function test_guest_cannot_access_ticket_show(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->get(route('tickets.show', $ticket))
            ->assertRedirect(route('login'));
    }

    public function test_user_can_view_own_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'My test ticket',
        ]);

        $this->actingAs($this->user)
            ->get(route('tickets.show', $ticket))
            ->assertOk()
            ->assertSee('My test ticket');
    }

    public function test_user_cannot_view_other_user_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->otherUser->id,
            'category_id' => $this->category->id,
        ]);

        $this->actingAs($this->user)
            ->get(route('tickets.show', $ticket))
            ->assertForbidden();
    }

    public function test_admin_can_view_any_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'User ticket for admin',
        ]);

        $this->actingAs($this->admin)
            ->get(route('tickets.show', $ticket))
            ->assertOk()
            ->assertSee('User ticket for admin');
    }

    public function test_admin_can_update_ticket_status_inline(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('status', 'en_proceso')
            ->assertDispatched('saved');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'status' => 'en_proceso',
        ]);
    }

    public function test_admin_can_update_ticket_priority_inline(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'media',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('priority', 'alta')
            ->assertDispatched('saved');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'priority' => 'alta',
        ]);
    }

    public function test_admin_can_update_assigned_to_id_inline(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'assigned_to_id' => null,
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('assigned_to_id', $this->otherUser->id)
            ->assertDispatched('saved');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'assigned_to_id' => $this->otherUser->id,
        ]);
    }

    public function test_admin_can_update_category_id_inline(): void
    {
        $newCategory = TicketCategory::factory()->create();
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('category_id', $newCategory->id)
            ->assertDispatched('saved');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'category_id' => $newCategory->id,
        ]);
    }

    public function test_user_cannot_update_admin_fields(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('status', 'cerrado')
            ->assertForbidden();

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'status' => 'abierto',
        ]);
    }

    public function test_owner_can_update_deadline(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
            'deadline' => null,
        ]);

        $newDeadline = now()->addDays(7)->format('Y-m-d');

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('deadline', $newDeadline)
            ->assertDispatched('saved');

        $ticket->refresh();
        $this->assertEquals($newDeadline, $ticket->deadline->format('Y-m-d'));
    }

    public function test_owner_can_save_title_and_description(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
            'description' => 'Original description',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'Updated title here')
            ->set('description', 'Updated description here')
            ->call('saveTicketFields')
            ->assertDispatched('saved');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'title' => 'Updated title here',
            'description' => 'Updated description here',
        ]);
    }

    public function test_save_ticket_fields_validates_title(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'abc')
            ->call('saveTicketFields')
            ->assertHasErrors(['title']);
    }

    public function test_save_ticket_fields_validates_description(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('description', 'short')
            ->call('saveTicketFields')
            ->assertHasErrors(['description']);
    }

    public function test_cancel_editing_all_restores_original_values(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
            'description' => 'Original description here',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'Changed title')
            ->set('description', 'Changed description')
            ->set('editingTitle', true)
            ->set('editingDescription', true)
            ->call('cancelEditingAll')
            ->assertSet('title', 'Original title')
            ->assertSet('description', 'Original description here')
            ->assertSet('editingTitle', false)
            ->assertSet('editingDescription', false);
    }

    public function test_user_can_add_comment(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('newComment', 'This is a test comment')
            ->call('addComment')
            ->assertSet('newComment', '');

        $this->assertDatabaseHas('ticket_comments', [
            'ticket_id' => $ticket->id,
            'user_id' => $this->user->id,
            'body' => 'This is a test comment',
        ]);
    }

    public function test_comment_requires_minimum_length(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('newComment', 'ab')
            ->call('addComment')
            ->assertHasErrors(['newComment']);
    }

    public function test_back_route_returns_admin_for_admin_from_admin(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->actingAs($this->admin)
            ->get(route('tickets.show', ['ticket' => $ticket, 'from' => 'admin']))
            ->assertOk();

        $component = Livewire::actingAs($this->admin)
            ->withQueryParams(['from' => 'admin'])
            ->test(TicketShow::class, ['ticket' => $ticket]);

        $this->assertEquals(route('admin.tickets'), $component->get('backRoute'));
    }

    public function test_back_route_returns_index_by_default(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $component = Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket]);

        $this->assertEquals(route('tickets.index'), $component->get('backRoute'));
    }
}
