<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketDeadlineMethodsTest extends TestCase
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

    public function test_is_overdue_returns_true_when_past_and_open(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'deadline' => now()->subDays(2),
        ]);

        $this->assertTrue($ticket->isOverdue());
    }

    public function test_is_overdue_returns_false_when_past_but_closed(): void
    {
        $ticketResuelto = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'resuelto',
            'deadline' => now()->subDays(2),
        ]);

        $ticketCerrado = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'cerrado',
            'deadline' => now()->subDays(2),
        ]);

        $this->assertFalse($ticketResuelto->isOverdue());
        $this->assertFalse($ticketCerrado->isOverdue());
    }

    public function test_is_overdue_returns_false_when_no_deadline(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'deadline' => null,
        ]);

        $this->assertFalse($ticket->isOverdue());
    }

    public function test_is_near_deadline_returns_true_within_days(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'deadline' => now()->addDays(2),
        ]);

        $this->assertTrue($ticket->isNearDeadline());
    }

    public function test_is_near_deadline_returns_false_when_closed(): void
    {
        $ticketResuelto = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'resuelto',
            'deadline' => now()->addDays(2),
        ]);

        $ticketCerrado = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'cerrado',
            'deadline' => now()->addDays(2),
        ]);

        $this->assertFalse($ticketResuelto->isNearDeadline());
        $this->assertFalse($ticketCerrado->isNearDeadline());
    }

    public function test_is_near_deadline_accepts_custom_days_parameter(): void
    {
        $ticketWithin5Days = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'deadline' => now()->addDays(4),
        ]);

        $ticketBeyond5Days = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'deadline' => now()->addDays(6),
        ]);

        // Default is 3 days, so ticket at day 4 should be false
        $this->assertFalse($ticketWithin5Days->isNearDeadline());

        // But with custom parameter of 5 days, ticket at day 4 should be true
        $this->assertTrue($ticketWithin5Days->isNearDeadline(5));

        // Ticket at day 6 should be false even with 5 days parameter
        $this->assertFalse($ticketBeyond5Days->isNearDeadline(5));
    }
}
