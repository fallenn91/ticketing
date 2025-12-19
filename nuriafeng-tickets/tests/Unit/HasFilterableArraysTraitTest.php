<?php

namespace Tests\Unit;

use App\Livewire\Tickets\TicketList;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HasFilterableArraysTraitTest extends TestCase
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

    public function test_toggle_filter_adds_value_to_array(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->assertSet('status', [])
            ->call('toggleFilter', 'status', 'abierto')
            ->assertSet('status', ['abierto']);
    }

    public function test_toggle_filter_removes_existing_value(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto'])
            ->call('toggleFilter', 'status', 'abierto')
            ->assertSet('status', []);
    }

    public function test_toggle_filter_ignores_invalid_field(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->call('toggleFilter', 'invalid_field', 'value')
            ->assertStatus(200);
    }

    public function test_clear_filter_empties_field_array(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto', 'cerrado'])
            ->call('clearFilter', 'status')
            ->assertSet('status', []);
    }

    public function test_clear_filter_ignores_invalid_field(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto'])
            ->call('clearFilter', 'invalid_field')
            ->assertSet('status', ['abierto']);
    }

    public function test_remove_filter_removes_specific_value(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto', 'cerrado'])
            ->call('removeFilter', 'status', 'abierto')
            ->assertSet('status', ['cerrado']);
    }

    public function test_remove_filter_ignores_nonexistent_value(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto'])
            ->call('removeFilter', 'status', 'cerrado')
            ->assertSet('status', ['abierto']);
    }

    public function test_sort_by_toggles_direction_on_same_field(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('sortField', 'created_at')
            ->set('sortDirection', 'asc')
            ->call('sortBy', 'created_at')
            ->assertSet('sortField', 'created_at')
            ->assertSet('sortDirection', 'desc')
            ->call('sortBy', 'created_at')
            ->assertSet('sortDirection', 'asc');
    }

    public function test_sort_by_sets_asc_on_new_field(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('sortField', 'created_at')
            ->set('sortDirection', 'desc')
            ->call('sortBy', 'priority')
            ->assertSet('sortField', 'priority')
            ->assertSet('sortDirection', 'asc');
    }

    public function test_set_sort_direction_accepts_valid_directions(): void
    {
        $component = Livewire::actingAs($this->user)
            ->test(TicketList::class);

        $component
            ->call('setSortDirection', 'asc')
            ->assertSet('sortDirection', 'asc');

        $component
            ->call('setSortDirection', 'desc')
            ->assertSet('sortDirection', 'desc');
    }

    public function test_set_sort_direction_ignores_invalid_direction(): void
    {
        Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('sortDirection', 'asc')
            ->call('setSortDirection', 'invalid')
            ->assertSet('sortDirection', 'asc');
    }

    public function test_get_active_filters_returns_structured_array(): void
    {
        $component = Livewire::actingAs($this->user)
            ->test(TicketList::class)
            ->set('status', ['abierto', 'cerrado'])
            ->set('priority', ['alta']);

        $activeFilters = $component->get('activeFilters');

        $this->assertIsArray($activeFilters);
        $this->assertCount(3, $activeFilters);

        $this->assertEquals('status', $activeFilters[0]['field']);
        $this->assertEquals('abierto', $activeFilters[0]['value']);
        $this->assertEquals('Abierto', $activeFilters[0]['label']);

        $this->assertEquals('status', $activeFilters[1]['field']);
        $this->assertEquals('cerrado', $activeFilters[1]['value']);
        $this->assertEquals('Cerrado', $activeFilters[1]['label']);

        $this->assertEquals('priority', $activeFilters[2]['field']);
        $this->assertEquals('alta', $activeFilters[2]['value']);
        $this->assertEquals('Alta', $activeFilters[2]['label']);
    }
}
