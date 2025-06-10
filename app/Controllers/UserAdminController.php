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
        $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

         App::get('database')->insert('users', $parameters);

        header('Location: /users');
    }
    public function edit(){

         $parameters = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
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



        if($busca === '') // se a string estiver vazia, mostra todos os usuarios
            $users = App::get('database')->selectALL('users');
        else    
            $users = App::get('database')->searchFromDB($busca,1); //senao, mostra os usuarios que batem com a string de busca


        //paginacao ainda nao implementada
        $page = 1;
        $inicio = 0;
        $total_pages = 1;

        
        return view('admin/user_list', compact('users','page','total_pages','inicio','busca'));
    }
}