<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu post</title>
    <link rel="stylesheet" href="/public/css/individual_view_post.css">
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
    <link rel="icon" href="/public/assets/Logo-Globo.png" type="image/png">
</head>
<?php require('app\views\site\index_navbar_padrao.view.php'); ?>

<body>
    <main>
        <div class="box_titulo_post">
            <h1 class="main_tittle"><?= $post->tittle ?></h1>
        </div>
        <div class="view_post_container">

            <div class="page_container">
                <div id="app">
                <label for="date_label" class="date_label"><?= (new DateTime($post->created_at))->format('d/m/Y') ?></label>
                <hr class="top_line">
                </hr>
                <div class="box_imagem_post">
                    <img src="/<?= $post->image ?>" alt="torre_eifel" class="main_image">
                </div>
                <p class="p_text"><?= nl2br(htmlspecialchars($post->content)) ?></p>
                <hr class="line">
                </hr>
                <div class="box_autor">
                    <label for="tittle_user" class="tittle_user">Publicado por</label>
                    <div class="user_info"><img src="/<?= $post->author_img?>" class="icon_user" alt="foto_user">
                        <label for="user_name" class="label_1"><?= $post->author_name ?></label>
                    </div>
                </div>

                </div>


                
                <div class="search_container">
                <form action="/postslist/search" method="GET">
                    <div class="top_search">
                        <h3 class="pesquisar">Pesquisar</h3>
                        <div class="search_box">
                            <input type="text" placeholder="Pesquisar" name="busca" class="text_input">
                            <img src="/public/assets/view_post/search.png" class="lupa_img" alt="lupa">
                        </div>
                    </div>
                    </form>
                    

                    <div class="post_down">

                        <h4 class="down_tittle">Posts mais recentes</h4>
                        <div class="post_details">    
                        <?php foreach (array_slice($posts, -3) as $post): ?>
                            <div class='post_obj'>
                                <img src="/<?= $post->image ?>" alt="post_img" class='icon'>
                                <div class="text">
                                    <label class="tittle"><?= (new DateTime($post->created_at))->format('d/m/Y') ?></label>
                                    <a href="/viewpost?id=<?= $post->id ?>" class="links"><?= $post->tittle ?></a>
                                </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                    </div>
                </div>
    </main>
</body>
<?php require('app\views\site\index_footer_padrao.view.php'); ?>

</html>