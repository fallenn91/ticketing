<?php

namespace App\Models;

use App\Models\TicketCategory;
use App\Models\TicketComment;
use App\Models\User;
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
        'status_id',
        'priority_id',
        'group_id',
        'category_id',
        'timestamps',
    ];
    

    public function users()
    {
        return $this->belongsToMany(User::class, 'ticket_user');
    }
    public function creator()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class, 'ticket_id');
    }

    public function category()
    {
      return $this->belongsTo(TicketCategory::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'ticket_number';
    }

    public function status()
    {
      return $this->belongsTo(TicketStatus::class, 'status_id');
    }

    public function priority()
    {
      return $this->belongsTo(TicketPriority::class, 'priority_id');
    }

    public function group()
    {
      return $this->belongsTo(Group::class, 'group_id');
    }

    protected static function booted()
    {
      static::creating(function ($ticket) {

        if (!$ticket->status_id) {
          $ticket->status_id = TicketStatus::where('is_default', true)->value('id');
        }
        if (!$ticket->priority_id) {
          $ticket->priority_id = TicketPriority::where('is_default', true)->value('id');
        }

      });
    }

    
    
}
