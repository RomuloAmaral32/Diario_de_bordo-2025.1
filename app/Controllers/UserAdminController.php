<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserAdminController
{
 
    public function index()
    {
        $page=  1;

        if (isset($_GET['paginacaoNumero']) && !empty($_GET['paginacaoNumero'])) {
            $page = intval($_GET['paginacaoNumero']);

            if($page <= 0){
               return redirect('admin/user_list');   

            }


        }

        $itensPage = 5;
        $inicio  = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countALL('posts');

            if($inicio > $rows_count){
                return redirect('admin/admin/user_list');
            }


        $users = App::get('database')->selectAll('users',  $inicio, $itensPage);
        $total_pages = ceil($rows_count / $itensPage);
        return view('admin/user_list', compact('users', 'page', 'total_page'));
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
}