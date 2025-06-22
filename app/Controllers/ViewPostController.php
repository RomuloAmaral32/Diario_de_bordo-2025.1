<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ViewPostController {

    public function index()
    {
        try {
            $id = (int) $_GET['id'];

            $posts = App::get('database')->selectAll('posts');
            $users = App::get('database')->selectAll('users');

            $postEncontrado = null;
            foreach ($posts as $post) {
                if ($post->id == $id) {
                    $postEncontrado = $post;
                    break;
                }
            }

            foreach ($posts as $post){
                foreach ($users as $user){
                    if($post->id_user == $user->id){
                        $post->author_name = $user->name;
                        break;
                    }
                }
            }

            foreach ($posts as $post){
                foreach ($users as $user){
                    if($post->id_user == $user->id){
                        $post->author_img = $user->image;
                        break;
                    }
                }
            }

            return view('site/view_post', ['post' => $postEncontrado,'posts' => $posts]);

        } catch (Exception $e) {
            return view('site/erro', ['mensagem' => $e->getMessage()]);
        }
    }
}
