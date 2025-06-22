<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingController{

public function index()
{
    $allposts = App::get('database')->selectAll('posts');
    $users = App::get('database')->selectAll('users');

    usort($allposts, fn($a, $b) => strtotime($b->created_at) - strtotime($a->created_at));
    $posts = array_slice($allposts, 0, 12);
    return view('site/landing_page', compact('posts', 'users'));
}

}