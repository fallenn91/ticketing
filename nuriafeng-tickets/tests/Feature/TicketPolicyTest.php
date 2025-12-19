<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketPolicyTest extends TestCase
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

    public function test_user_can_view_own_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertTrue($this->user->can('view', $ticket));
    }

    public function test_user_cannot_view_other_user_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->otherUser->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertFalse($this->user->can('view', $ticket));
    }

    public function test_admin_can_view_any_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertTrue($this->admin->can('view', $ticket));
    }

    public function test_only_admin_can_update_status(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertFalse($this->user->can('updateStatus', $ticket));
        $this->assertTrue($this->admin->can('updateStatus', $ticket));
    }

    public function test_only_admin_can_assign_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertFalse($this->user->can('assign', $ticket));
        $this->assertTrue($this->admin->can('assign', $ticket));
    }

    public function test_user_can_comment_on_own_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertTrue($this->user->can('comment', $ticket));
    }

    public function test_user_cannot_comment_on_other_user_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->otherUser->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertFalse($this->user->can('comment', $ticket));
    }

    public function test_admin_can_comment_on_any_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertTrue($this->admin->can('comment', $ticket));
    }

    public function test_only_admin_can_delete_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertFalse($this->user->can('delete', $ticket));
        $this->assertTrue($this->admin->can('delete', $ticket));
    }
}
