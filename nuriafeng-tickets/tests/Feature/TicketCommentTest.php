<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketShow;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketComment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TicketCommentTest extends TestCase
{
    use RefreshDatabase;

    private TicketCategory $category;

    private User $user;

    private User $admin;

    private User $otherUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = TicketCategory::factory()->create();
        $this->user = User::factory()->create(['is_admin' => false]);
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->otherUser = User::factory()->create(['is_admin' => false]);
    }

    public function test_user_can_comment_on_own_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('newComment', 'This is my comment')
            ->call('addComment');

        $this->assertDatabaseHas('ticket_comments', [
            'ticket_id' => $ticket->id,
            'user_id' => $this->user->id,
            'body' => 'This is my comment',
        ]);
    }

    public function test_admin_can_comment_on_any_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->admin)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('newComment', 'Admin comment here')
            ->call('addComment');

        $this->assertDatabaseHas('ticket_comments', [
            'ticket_id' => $ticket->id,
            'user_id' => $this->admin->id,
            'body' => 'Admin comment here',
        ]);
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

    public function test_comment_requires_body(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('newComment', '')
            ->call('addComment')
            ->assertHasErrors(['newComment' => 'required']);
    }

    public function test_ticket_shows_existing_comments(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        TicketComment::factory()->create([
            'ticket_id' => $ticket->id,
            'user_id' => $this->user->id,
            'body' => 'First comment on ticket',
        ]);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->assertSee('First comment on ticket');
    }
}
