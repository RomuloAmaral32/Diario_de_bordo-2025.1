<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingController{

public function index()
{
    $allposts = App::get('database')->selectAll('posts');
    $users = App::get('database')->selectAll('users');

    
    $posts = array_slice($allposts, 0, 12);
    return view('site/landing_page', compact('posts', 'users'));
}

}