<?php
    session_start();

    if(!isset($_SESSION['id'])){ 
        header('Location: /login');
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin</title>

    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="/public/assets/Logo-Globo.png" type="image/png">
</head>
<body>
    <div id="box-background">
        <div class="real-box">
            <div id="exit">

                <!-- Criei o form para logout, porém no treinamento pede que  seja
                     um tipo button e não <a> No exemplo do treinamento é um botão
                     e no nosso um ícone.  
                    
                    No exemplo do treinamento o logout é feito:

                    <form action="/admin/logout" method="POST">
                        <button type="submit">Logout</button> 
            
                -->
                        
                <form action="logout" method="POST">
                 <button class = "logout" type="submit"><img src="/public/assets/dashboard_admin/exit.png" alt="exit"></button>
                </form>  


                
            </div>
            <div id="app-dashboard">
                <div class="background-dashboard"></div>
                    <div class="dashboard">
                        
                            <div class="logo">
                                <img src="/public/assets/dashboard_admin/LogoGlobo.png" alt="Logo Diario de bordo">
                            </div>
                        <h1>DASHBOARD</h1>
                    </div>
                    <div id="button-container">
                            <a class="button" href="posts">
                                <h3>Tabela de posts</h3>
                                <img src="/public/assets/dashboard_admin/posts.png" alt="post">
                            </a>

                            <a class="button" href="users">
                                <h3>Tabela de usuários</h3>
                                <img src="/public/assets/dashboard_admin/user.png" alt="post">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>