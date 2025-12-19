<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketManagement;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TicketManagementFunctionalTest extends TestCase
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

    public function test_admin_can_update_ticket_status(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->call('updateTicketStatus', $ticket->id, 'cerrado');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'status' => 'cerrado',
        ]);
    }

    public function test_update_ticket_status_validates_value(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        // Test all valid statuses
        foreach (['abierto', 'en_proceso', 'resuelto', 'cerrado'] as $status) {
            Livewire::actingAs($this->admin)
                ->test(TicketManagement::class)
                ->call('updateTicketStatus', $ticket->id, $status);

            $this->assertDatabaseHas('tickets', [
                'id' => $ticket->id,
                'status' => $status,
            ]);
        }
    }

    public function test_update_ticket_status_ignores_invalid(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->call('updateTicketStatus', $ticket->id, 'invalid_status');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'status' => 'abierto', // Status should remain unchanged
        ]);
    }

    public function test_non_admin_cannot_update_ticket_status(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketManagement::class)
            ->call('updateTicketStatus', $ticket->id, 'cerrado')
            ->assertForbidden();

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'status' => 'abierto', // Status should remain unchanged
        ]);
    }

    public function test_admin_can_update_ticket_priority(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'baja',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->call('updateTicketPriority', $ticket->id, 'critica');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'priority' => 'critica',
        ]);
    }

    public function test_update_ticket_priority_validates_value(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'baja',
        ]);

        // Test all valid priorities
        foreach (['baja', 'media', 'alta', 'critica'] as $priority) {
            Livewire::actingAs($this->admin)
                ->test(TicketManagement::class)
                ->call('updateTicketPriority', $ticket->id, $priority);

            $this->assertDatabaseHas('tickets', [
                'id' => $ticket->id,
                'priority' => $priority,
            ]);
        }
    }

    public function test_update_ticket_priority_ignores_invalid(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'media',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketManagement::class)
            ->call('updateTicketPriority', $ticket->id, 'invalid_priority');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'priority' => 'media', // Priority should remain unchanged
        ]);
    }

    public function test_non_admin_cannot_update_ticket_priority(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'baja',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketManagement::class)
            ->call('updateTicketPriority', $ticket->id, 'alta')
            ->assertForbidden();

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'priority' => 'baja', // Priority should remain unchanged
        ]);
    }
}
