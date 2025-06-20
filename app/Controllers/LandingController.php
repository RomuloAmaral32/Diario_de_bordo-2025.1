<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingController{

    public function index()
    {
        $posts = App::get('database')->selectAll('posts');
        $users = App::get('database')->selectAll('users');
        return view('site/landing_page', compact('posts'), compact('users'));
    }

}