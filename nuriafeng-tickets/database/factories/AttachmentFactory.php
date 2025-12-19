<?php

namespace Database\Factories;

use App\Models\Attachment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    protected $model = Attachment::class;

    public function definition(): array
    {
        $extension = fake()->randomElement(['pdf', 'jpg', 'png', 'docx', 'xlsx']);
        $mimeTypes = [
            'pdf' => 'application/pdf',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ];

        return [
            'attachable_type' => Ticket::class,
            'attachable_id' => Ticket::factory(),
            'user_id' => User::factory(),
            'original_name' => fake()->word().'.'.$extension,
            'stored_name' => fake()->uuid().'.'.$extension,
            'mime_type' => $mimeTypes[$extension],
            'size' => fake()->numberBetween(1024, 5242880),
            'disk' => 'local',
            'path' => 'attachments/tickets/'.fake()->uuid().'.'.$extension,
        ];
    }

    public function forTicket(Ticket $ticket): static
    {
        return $this->state(fn (array $attributes) => [
            'attachable_type' => Ticket::class,
            'attachable_id' => $ticket->id,
        ]);
    }

    public function image(): static
    {
        return $this->state(fn (array $attributes) => [
            'original_name' => fake()->word().'.jpg',
            'stored_name' => fake()->uuid().'.jpg',
            'mime_type' => 'image/jpeg',
            'path' => 'attachments/tickets/'.fake()->uuid().'.jpg',
        ]);
    }

    public function pdf(): static
    {
        return $this->state(fn (array $attributes) => [
            'original_name' => fake()->word().'.pdf',
            'stored_name' => fake()->uuid().'.pdf',
            'mime_type' => 'application/pdf',
            'path' => 'attachments/tickets/'.fake()->uuid().'.pdf',
        ]);
    }
}
