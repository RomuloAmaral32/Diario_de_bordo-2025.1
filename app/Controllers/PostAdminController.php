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
        $file = $_FILES['image_input'];
        $extensao = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

        // App::get('database') ->verificaErroUpload($file);
        // $img = App::get('database')->uploadImage($file,0);

        $parameters = [
            'tittle' => $_POST['tittle'],
            'content' => $_POST['content'],
            'id_user' => 5,
            'image' => "img",
        ];
 
        // $imagem = !empty($_FILES['image']['name']) ? $_FILES
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

//     public function uploadImage($caminho){
// if (!empty($_FILES['image']['name'])) {
//                             $nomeImagem = $_FILES['imagem']['name'];
//                             $type = $_FILES['imagem']['type'];
//                             $nomeTemporario = $_FILES['imagem']['tmp_name'];
//                             $tamanho = $_FILES['imagem']['size'];
//                             $erros = array();

//                             $tamanhoMaximo = 1024 * 1024 * 5;
//                             if($tamanho > $tamanhoMaximo){
//                                 $erros[] = "Seu arquivo excede o tamanho máximo.<br>";
//                             }

//                             $arquivosPermitidos = ["png", "jpg", "jpeg"];
//                             $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);
//                             if (!in_array ($extensao, $arquivosPermitidos)){
//                                 $erros[] = "Arquivo não permitido.<br>";
//                             }
//                             $typesPermitidos = ["image/png", "image/jpg", "image/jpeg"];
//                             if (!in_array ($type, $typesPermitidos)){
//                                 $erros[] = "Tipo de arquivo não permitido.<br>";
//                             }
//                             if (!empty ($erros)){
//                                 foreach ($erros as $erro){
//                                     echo $erro;
//                                 }
//                             } else {
//                                 // $caminho = "public/assets";
//                                 $hoje = date("d-m-Y_h-i");
//                                 $novoNome = $hoje."-".$nomeImagem;
//                                 if(move_uploaded_file($nomeTemporario, $caminho.$novoNome)){
//                                     return $novoNome;
//                                 } else {
//                                     return FALSE;
//                                 }
//                             }
//         }
//     }
// }


