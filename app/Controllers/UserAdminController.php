<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserAdminController
{
 
    public function index()
    {
        $page =  1;

        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('admin/user_list');   

            }


        }

        $itensPage = 5;
        $inicio  = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countALL('users');

            if($inicio > $rows_count){
                return redirect('admin/admin/user_list');
            }


        $users = App::get('database')->selectAll('users',  $inicio, $itensPage);
        $total_pages = ceil($rows_count / $itensPage);
        return view('admin/user_list', compact('users', 'page', 'total_pages', 'inicio'));
    }

    public function create()
    {
        session_start();


        if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
        $temporario = $_FILES['imagem_user']['tmp_name'];

        $nomeimagem = sha1(uniqid($_FILES['imagem_user']['name'], true)) . "." . pathinfo($_FILES['imagem_user']['name'], PATHINFO_EXTENSION);

        $caminhodaimagem = "public/assets/img_users/" . $nomeimagem;
        move_uploaded_file($temporario, $caminhodaimagem);
        }
        else
        {
            $caminhodaimagem ="public/assets/default_image/user_semimagem.png";
        }

        
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'image' => $caminhodaimagem
        ];

         App::get('database')->insert('users', $parameters);

        header('Location: /users');
    }

    public function edit(){
        
        $id = $_POST['id'];
        $user = App::get('database')->selectOne('users', $id);

        $caminhodaimagem = $user -> image;

        if(isset($_FILES['imagem_user']) && $_FILES['imagem_user']['error'] === UPLOAD_ERR_OK){

        $temporario = $_FILES['imagem_user']['tmp_name'];

        $nomeimagem = sha1(uniqid($_FILES['imagem_user']['name'], true)) . "." . pathinfo($_FILES['imagem_user']['name'], PATHINFO_EXTENSION);
        $destinoimagem = "public/assets/img_users/";
        $caminhodaimagem = $destinoimagem . $nomeimagem;

        $imagemPadrao = "public/assets/default_image/user_semimagem.png";

        move_uploaded_file($temporario, $caminhodaimagem);

            if($user && !empty($user->image) && $user->image !== $imagemPadrao && file_exists($user->image)){
                unlink($user->image);
            }
        }

         $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'image' => $caminhodaimagem
        ];
        
        

        $id = $_POST['id'];

        App::get('database')->update('users',$id,$parameters);

        header('Location: /users');
        
    }

    public function delete()
    {
        $id = $_POST['id'];

        

        App::get('database')->delete('users',$id);

        header('Location: /users');
    }


    public function search()
    {
        $busca = isset($_GET['busca']) ? trim($_GET['busca']): ''; // Pega a string que tem no input

        $page = 1;
        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('admin/user_list');   
            }
        }


        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;

        
        if($busca === ''){ // se a string estiver vazia, mostra todos os usuarios
            $rows_count = App::get('database')->countALL('users');
            if($inicio > $rows_count){
                return redirect('admin/user_list');
            }
            $users = App::get('database')->selectALL('users',$inicio,$itensPage);
        }
        else{
            $rows_count = App::get('database')->countFromSearch('users',$busca,1);
            if($inicio > $rows_count){ 
                return redirect('admin/user_list');
            }

            $users = App::get('database')->searchFromDB($busca,$inicio,$itensPage,1); //senao mostra os usuarios que batem com a string de busca
        }

        $total_pages = ceil($rows_count / $itensPage);
    
        return view('admin/user_list', compact('users','page','total_pages','inicio','busca'));
    }
}