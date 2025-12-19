<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    //
    protected $fillable [
      'user_id',
      'ticket_id',
      'body',
      'created_at'
    ]
}
