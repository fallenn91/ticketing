<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'id',
        'user_id',
        'assigned_to',
        'title',
        'description',
        'type',
        'comments',
        'status',
        'timestamps',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class, 'comments');
    }
    
}
