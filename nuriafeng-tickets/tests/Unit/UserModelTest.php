<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_admin_returns_true_for_admin_user(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->assertTrue($admin->isAdmin());
    }

    public function test_is_admin_returns_false_for_regular_user(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->assertFalse($user->isAdmin());
    }

    public function test_user_has_many_created_tickets(): void
    {
        $category = TicketCategory::factory()->create();
        $user = User::factory()->create();

        Ticket::factory()->count(3)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $this->assertCount(3, $user->createdTickets);
    }

    public function test_user_has_many_assigned_tickets(): void
    {
        $category = TicketCategory::factory()->create();
        $creator = User::factory()->create();
        $assignee = User::factory()->create(['is_admin' => true]);

        Ticket::factory()->count(2)->create([
            'user_id' => $creator->id,
            'category_id' => $category->id,
            'assigned_to_id' => $assignee->id,
        ]);

        $this->assertCount(2, $assignee->assignedTickets);
    }
}
