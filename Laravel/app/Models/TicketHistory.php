<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{
    public $timestamps = false;
    protected $fillable = ['ticket_id', 'user_id', 'action', 'modified_at'];

    public function ticket()
    {
      return $this->belongsTo(Ticket::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
