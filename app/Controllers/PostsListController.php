<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsListController{

    public function index()
    {
        $posts = App::get('database')->selectAll('posts');
        return view('site/posts_list', compact('posts'));
    }
}

