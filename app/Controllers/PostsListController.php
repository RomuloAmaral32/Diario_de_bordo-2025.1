<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsListController{

    public function index()
    {
        return view('site/posts_list');
    }
}

