<?php

namespace Tests\Unit;

use App\Models\Attachment;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use App\Services\AttachmentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AttachmentServiceTest extends TestCase
{
    use RefreshDatabase;

    private AttachmentService $service;

    private User $user;

    private TicketCategory $category;

    private Ticket $ticket;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
        $this->service = new AttachmentService;
        $this->user = User::factory()->create();
        $this->category = TicketCategory::factory()->create();
        $this->ticket = Ticket::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
        ]);
    }

    public function test_store_for_model_creates_attachment_records(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, [$file], 'tickets');

        $this->assertDatabaseCount('attachments', 1);
        $this->assertDatabaseHas('attachments', [
            'attachable_type' => Ticket::class,
            'attachable_id' => $this->ticket->id,
            'original_name' => 'test.jpg',
        ]);
    }

    public function test_store_for_model_handles_multiple_files(): void
    {
        $files = [
            UploadedFile::fake()->image('image1.jpg'),
            UploadedFile::fake()->create('document.pdf', 500),
            UploadedFile::fake()->create('spreadsheet.xlsx', 300),
        ];

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, $files, 'tickets');

        $this->assertDatabaseCount('attachments', 3);
        $this->assertEquals(3, $this->ticket->attachments()->count());

        $this->assertDatabaseHas('attachments', ['original_name' => 'image1.jpg']);
        $this->assertDatabaseHas('attachments', ['original_name' => 'document.pdf']);
        $this->assertDatabaseHas('attachments', ['original_name' => 'spreadsheet.xlsx']);
    }

    public function test_store_for_model_generates_uuid_filenames(): void
    {
        $file = UploadedFile::fake()->image('original.jpg');

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, [$file], 'tickets');

        $attachment = Attachment::first();

        $this->assertNotEquals('original.jpg', $attachment->stored_name);
        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}\.jpg$/',
            $attachment->stored_name
        );
    }

    public function test_store_for_model_stores_correct_metadata(): void
    {
        $file = UploadedFile::fake()->image('photo.png', 800, 600);

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, [$file], 'tickets');

        $attachment = Attachment::first();

        $this->assertEquals('photo.png', $attachment->original_name);
        $this->assertEquals('image/png', $attachment->mime_type);
        $this->assertEquals('local', $attachment->disk);
        $this->assertEquals($this->user->id, $attachment->user_id);
        $this->assertEquals(Ticket::class, $attachment->attachable_type);
        $this->assertEquals($this->ticket->id, $attachment->attachable_id);
        $this->assertGreaterThan(0, $attachment->size);
    }

    public function test_store_single_file_saves_to_correct_subdirectory(): void
    {
        $file = UploadedFile::fake()->create('document.pdf', 1024);

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, [$file], 'tickets');

        $attachment = Attachment::first();

        $this->assertStringStartsWith('attachments/tickets/', $attachment->path);

        Storage::disk('local')->assertExists($attachment->path);
    }

    public function test_store_single_file_preserves_original_extension(): void
    {
        $files = [
            UploadedFile::fake()->image('test.jpg'),
            UploadedFile::fake()->create('document.pdf', 500),
            UploadedFile::fake()->create('spreadsheet.xlsx', 300),
            UploadedFile::fake()->image('photo.png'),
        ];

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, $files, 'tickets');

        $attachments = Attachment::all();

        $this->assertStringEndsWith('.jpg', $attachments[0]->stored_name);
        $this->assertStringEndsWith('.pdf', $attachments[1]->stored_name);
        $this->assertStringEndsWith('.xlsx', $attachments[2]->stored_name);
        $this->assertStringEndsWith('.png', $attachments[3]->stored_name);
    }

    public function test_store_single_file_captures_user_id(): void
    {
        $file = UploadedFile::fake()->image('test.jpg');

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, [$file], 'tickets');

        $attachment = Attachment::first();

        $this->assertEquals($this->user->id, $attachment->user_id);
    }

    public function test_store_single_file_captures_mime_type_and_size(): void
    {
        $file = UploadedFile::fake()->create('document.pdf', 1024);

        $this->actingAs($this->user);

        $this->service->storeForModel($this->ticket, [$file], 'tickets');

        $attachment = Attachment::first();

        $this->assertEquals('application/pdf', $attachment->mime_type);
        $this->assertEquals(1024 * 1024, $attachment->size);
    }
}
