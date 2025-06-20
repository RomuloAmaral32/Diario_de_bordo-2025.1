<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostAdminController 
{
 
    public function index()
    {
        $page = 1;

        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('admin/post_list_admin');   

            }


        }

        $itensPage = 5;
        $inicio  = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countALL('posts');

            if($inicio > $rows_count){
                return redirect('admin/post_list_admin');
            }

        $posts = App::get('database')->selectAll('posts', $inicio, $itensPage);
        $total_pages = ceil($rows_count / $itensPage);
        return view('admin/post_list_admin', compact('posts', 'page', 'total_pages', 'inicio'));
    }


    public function create()
    {
        session_start();
        
        $temporario = $_FILES['imagem']['tmp_name'];

        $nomeimagem = sha1(uniqid($_FILES['imagem']['name'], true)) . "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        $caminhodaimagem = "public/assets/img_posts/" . $nomeimagem;

        move_uploaded_file($temporario, $caminhodaimagem);


        $parameters = [
            'tittle' => $_POST['tittle'],
            'content' => $_POST['content'],
            'id_user' => $_SESSION['id'],
            'image' => $caminhodaimagem,
            'created_at' => date('Y-m-d H:i:s'),
        
        ];
 
        App::get('database')->insert('posts', $parameters);
        header('Location: /posts');
    }
    
    public function edit(){

        $id = $_POST['id'];
        $post = App::get('database')->selectOne('posts', $id);

        $caminhodaimagem = $post -> image;

        if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){

        $temporario = $_FILES['imagem']['tmp_name'];

        $nomeimagem = sha1(uniqid($_FILES['imagem']['name'], true)) . "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $destinoimagem = "public/assets/img_posts/";
        $caminhodaimagem = $destinoimagem . $nomeimagem;

        move_uploaded_file($temporario, $caminhodaimagem);

            if($post && !empty($post->image) && file_exists($post->image)){
                unlink($post->image);
            }
        }

         $parameters = [
            'tittle' => $_POST['tittle'],
            'content' => $_POST['content'],
            'image' => $caminhodaimagem
            
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
        $post = App::get('database')->selectOne('posts',$id);
        $caminhoImagem =$post->image;
        
        if(file_exists($caminhoImagem)){
            unlink($caminhoImagem);
        }

        App::get('database')->delete('posts',$id);

        header('Location: /posts');
    }

    public function search()
    {
        $busca = isset($_GET['busca']) ? trim($_GET['busca']): ''; // Pega a string que tem no input

        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('admin/post_list_admin');   
            }
        }


        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;

        
        if($busca === ''){ // se a string estiver vazia, mostra todos os posts
            $rows_count = App::get('database')->countALL('posts');
            if($inicio > $rows_count){
                return redirect('admin/post_list_admin');
            }
            $posts = App::get('database')->selectALL('posts',$inicio,$itensPage);
        }
        else{
            $rows_count = App::get('database')->countFromSearch('posts',$busca,0);
            if($inicio > $rows_count){
                return redirect('admin/post_list_admin');
            }

            $posts = App::get('database')->searchFromDB($busca,$inicio,$itensPage,0); //senao, mostra os posts que batem com a string de busca
        }

        $total_pages = ceil($rows_count / $itensPage);

        
        return view('admin/post_list_admin', compact('posts', 'page', 'total_pages', 'inicio','busca'));
    }

}
