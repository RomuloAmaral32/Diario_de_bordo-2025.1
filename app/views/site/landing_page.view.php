    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/public/css/styles_landing_page.css">
        <title>Diário de Bordo - Landing Page</title>
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
                    <?php foreach ($posts as $post): ?>
                    <div class="card">
                        <img src="/<?= $post->image ?>" alt="Foto de Ibitipoca"/>
                        <h3><?= $post->tittle ?></h3>
                        <p class="descricao"><?= nl2br(htmlspecialchars($post->content)) ?></p>
                        <p class="autor">Postado por: <span class="nome">Maria</span></p>
                    </div>

                   <?php endforeach; ?>
                
                </div>

                <button id="verMais">Ver mais</button>

            </section>

            <section class="boxCarrossel">
                <h2>PELO MUNDO</h2>

                <div class="bloco">
                    <div id="esquerda" class="setaEsquerda"> &lt</div>
                    <ul class="carrossel">
                        <?php foreach ($posts as $post): ?>
                        <li class="imagem">
                            <div class="img" draggable="false"><img src="/<?= $post->image ?>" alt="Foto de Paris"></div>
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