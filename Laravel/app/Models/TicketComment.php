<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketComments extends Model
{
    protected $fillable = [
        'id',
        'ticket_id',
        'user_id',
        'comments',
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
