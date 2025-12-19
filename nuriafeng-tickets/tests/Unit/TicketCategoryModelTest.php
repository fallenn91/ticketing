<?php

namespace Tests\Unit;

use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketCategoryModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_active_scope_returns_only_active_categories(): void
    {
        // Create active categories
        TicketCategory::factory()->count(3)->create(['active' => true]);

        // Create inactive categories
        TicketCategory::factory()->count(2)->create(['active' => false]);

        // Get only active categories
        $activeCategories = TicketCategory::active()->get();

        // Assert only active categories are returned
        $this->assertCount(3, $activeCategories);
        $activeCategories->each(function ($category) {
            $this->assertTrue($category->active);
        });
    }

    public function test_active_scope_excludes_inactive_categories(): void
    {
        // Create active category
        TicketCategory::factory()->create(['active' => true]);

        // Create inactive categories
        $inactiveCategory1 = TicketCategory::factory()->create(['active' => false]);
        $inactiveCategory2 = TicketCategory::factory()->create(['active' => false]);

        // Get active categories
        $activeCategories = TicketCategory::active()->get();

        // Assert inactive categories are not in the results
        $this->assertFalse($activeCategories->contains($inactiveCategory1));
        $this->assertFalse($activeCategories->contains($inactiveCategory2));
    }

    public function test_category_has_many_tickets_relationship(): void
    {
        // Create a category
        $category = TicketCategory::factory()->create(['active' => true]);

        // Create tickets associated with the category
        $tickets = Ticket::factory()->count(3)->create([
            'category_id' => $category->id,
        ]);

        // Refresh the category to load relationships
        $category->refresh();

        // Assert the relationship returns the correct tickets
        $this->assertCount(3, $category->tickets);
        $this->assertInstanceOf(Ticket::class, $category->tickets->first());

        // Assert all tickets belong to this category
        $category->tickets->each(function ($ticket) use ($category) {
            $this->assertEquals($category->id, $ticket->category_id);
        });
    }

    public function test_category_fillable_attributes(): void
    {
        // Create a category using mass assignment with fillable attributes
        $categoryData = [
            'name' => 'Test Category',
            'description' => 'This is a test category description',
            'active' => true,
        ];

        $category = TicketCategory::create($categoryData);

        // Assert the category was created with the correct attributes
        $this->assertDatabaseHas('ticket_categories', [
            'name' => 'Test Category',
            'description' => 'This is a test category description',
            'active' => true,
        ]);

        // Assert the attributes match
        $this->assertEquals('Test Category', $category->name);
        $this->assertEquals('This is a test category description', $category->description);
        $this->assertTrue($category->active);
    }
}
