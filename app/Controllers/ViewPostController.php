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

            $postEncontrado = null;
            foreach ($posts as $post) {
                if ($post->id == $id) {
                    $postEncontrado = $post;
                    break;
                }
            }

            return view('site/view_post', ['post' => $postEncontrado]);

        } catch (Exception $e) {
            return view('site/erro', ['mensagem' => $e->getMessage()]);
        }
    }
}
