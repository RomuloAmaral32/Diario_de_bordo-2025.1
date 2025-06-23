    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/public/css/styles_landing_page.css">
        <title>Diário de Bordo - Landing Page</title>
        <link rel="icon" href="/public/assets/Logo-Globo.png" type="image/png">
    </head>

    <?php require('app\views\site\index_navbar_padrao.view.php'); ?>
    <body>


        <main>
            <section class="boxIntroducao">

                <h1>COMPARTILHE SUAS EXPERIÊNCIAS PELO MUNDO</h1>
                <div class="textoIntroducao">
                    <p>No Diário de Bordo, você pode compartilhar suas experiências e contribuir com toda nossa comunidade. Divida suas melhores dicas de lugares que você passou. </p>
                    <img src="/public/assets/landing-page/aviao_voando.gif" alt="Gif de um avião voando"/>
                </div>

            </section>

            <section class="boxPosts">

                <h2>POSTAGENS</h2>
            

                <div class="post_grid">
                    <?php foreach (array_reverse($postsVisiveis) as $post): ?>
                    <a href="/viewpost?id=<?= $post->id ?>" class="card">
                        <img src="/<?= $post->image ?>" alt="Foto de Ibitipoca"/>
                        <h3><?= $post->tittle ?></h3>
                        <p class="descricao"><?= nl2br(htmlspecialchars($post->content)) ?></p>
                        <p class="autor">
                            Postado por: 
                            <span class="nome">
                                <?php foreach($users as $user): ?>
                                    <?php if($user->id === $post->id_user): ?>
                                        <?= $user->name ?>
                                        <?php break; endif; ?>
                                <?php endforeach; ?>
                            </span>
                        </p>
                    </a>

                <?php endforeach; ?>
                </div>

                <?php if(count($postsEscondidos) > 0): ?>
                <div class="posts_grid_escondido">
                    <?php foreach (array_reverse($postsEscondidos) as $post): ?>
                    <a href="/viewpost?id=<?= $post->id ?>" class="card">
                        <img src="/<?= $post->image ?>" alt="Foto de Ibitipoca"/>
                        <h3><?= $post->tittle ?></h3>
                        <p class="descricao"><?= nl2br(htmlspecialchars($post->content)) ?></p>
                        <p class="autor">
                            Postado por: 
                            <span class="nome">
                                <?php foreach($users as $user): ?>
                                    <?php if($user->id === $post->id_user): ?>
                                        <?= $user->name ?>
                                        <?php break; endif; ?>
                                <?php endforeach; ?>
                            </span>
                        </p>
                    </a>

                   <?php endforeach; ?>
                
                </div>

                <button id="verMais">Ver mais</button>
                <?php endif; ?>


            </section>

            <section class="boxCarrossel">
                <h2>PELO MUNDO</h2>

                <div class="bloco">
                    <div id="esquerda" class="setaEsquerda"> &lt</div>
                    <ul class="carrossel">
                        <?php foreach (array_reverse($postsCarrossel) as $post): ?>
                        <li class="imagem">
                            <a href="/viewpost?id=<?= $post->id ?>">
                                <div class="img" draggable="false"><img src="/<?= $post->image ?>" alt="Foto de Paris"></div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                       
                    </ul>
                    <div class="indicadores">
                        <span class="bolinha ativa"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                        <span class="bolinha"></span>
                    </div>               
                    <div id="direita" class="setaDireita">></div>
                </div>

            </section>
        </main>

        <?php require('app\views\site\index_footer_padrao.view.php'); ?>

        <script src="/public/js/landing_page.js"></script>
    </body>
    </html>