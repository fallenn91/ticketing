<?php

namespace Tests\Unit;

use App\Models\Attachment;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HasAttachmentsTraitTest extends TestCase
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

    public function test_deleting_model_removes_attachment_records(): void
    {
        Storage::fake('local');

        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        // Create 3 attachments for the ticket
        Attachment::factory()->count(3)->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->user->id,
        ]);

        $this->assertDatabaseCount('attachments', 3);

        // Delete the ticket
        $ticket->delete();

        // Verify all attachment records are deleted
        $this->assertDatabaseCount('attachments', 0);
    }

    public function test_deleting_model_removes_physical_files(): void
    {
        Storage::fake('local');

        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        // Create attachments with specific file paths
        $attachment1 = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->user->id,
            'disk' => 'local',
            'path' => 'attachments/tickets/file1.pdf',
        ]);

        $attachment2 = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->user->id,
            'disk' => 'local',
            'path' => 'attachments/tickets/file2.jpg',
        ]);

        // Put actual files in storage
        Storage::disk('local')->put($attachment1->path, 'fake pdf content');
        Storage::disk('local')->put($attachment2->path, 'fake image content');

        // Verify files exist before deletion
        Storage::disk('local')->assertExists($attachment1->path);
        Storage::disk('local')->assertExists($attachment2->path);

        // Delete the ticket
        $ticket->delete();

        // Verify physical files are deleted from storage
        Storage::disk('local')->assertMissing($attachment1->path);
        Storage::disk('local')->assertMissing($attachment2->path);
    }

    public function test_model_has_attachments_relationship(): void
    {
        Storage::fake('local');

        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        // Create attachments for the ticket
        Attachment::factory()->count(3)->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->user->id,
        ]);

        // Verify the relationship works
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $ticket->attachments);
        $this->assertCount(3, $ticket->attachments);

        // Verify each attachment is an Attachment instance
        foreach ($ticket->attachments as $attachment) {
            $this->assertInstanceOf(Attachment::class, $attachment);
            $this->assertEquals($ticket->id, $attachment->attachable_id);
            $this->assertEquals(Ticket::class, $attachment->attachable_type);
        }
    }
}
