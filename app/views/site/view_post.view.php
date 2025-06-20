<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu post</title>
    <link rel="stylesheet" href="/public/css/styles_view_post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php require('app\views\site\index_navbar_padrao.view.php'); ?>
<body>
        <h1 class="main_tittle">Lorem ipsum</h1>
    <div class="view_post_container">
        
    <div class="page_container">   
        <label for="date_label" class="date_label">dd/mm/yyyy</label>
        <hr class="top_line">
        </hr>
        <img src="/public/assets/view_post/image.png" alt="torre_eifel" class="main_image">
        <p class="p_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea comodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
            officia deserunt mollit anim id est laborum.
        </p>
        <p class="p_text2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
            laudantium, totam
            rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arquiteto beatae vitae dicta sunt
            explicabo. Nemo enim ipsam
        </p>
        <hr class="line">
        </hr>
        <label for="tittle_user" class="tittle_user">Publicado por</label>
        <div class="user_info"><img src="/public/assets/view_post/icon_test.png" class="icon_user" alt="foto_user">
            <label for="user_name" class="label_1">Nome do autor</label>
        </div>

        <div class="search_container">
            <div class="top_search">
                <label class="pesquisar">Pesquisar</label>
                <div class="search_box">
                    <input type="text" placeholder="Pesquisar" class="text_input">
                    <img src="/public/assets/view_post/search.png" class="lupa_img" alt="lupa">
                </div>
            </div>
            <div class="post_down">
                <label for="tittle" class="down_tittle">Posts mais recentes</label>
                <div class="post_details">
                    <div class='post_obj'>
                        <img src="/public/assets/view_post/mchina.png" alt="china" class='icon'>
                        <div class="text">
                            <label class="tittle">03 ABR 2025</label>
                            <a href="#" class="links">Histórias fascinantes
                                da Muralha da China.</a>
                        </div>
                    </div>
                    <div class='post_obj'>
                        <img src="/public/assets/view_post/gcanyon.png" alt="gcanyon" class='icon'>
                        <div class="text">
                            <label class="tittle">03 ABR 2025</label>
                            <a href="#" class="links">Curiosidades incríveis
                                sobre o Grand Canyon.</a>
                        </div>
                    </div>
                    <div class='post_obj'>
                        <img src="/public/assets/view_post/mpicchu.png" alt="mpicchu" class='icon'>
                        <div class="text">
                            <label class="tittle">03 ABR 2025</label>
                            <a href="#" class="links">Fatos surpreendentes
                                sobre Machu Picchu.</a>
                        </div>
                    </div>
                    
               
            </div>
        </div>


    </div>

    </div>  
</body>
<?php require('app\views\site\index_footer_padrao.view.php'); ?>
</html>