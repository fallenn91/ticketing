<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    protected $fillable = [
      'id',
      'name',
    ];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    public function ticket()
    {
      return $this->belongsTo(Ticket::class);
    }
}
