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


    public function create()
    {
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
 
         App::get('database')->insert('posts', $parameters);

        header('Location: /posts');
    }
    public function edit(){

         $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $id = $_POST['id'];

        App::get('database')->update('posts',$id,$parameters);

        header('Location: /posts');
        
    }

    public function delete()
    {
        $id = $_POST['id'];


        App::get('database')->delete('posts',$id);

        header('Location: /posts');
    }
}



