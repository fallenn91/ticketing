<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketCreate;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TicketCreateTest extends TestCase
{
    use RefreshDatabase;

    private TicketCategory $category;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = TicketCategory::factory()->create();
        $this->user = User::factory()->create();
    }

    public function test_guest_cannot_access_ticket_create_page(): void
    {
        $this->get(route('tickets.create'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_ticket_create_page(): void
    {
        $this->actingAs($this->user)
            ->get(route('tickets.create'))
            ->assertOk();
    }

    public function test_user_can_create_ticket_with_valid_data(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description for the ticket')
            ->set('type', 'incidencia')
            ->set('priority', 'media')
            ->set('category_id', $this->category->id)
            ->call('save')
            ->assertRedirect();

        $this->assertDatabaseHas('tickets', [
            'title' => 'Test ticket title',
            'user_id' => $this->user->id,
            'status' => 'abierto',
        ]);
    }

    public function test_ticket_requires_title(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', '')
            ->set('description', 'This is a test description')
            ->call('save')
            ->assertHasErrors(['title' => 'required']);
    }

    public function test_ticket_title_must_be_at_least_5_characters(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test')
            ->set('description', 'This is a test description')
            ->call('save')
            ->assertHasErrors(['title' => 'min']);
    }

    public function test_ticket_requires_description(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', '')
            ->call('save')
            ->assertHasErrors(['description' => 'required']);
    }

    public function test_ticket_description_must_be_at_least_10_characters(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'Short')
            ->call('save')
            ->assertHasErrors(['description' => 'min']);
    }

    public function test_ticket_type_must_be_valid(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description')
            ->set('type', 'invalid')
            ->call('save')
            ->assertHasErrors(['type' => 'in']);
    }

    public function test_ticket_priority_must_be_valid(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description')
            ->set('priority', 'invalid')
            ->call('save')
            ->assertHasErrors(['priority' => 'in']);
    }

    public function test_new_ticket_has_status_abierto(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description for the ticket')
            ->set('type', 'incidencia')
            ->set('priority', 'alta')
            ->call('save');

        $ticket = Ticket::where('user_id', $this->user->id)->first();
        $this->assertEquals('abierto', $ticket->status);
    }

    public function test_new_ticket_is_assigned_to_creator(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description for the ticket')
            ->call('save');

        $ticket = Ticket::where('title', 'Test ticket title')->first();
        $this->assertEquals($this->user->id, $ticket->user_id);
    }
}
