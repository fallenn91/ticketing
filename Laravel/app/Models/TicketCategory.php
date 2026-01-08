<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $table = 'tickets_category';
    protected $fillable = [
        'id',
        'name',
    ];

    public function tickets()
    {
      return $this->hasMany(Ticket::class, 'category_id');
    }
}
