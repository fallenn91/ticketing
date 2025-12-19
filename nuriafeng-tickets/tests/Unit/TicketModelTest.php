<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketComment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketModelTest extends TestCase
{
    use RefreshDatabase;

    private TicketCategory $category;

    private User $user;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = TicketCategory::factory()->create();
        $this->user = User::factory()->create();
        $this->admin = User::factory()->create(['is_admin' => true]);
    }

    public function test_ticket_belongs_to_creator(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertInstanceOf(User::class, $ticket->creator);
        $this->assertEquals($this->user->id, $ticket->creator->id);
    }

    public function test_ticket_belongs_to_assignee(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'assigned_to_id' => $this->admin->id,
        ]);

        $this->assertInstanceOf(User::class, $ticket->assignee);
        $this->assertEquals($this->admin->id, $ticket->assignee->id);
    }

    public function test_ticket_belongs_to_category(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $this->assertInstanceOf(TicketCategory::class, $ticket->category);
        $this->assertEquals($this->category->id, $ticket->category->id);
    }

    public function test_ticket_has_many_comments(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        TicketComment::factory()->count(3)->create([
            'ticket_id' => $ticket->id,
            'user_id' => $this->user->id,
        ]);

        $this->assertCount(3, $ticket->comments);
    }

    public function test_status_label_accessor_returns_correct_label(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        $this->assertEquals('Abierto', $ticket->status_label);
    }

    public function test_priority_label_accessor_returns_correct_label(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'alta',
        ]);

        $this->assertEquals('Alta', $ticket->priority_label);
    }

    public function test_type_label_accessor_returns_correct_label(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'type' => 'incidencia',
        ]);

        $this->assertEquals('Incidencia', $ticket->type_label);
    }

    public function test_search_scope_filters_by_title(): void
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

        $results = Ticket::search('Computer')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('Computer problem', $results->first()->title);
    }

    public function test_search_scope_filters_by_id(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Test ticket',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Another ticket',
        ]);

        $results = Ticket::search((string) $ticket->id)->get();

        $this->assertCount(1, $results);
        $this->assertEquals($ticket->id, $results->first()->id);
    }

    public function test_search_scope_returns_all_when_empty(): void
    {
        Ticket::factory()->count(3)->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $results = Ticket::search(null)->get();

        $this->assertCount(3, $results);
    }

    public function test_apply_filters_scope_filters_by_status(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'cerrado',
        ]);

        $results = Ticket::applyFilters(['status' => ['abierto']])->get();

        $this->assertCount(1, $results);
        $this->assertEquals('abierto', $results->first()->status);
    }

    public function test_apply_filters_scope_filters_by_priority(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'alta',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'baja',
        ]);

        $results = Ticket::applyFilters(['priority' => ['alta']])->get();

        $this->assertCount(1, $results);
        $this->assertEquals('alta', $results->first()->priority);
    }

    public function test_apply_filters_scope_filters_by_multiple_criteria(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'priority' => 'alta',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'abierto',
            'priority' => 'baja',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'cerrado',
            'priority' => 'alta',
        ]);

        $results = Ticket::applyFilters([
            'status' => ['abierto'],
            'priority' => ['alta'],
        ])->get();

        $this->assertCount(1, $results);
    }

    public function test_order_by_field_scope_orders_by_created_at(): void
    {
        $older = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'created_at' => now()->subDay(),
        ]);

        $newer = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'created_at' => now(),
        ]);

        $resultsAsc = Ticket::orderByField('created_at', 'asc')->get();
        $resultsDesc = Ticket::orderByField('created_at', 'desc')->get();

        $this->assertEquals($older->id, $resultsAsc->first()->id);
        $this->assertEquals($newer->id, $resultsDesc->first()->id);
    }

    public function test_order_by_field_scope_orders_by_priority(): void
    {
        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'baja',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'critica',
        ]);

        Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority' => 'media',
        ]);

        $resultsAsc = Ticket::orderByField('priority', 'asc')->get();

        $this->assertEquals('critica', $resultsAsc->first()->priority);
        $this->assertEquals('baja', $resultsAsc->last()->priority);
    }

    public function test_validation_rules_returns_array(): void
    {
        $rules = Ticket::validationRules();

        $this->assertIsArray($rules);
        $this->assertArrayHasKey('title', $rules);
        $this->assertArrayHasKey('description', $rules);
        $this->assertArrayHasKey('category_id', $rules);
        $this->assertArrayHasKey('type', $rules);
        $this->assertArrayHasKey('priority', $rules);
    }

    public function test_validation_messages_returns_array(): void
    {
        $messages = Ticket::validationMessages();

        $this->assertIsArray($messages);
        $this->assertArrayHasKey('title.required', $messages);
        $this->assertArrayHasKey('description.required', $messages);
    }

    public function test_get_label_for_returns_correct_label(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'status' => 'en_proceso',
            'priority' => 'critica',
            'type' => 'peticion',
        ]);

        $this->assertEquals('En Proceso', $ticket->getLabelFor('status'));
        $this->assertEquals('Crítica', $ticket->getLabelFor('priority'));
        $this->assertEquals('Petición', $ticket->getLabelFor('type'));
    }
}
