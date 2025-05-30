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
</head>
<body>
 

 
<div class="login_page_container">

<img src="/public/assets/login_page/logo.png" class="logo" alt="logo_diario_de_bordo">

<p class="login_tittle">Login</p>

<form action="/login" method="POST">
    <div class='mensagem-erro'>
        <p>
        <?php
            session_start();
            if (isset($_SESSION['mensagem-erro'])) {
                echo $_SESSION['mensagem-erro'];
                unset($_SESSION['mensagem-erro']);
            }
        ?>

<label for="email">Email</label>

<input type="email" placeholder="example@email.com" class="email_input">

<label for="senha">Senha</label>

<div class="pass_manager">
    <input type="password" placeholder="*********" class="pass_input"> 
    <img src="/public/assets/login_page/eye_icon.png" alt="eye_icon" class="eye_icon">
</div>

<button type="submit" class="login_button">Login</button>
<img src="/public/assets/login_page/close_icon.png" alt="close_icon" class="close_button">
</form>

</div>


</body>
</html>