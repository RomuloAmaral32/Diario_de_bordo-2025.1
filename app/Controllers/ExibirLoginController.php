<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ExibirLoginController
{
 
    public function exibirLogin(): mixed
    {
        session_start();
        if (isset($_SESSION['id'])) {
            header('Location: /dashboard');
            exit();
        }
        return view(name: 'site/login');

    }

    public function efetuaLogin(): void
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = App::get(key:'database')->verificaLogin($email, $senha);

        if ($user !== false) {
            session_start();
            $_SESSION['id'] = $user->id;
            header('Location: /dashboard');
        }
        else {
            session_start();
            $_SESSION['mensagem-erro'] = 'Email ou senha inválidos';
            header('Location: /login');
        }
    }



}
?>