<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ExibirDashboardController
{
 
    public function exibirDashboard(): mixed
    {
        return view(name: 'admin/dashboard');

    }

    public function efetuarLogout(): void
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }

}
?>