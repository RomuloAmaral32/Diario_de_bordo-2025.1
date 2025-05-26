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
            'tittle' => $_POST['tittle'],
            'content' => $_POST['content'],
            'id_user' => 5
            
        ];
 
         App::get('database')->insert('posts', $parameters);

        header('Location: /posts');
    }
    public function edit(){

         $parameters = [
            'tittle' => $_POST['tittle'],
            'content' => $_POST['content'],
            
        ];

        $id = $_POST['id'];
        // var_dump($id);
        // die();
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



