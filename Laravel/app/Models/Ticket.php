<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'ticket_number',
        'id',
        'user_id',
        'assigned_to_id',
        'title',
        'description',
        'comments_id',
        'status',
        'priority',
        'category_id',
        'timestamps',
    ];
    
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class, 'ticket_id');
    }

    public function category()
    {
      return $this->belongsTo(TicketCategory::class);
    }

    public function getRouteKeyName()
    {
        return 'ticket_number';
    }
    
}
