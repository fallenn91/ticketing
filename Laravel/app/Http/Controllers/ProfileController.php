<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\JobOffer;

class ProfileController extends Controller
{
    public $posts;
    public $jobsOffer;

    public function render()
    {
      $posts = Post::all();
      $jobsOffer = JobOffer::all();

      return view('diabolo.profile', compact('posts', 'jobsOffer'));
    }
}
