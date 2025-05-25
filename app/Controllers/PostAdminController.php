<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostAdminController 
{

   /* public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/user_list', compact('users'));
    }*/
    public function index()
    {
        $posts = App::get('database')->selectAll('posts');
        return view('admin/post_list_admin', compact('posts'));
    }
}