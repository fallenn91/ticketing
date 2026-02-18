<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the Ticket "created" event.
     */
    public function created(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "updated" event.
     */
    public function updated(Ticket $ticket): void
    {
        $userId = auth()->id() ?? null;

        if ($ticket->isDirty('status_id')) {
          $ticket->histories()->create([
            'user_id' => $userId,
            'action' => "Status Changed: {$ticket->status->name}",
          ]);
        }
        if ($ticket->isDirty('priority_id')) {
          $ticket->histories()->create([
            'user_id' => $userId,
            'action' => "Priority Changed: {$ticket->priority->name}",
          ]);
        }
    }

    /**
     * Handle the Ticket "deleted" event.
     */
    public function deleted(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "restored" event.
     */
    public function restored(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     */
    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
