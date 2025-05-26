<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserAdminController
{
 
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/user_list', compact('users'));
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