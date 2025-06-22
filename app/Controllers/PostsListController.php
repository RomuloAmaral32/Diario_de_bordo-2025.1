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


    public function searchPost()
    {
        $busca = isset($_GET['busca']) ? trim($_GET['busca']): '';


        if($busca === '')
            $posts = App::get('database')->selectALL('posts');
        else
            $posts = App::get('database')->selectFromDB($busca);
        
        return view('site/posts_list',compact('posts'));
    }


}

