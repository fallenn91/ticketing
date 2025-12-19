<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AttachmentController
{
    use AuthorizesRequests;

    public function download(Attachment $attachment): StreamedResponse
    {
        $ticket = $this->getParentTicket($attachment);

        $this->authorize('view', $ticket);

        if (! Storage::disk($attachment->disk)->exists($attachment->path)) {
            abort(404, 'Archivo no encontrado.');
        }

        return Storage::disk($attachment->disk)->download(
            $attachment->path,
            $attachment->original_name,
            ['Content-Type' => $attachment->mime_type]
        );
    }

    protected function getParentTicket(Attachment $attachment): Ticket
    {
        if ($attachment->attachable_type === Ticket::class) {
            return $attachment->attachable;
        }

        if ($attachment->attachable_type === TicketComment::class) {
            return $attachment->attachable->ticket;
        }

        abort(404);
    }
}
