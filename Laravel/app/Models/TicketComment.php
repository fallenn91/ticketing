<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketComments extends Model
{
    protected $fillable = [
        'ticket_id',
        'user_id',
        'comment',
        'timestamps',
    ];

    public function ticketComment()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function userComment()
    {
        return $this->belongsTo(User::class);
    }
}
