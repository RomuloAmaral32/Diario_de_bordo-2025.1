<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsListController{

    public function index()
    {

        $page =  1;

        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('site/posts_list');   

            }
        }

        $itensPage = 6;
        $inicio  = $itensPage * $page - $itensPage;


        $rows_count = App::get('database')->countALL('posts');

        if($inicio > $rows_count){
            return redirect('site/post_list');
        }

        $posts = App::get('database')->selectAll('posts',$inicio, $itensPage);
        $total_pages = ceil($rows_count / $itensPage);


        return view('site/posts_list', compact('posts', 'page', 'total_pages', 'inicio'));
    }


    public function searchPost()
    {
        $busca = isset($_GET['busca']) ? trim($_GET['busca']): '';


        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('admin/post_list_admin');   
            }
        }


        $itensPage = 6;
        $inicio = $itensPage * $page - $itensPage;


        if($busca === ''){
            $rows_count = App::get('database')->countALL('posts');
            if($inicio > $rows_count){
                return redirect('site/post_list');
            }
            $posts = App::get('database')->selectALL('posts',$inicio,$itensPage);
        }
        else{
            $rows_count = App::get('database')->countFromSearch('posts',$busca,0);
            if($inicio > $rows_count){
                return redirect('site/post_list');
            }
            $posts = App::get('database')->searchFromDB($busca,$inicio,$itensPage,0);
            
        }

        $total_pages = ceil($rows_count / $itensPage);
        
        return view('site/posts_list',compact('posts','page', 'total_pages', 'inicio','busca'));
    }


}

