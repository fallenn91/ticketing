<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class TicketDeadlineFilterTest extends TestCase
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

    public function test_deadline_filter_vencido_returns_overdue_open_tickets(): void
    {
        // Create an overdue ticket with open status
        $overdueTicket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDays(2),
            'status' => 'abierto',
        ]);

        // Create a ticket due in the future
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDays(2),
            'status' => 'abierto',
        ]);

        $results = Ticket::deadlineFilter(['vencido'])->get();

        $this->assertCount(1, $results);
        $this->assertEquals($overdueTicket->id, $results->first()->id);
    }

    public function test_deadline_filter_vencido_excludes_closed_tickets(): void
    {
        // Create an overdue ticket with 'cerrado' status
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDays(2),
            'status' => 'cerrado',
        ]);

        // Create an overdue ticket with 'resuelto' status
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDays(2),
            'status' => 'resuelto',
        ]);

        // Create an overdue ticket with 'en_proceso' status (should be included)
        $overdueOpenTicket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDays(2),
            'status' => 'en_proceso',
        ]);

        $results = Ticket::deadlineFilter(['vencido'])->get();

        $this->assertCount(1, $results);
        $this->assertEquals($overdueOpenTicket->id, $results->first()->id);
    }

    public function test_deadline_filter_hoy_returns_tickets_due_today(): void
    {
        // Create a ticket due today
        $todayTicket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now(),
        ]);

        // Create a ticket due tomorrow
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDay(),
        ]);

        // Create a ticket due yesterday
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDay(),
        ]);

        $results = Ticket::deadlineFilter(['hoy'])->get();

        $this->assertCount(1, $results);
        $this->assertEquals($todayTicket->id, $results->first()->id);
    }

    public function test_deadline_filter_proximos_3_dias_returns_within_3_days(): void
    {
        // Create tickets due within the next 3 days
        $today = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now(),
        ]);

        $tomorrow = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDay(),
        ]);

        $day3 = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDays(3),
        ]);

        // Create a ticket due in 4 days (should not be included)
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDays(4),
        ]);

        // Create a ticket due yesterday (should not be included)
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDay(),
        ]);

        $results = Ticket::deadlineFilter(['proximos_3_dias'])->get();

        $this->assertCount(3, $results);
        $ids = $results->pluck('id')->toArray();
        $this->assertContains($today->id, $ids);
        $this->assertContains($tomorrow->id, $ids);
        $this->assertContains($day3->id, $ids);
    }

    public function test_deadline_filter_esta_semana_returns_this_week(): void
    {
        // Create a ticket due at the start of the week
        $startOfWeek = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->startOfWeek(),
        ]);

        // Create a ticket due at the end of the week
        $endOfWeek = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->endOfWeek(),
        ]);

        // Create a ticket due next week (should not be included)
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addWeek(),
        ]);

        $results = Ticket::deadlineFilter(['esta_semana'])->get();

        $this->assertCount(2, $results);
        $ids = $results->pluck('id')->toArray();
        $this->assertContains($startOfWeek->id, $ids);
        $this->assertContains($endOfWeek->id, $ids);
    }

    public function test_deadline_filter_este_mes_returns_this_month(): void
    {
        // Create a ticket due at the start of the month
        $startOfMonth = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->startOfMonth(),
        ]);

        // Create a ticket due at the end of the month
        $endOfMonth = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->endOfMonth(),
        ]);

        // Create a ticket due next month (should not be included)
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addMonth(),
        ]);

        $results = Ticket::deadlineFilter(['este_mes'])->get();

        $this->assertCount(2, $results);
        $ids = $results->pluck('id')->toArray();
        $this->assertContains($startOfMonth->id, $ids);
        $this->assertContains($endOfMonth->id, $ids);
    }

    public function test_deadline_filter_sin_fecha_returns_without_deadline(): void
    {
        // Create tickets without deadline
        $noDeadline1 = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => null,
        ]);

        $noDeadline2 = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => null,
        ]);

        // Create a ticket with a deadline (should not be included)
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDays(5),
        ]);

        $results = Ticket::deadlineFilter(['sin_fecha'])->get();

        $this->assertCount(2, $results);
        $ids = $results->pluck('id')->toArray();
        $this->assertContains($noDeadline1->id, $ids);
        $this->assertContains($noDeadline2->id, $ids);
    }

    public function test_deadline_filter_empty_returns_all_tickets(): void
    {
        // Create tickets with various deadlines
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->subDays(2),
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => now()->addDays(2),
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'deadline' => null,
        ]);

        // When no filters are passed, all tickets should be returned
        $results = Ticket::deadlineFilter([])->get();

        $this->assertCount(3, $results);
    }
}
