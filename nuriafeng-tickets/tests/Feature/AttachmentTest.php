<?php

namespace Tests\Feature;

use App\Livewire\Tickets\TicketCreate;
use App\Livewire\Tickets\TicketShow;
use App\Models\Attachment;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketComment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AttachmentTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private User $admin;

    private User $otherUser;

    private TicketCategory $category;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
        $this->user = User::factory()->create(['is_admin' => false]);
        $this->admin = User::factory()->create(['is_admin' => true]);
        $this->otherUser = User::factory()->create(['is_admin' => false]);
        $this->category = TicketCategory::factory()->create();
    }

    public function test_user_can_create_ticket_with_attachments(): void
    {
        $file = UploadedFile::fake()->image('screenshot.jpg', 800, 600);

        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Ticket with attachment')
            ->set('description', 'This ticket has a file attached')
            ->set('type', 'incidencia')
            ->set('priority', 'media')
            ->set('category_id', $this->category->id)
            ->set('attachments', [$file])
            ->call('save')
            ->assertRedirect();

        $ticket = Ticket::where('title', 'Ticket with attachment')->first();
        $this->assertNotNull($ticket);
        $this->assertCount(1, $ticket->attachments);
        $this->assertEquals('screenshot.jpg', $ticket->attachments->first()->original_name);
    }

    public function test_user_can_create_ticket_with_multiple_attachments(): void
    {
        $files = [
            UploadedFile::fake()->image('image1.jpg'),
            UploadedFile::fake()->create('document.pdf', 500),
            UploadedFile::fake()->create('spreadsheet.xlsx', 300),
        ];

        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Ticket with multiple files')
            ->set('description', 'This ticket has multiple files attached')
            ->set('type', 'incidencia')
            ->set('priority', 'media')
            ->set('category_id', $this->category->id)
            ->set('attachments', $files)
            ->call('save')
            ->assertRedirect();

        $ticket = Ticket::where('title', 'Ticket with multiple files')->first();
        $this->assertCount(3, $ticket->attachments);
    }

    public function test_attachment_validation_rejects_invalid_file_type(): void
    {
        $file = UploadedFile::fake()->create('malware.exe', 100);

        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description')
            ->set('type', 'incidencia')
            ->set('priority', 'media')
            ->set('category_id', $this->category->id)
            ->set('attachments', [$file])
            ->call('save')
            ->assertHasErrors(['attachments.0']);
    }

    public function test_maximum_five_attachments_per_upload(): void
    {
        $files = [];
        for ($i = 0; $i < 6; $i++) {
            $files[] = UploadedFile::fake()->image("image{$i}.jpg");
        }

        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket title')
            ->set('description', 'This is a test description')
            ->set('type', 'incidencia')
            ->set('priority', 'media')
            ->set('category_id', $this->category->id)
            ->set('attachments', $files)
            ->call('save')
            ->assertHasErrors(['attachments']);
    }

    public function test_user_can_add_comment_with_attachment(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $file = UploadedFile::fake()->create('document.pdf', 500);

        Livewire::actingAs($this->user)
            ->test(TicketShow::class, ['ticket' => $ticket])
            ->set('newComment', 'Comment with attachment')
            ->set('commentAttachments', [$file])
            ->call('addComment');

        $comment = $ticket->comments()->first();
        $this->assertNotNull($comment);
        $this->assertCount(1, $comment->attachments);
        $this->assertEquals('document.pdf', $comment->attachments->first()->original_name);
    }

    public function test_user_can_download_own_ticket_attachment(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Storage::disk('local')->put('attachments/tickets/test.pdf', 'fake content');

        $attachment = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->user->id,
            'path' => 'attachments/tickets/test.pdf',
            'original_name' => 'document.pdf',
            'disk' => 'local',
        ]);

        $this->actingAs($this->user)
            ->get(route('attachments.download', $attachment))
            ->assertOk();
    }

    public function test_user_cannot_download_other_user_ticket_attachment(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->otherUser->id,
            'category_id' => $this->category->id,
        ]);

        Storage::disk('local')->put('attachments/tickets/test.pdf', 'fake content');

        $attachment = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->otherUser->id,
            'path' => 'attachments/tickets/test.pdf',
            'disk' => 'local',
        ]);

        $this->actingAs($this->user)
            ->get(route('attachments.download', $attachment))
            ->assertForbidden();
    }

    public function test_admin_can_download_any_attachment(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        Storage::disk('local')->put('attachments/tickets/test.pdf', 'fake content');

        $attachment = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'user_id' => $this->user->id,
            'path' => 'attachments/tickets/test.pdf',
            'disk' => 'local',
        ]);

        $this->actingAs($this->admin)
            ->get(route('attachments.download', $attachment))
            ->assertOk();
    }

    public function test_user_can_download_comment_attachment_from_own_ticket(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $comment = TicketComment::factory()->create([
            'ticket_id' => $ticket->id,
            'user_id' => $this->admin->id,
        ]);

        Storage::disk('local')->put('attachments/comments/test.pdf', 'fake content');

        $attachment = Attachment::factory()->create([
            'attachable_type' => TicketComment::class,
            'attachable_id' => $comment->id,
            'user_id' => $this->admin->id,
            'path' => 'attachments/comments/test.pdf',
            'disk' => 'local',
        ]);

        $this->actingAs($this->user)
            ->get(route('attachments.download', $attachment))
            ->assertOk();
    }

    public function test_attachments_deleted_when_ticket_deleted(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->admin->id,
            'category_id' => $this->category->id,
        ]);

        Storage::disk('local')->put('attachments/tickets/test.pdf', 'content');

        $attachment = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
            'path' => 'attachments/tickets/test.pdf',
            'disk' => 'local',
        ]);

        $attachmentId = $attachment->id;
        $filePath = $attachment->path;

        $ticket->delete();

        $this->assertDatabaseMissing('attachments', ['id' => $attachmentId]);
        Storage::disk('local')->assertMissing($filePath);
    }

    public function test_attachment_stores_correct_metadata(): void
    {
        $file = UploadedFile::fake()->image('test-image.png', 100, 100);

        Livewire::actingAs($this->user)
            ->test(TicketCreate::class)
            ->set('title', 'Test ticket for metadata')
            ->set('description', 'This is a test description')
            ->set('type', 'incidencia')
            ->set('priority', 'media')
            ->set('category_id', $this->category->id)
            ->set('attachments', [$file])
            ->call('save');

        $ticket = Ticket::where('title', 'Test ticket for metadata')->first();
        $attachment = $ticket->attachments->first();

        $this->assertEquals('test-image.png', $attachment->original_name);
        $this->assertEquals('image/png', $attachment->mime_type);
        $this->assertEquals('local', $attachment->disk);
        $this->assertEquals($this->user->id, $attachment->user_id);
        $this->assertStringStartsWith('attachments/tickets/', $attachment->path);
    }

    public function test_attachment_is_image_helper(): void
    {
        $attachment = Attachment::factory()->image()->create();
        $this->assertTrue($attachment->isImage());

        $attachment = Attachment::factory()->pdf()->create();
        $this->assertFalse($attachment->isImage());
    }

    public function test_attachment_formatted_size_attribute(): void
    {
        $attachment = Attachment::factory()->create(['size' => 1024]);
        $this->assertEquals('1.00 KB', $attachment->formatted_size);

        $attachment = Attachment::factory()->create(['size' => 1048576]);
        $this->assertEquals('1.00 MB', $attachment->formatted_size);
    }

    public function test_attachment_icon_type_attribute(): void
    {
        $attachment = Attachment::factory()->image()->create();
        $this->assertEquals('image', $attachment->icon_type);

        $attachment = Attachment::factory()->pdf()->create();
        $this->assertEquals('pdf', $attachment->icon_type);
    }

    public function test_guest_cannot_download_attachment(): void
    {
        $ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);

        $attachment = Attachment::factory()->create([
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
        ]);

        $this->get(route('attachments.download', $attachment))
            ->assertRedirect(route('login'));
    }
}
