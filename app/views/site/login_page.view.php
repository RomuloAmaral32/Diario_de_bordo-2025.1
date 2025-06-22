<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="/public/css/styles_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
 

 
<div class="login_page_container">

<img src="/public/assets/login_page/logo.png" class="logo" alt="logo_diario_de_bordo">

<p class="login_tittle">Login</p>

<form action="/login" method="POST">
    <div class='mensagem-erro'>
        <p class="error_text">
        <?php
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
            if (isset($_SESSION['mensagem-erro'])) {
                echo $_SESSION['mensagem-erro'];
                unset($_SESSION['mensagem-erro']);
            }
        ?>
        </p>
        </div>

<label for="email">Email</label>

<input type="email" name="email" placeholder="example@email.com" class="email_input">

<label for="senha">Senha</label>

<div class="pass_manager">
    <input type="password" name="senha" placeholder="*********" class="pass_input" id="senha"> 
    <i class="bi bi-eye-slash" id="btn_senha" onclick="mostrarSenha()"></i>
</div>

<button type="submit" class="login_button">Login</button>
<a href="/">
    <img src="/public/assets/login_page/close_icon.png" alt="close_icon" class="close_button">
</a>
</form>

</div>

    <script src="/public/js/login_page_js.js"></script>
</body>
</html>