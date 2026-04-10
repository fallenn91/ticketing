<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class JobOffer extends Model
{
    protected $fillable = [
      'id',
      'user_id',
      'title',
      'description',
      'image',
      'salary',
      'timestamps',
    ];

    // app/Models/Post.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
