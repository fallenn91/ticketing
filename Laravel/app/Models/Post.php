<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Post extends Model
{
    protected $fillable = [
      'id',
      'user_id',
      'title',
      'subtitle',
      'description',
      'image',
      'timestamps',
    ];
    // app/Models/Post.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
