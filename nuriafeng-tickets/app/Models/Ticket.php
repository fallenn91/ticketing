<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    use HasFactory;

    protected $fillable = [
      'id',
      'user_id', // usuario que crea el ticket
      'assigned_to_id', // usuario responsable asignado
      'title',
      'description',
      'status', // enum/string
      'priority', // enum
      'category', // TicketCategory
      'Timestamps' // created_at / updated_at

      public function user(): BelongsTo 
      {
        return $this->belongsTo(User::class, 'user_id');
      }

      public function assignedTo(): BelongsTo
      {
        return $this->belongsTo(User::class, 'assigned_to_id');
      }

      public function commentTicket(): BelongsTo 
      {
        return $this->hasMany(TicketComment::class)->orderBy('created_at', 'asc');
      }

      public function categoryTicket(): BelongsTo 
      {
        return $this->belongsTo(TicketCategory::class, 'category_id');
      }
    ]

    
}

