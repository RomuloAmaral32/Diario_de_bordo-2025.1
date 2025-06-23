<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingController{

public function index()
{
    $allposts = App::get('database')->selectAll('posts');
    $users = App::get('database')->selectAll('users');

    $total = count($allposts);
    $posts = array_slice($allposts, max(0, $total - 12), 12);

    $postsVisiveis = array_slice($posts, -6);
    $postsEscondidos = array_slice($posts, 0, max(0, count($posts) - 6));
    $postsCarrossel = array_slice($posts, -9);

    return view('site/landing_page', compact('postsVisiveis', 'postsEscondidos', 'postsCarrossel', 'users'));
}


}