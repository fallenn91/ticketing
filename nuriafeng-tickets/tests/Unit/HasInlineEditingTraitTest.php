<?php

namespace Tests\Unit;

use App\Livewire\Tickets\TicketShow;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HasInlineEditingTraitTest extends TestCase
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

    public function test_start_editing_sets_editing_flag_to_true(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->call('startEditing', 'title')
            ->assertSet('editingTitle', true);
    }

    public function test_start_editing_authorizes_update_permission(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->call('startEditing', 'title')
            ->assertForbidden();
    }

    public function test_start_editing_ignores_invalid_field(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        $component = Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->call('startEditing', 'invalid_field');

        // Should not throw exception and should not set any editing flag
        $this->assertFalse(property_exists($component, 'editingInvalidField') && $component->get('editingInvalidField'));
    }

    public function test_cancel_editing_restores_original_value(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
            'description' => 'Original description',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'Modified title')
            ->call('cancelEditing', 'title')
            ->assertSet('title', 'Original title');
    }

    public function test_cancel_editing_sets_editing_flag_to_false(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('editingTitle', true)
            ->call('cancelEditing', 'title')
            ->assertSet('editingTitle', false);
    }

    public function test_save_field_updates_model(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'Updated title field')
            ->call('saveField', 'title');

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'title' => 'Updated title field',
        ]);
    }

    public function test_save_field_validates_using_ticket_rules(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'abc')
            ->call('saveField', 'title')
            ->assertHasErrors(['title' => 'El título debe tener al menos 5 caracteres.']);

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'title' => 'Original title',
        ]);
    }

    public function test_save_field_authorizes_update_permission(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('title', 'New title here')
            ->call('saveField', 'title')
            ->assertForbidden();

        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'title' => 'Original title',
        ]);
    }

    public function test_save_field_dispatches_saved_event(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'description' => 'Original description here',
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('description', 'Updated description for testing')
            ->call('saveField', 'description')
            ->assertDispatched('saved');
    }

    public function test_save_field_ignores_invalid_field(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Original title',
        ]);

        $component = Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->call('saveField', 'invalid_field');

        // Should not throw exception and should not update anything
        $this->assertDatabaseHas('tickets', [
            'id' => $ticket->id,
            'title' => 'Original title',
        ]);
    }
}
