<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de posts</title>

    <link rel="stylesheet" href="/public/css/posts-list.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<?php require('app\views\site\index_navbar_padrao.view.php'); ?>
<body>
    
    <main>
        <div id="title-text">
            <h1>Principais posts</h1>
        </div>

        <div id="app">
            <div id="cards-container">
                <?php foreach ($posts as $post): ?>
                    <div class="cards">
                        <div class="data-card">
                            <li><?= (new DateTime($post->created_at))->format('d-m-Y') ?></li>
                        </div>
                        <img class="card-image" src="/<?= $post->image ?>" alt="lugar1">
                        <div class="parte-baixo">
                            <a href="/viewpost?id=<?= $post->id ?>"><?= $post->tittle?></a>
                            <a class="button" href="/viewpost?id=<?= $post->id ?>"><img src="/public/assets/posts_list/up-right-arrow.png" alt="Seta"></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="barra-lateral">
                <h3>Pesquisar</h3>
                <form action="/viewpost/search" method="GET">
                <div class="search-box">
               
                    <input type="text" class="search-text" placeholder="Pesquisar" name="busca">
                    <a href="pesquisar">
                        <img src="/public/assets/posts_list/lupa.png" alt="Lupa" height="25" width="25">
                    </a>
                </div>
                </form>

                <div class="recent-posts">
                    <h4>Posts mais recentes</h4>

                    <?php foreach (array_slice($posts, -3) as $post): ?>
                    <div class="post">
                        <img src="/<?= $post->image ?>" alt="post_img">
                        <div class="text-left">
                            <div class="data-left"><?= (new DateTime($post->created_at))->format('d/m/Y') ?></div>
                            <a href="/viewpost?id=<?= $post->id ?>" class="links"><?= $post->tittle ?></a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                  
                </div>
            </div>
        </div>
    </main>

    <?php require('app\views\site\index_footer_padrao.view.php'); ?>
</body>
</html>