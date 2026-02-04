<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketPriority extends Model
{
    protected $fillable = [
      'name',
      'colorPriority',
    ];

    public function tickets()
    {
      return $this->hasMany(Ticket::class, 'priority_id');
    }
}
