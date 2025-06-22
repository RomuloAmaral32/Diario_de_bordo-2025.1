<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Postagem</title>
    <link rel="stylesheet" href="/public/css/view_post_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>  
<body>
    <div class="full_container_view_post" id="view_post<?= $post->id ?>">

        <div class="top_tittle">
            <h1 class="top_text">VISUALIZAR POSTAGEM</h1>
        </div>
         
        <div class="post_action">
            <div class="autor_name">
                <div class="autor_details">
                <p>Autor:
                <?php foreach($users as $user): ?>
                  <?php if($user->id === $post->id_user): ?>
                      <?= $user->name ?>
                      <?php break; endif; ?>
                <?php endforeach; ?>
                </p>
                <p><?= (new DateTime($post->created_at))->format('d-m-Y') ?></p>
            </div>
                
            </div>
            <div class="image_input">
                <img src="/<?= $post -> image ?>" alt="Imagem post">
            </div>
            <div class="post_tittle"><p id="text_tittle" style="justify-content: left; align-items:initial;"><?= $post->tittle?></p> </div>
            <textarea class="post_text" readonly><?= $post->content?></textarea>
            <div class="button_box">
                <button class="action_button" type="button" onclick="fecharModalViewUser('view_post<?= $post->id ?>')">FECHAR</button>
               
            </div>
              
            
        </div>
        

    </div>
</body>
</html>