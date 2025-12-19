<?php

namespace App\Services;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AttachmentService
{
    /**
     * Store attachments for a given model.
     *
     * @param  Model  $attachable  The model to attach files to (Ticket, TicketComment, etc.)
     * @param  array<UploadedFile>  $files  Array of uploaded files
     * @param  string  $subdirectory  Subdirectory within 'attachments/' (e.g., 'tickets', 'comments')
     */
    public function storeForModel(Model $attachable, array $files, string $subdirectory): void
    {
        foreach ($files as $file) {
            $this->storeSingleFile($attachable, $file, $subdirectory);
        }
    }

    protected function storeSingleFile(Model $attachable, UploadedFile $file, string $subdirectory): Attachment
    {
        $storedName = Str::uuid().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs("attachments/{$subdirectory}", $storedName, 'local');

        return Attachment::create([
            'attachable_type' => get_class($attachable),
            'attachable_id' => $attachable->id,
            'user_id' => Auth::id(),
            'original_name' => $file->getClientOriginalName(),
            'stored_name' => $storedName,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'disk' => 'local',
            'path' => $path,
        ]);
    }
}
