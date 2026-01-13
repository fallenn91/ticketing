<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
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
        return $this->hasMany(TicketComment::class);
    }

    public function category()
    {
      return $this->belongsTo(TicketCategory::class);
    }
    
}
