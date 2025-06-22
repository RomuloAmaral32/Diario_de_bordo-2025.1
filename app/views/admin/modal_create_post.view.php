<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/public/css/create_post_styles.css">
    <script src="/public/js/modais.js"></script>
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Nova Postagem</title>
</head>
<body>
    <div class="full_container" id="create_post">
        
        <div class="top_tittle">
            <h1 class="top_text">NOVA PUBLICAÇÃO</h1>
        </div>
       
          
        <div class="post_action">
            <div class="autor_name">
                <div class="autor_details">
                <input type="hidden" name= "id_autor" value="<?php echo($_SESSION['id']) ?>">
                <p><?=date('d-m-Y')?></p>
            </div>

            <form action="/posts/create" method="POST" enctype="multipart/form-data">
            <div class="img_post" onclick="document.querySelector('#imagem_post').click()"></div>

            <input type="file" name="imagem" accept="image/*" class="image_input_create" id="imagem_post">
            <input type="text" maxlength="60" name="tittle" class="post_tittle" placeholder="Digite o título que deseja publicar">
            <textarea  class="post_text" name="content" placeholder="Digite a sua postagem"></textarea>
            
            <div class="button_box">
            
            <button type="submit" class="action_button" id="post_butt on">POSTAR
                </button>

                <button class="action_button" id="cancel_button" type="button" onclick="fecharModalViewUser('create_post')" >CANCELAR
            
                </button> 
                </form>
            </div>
                
              
        </div>
        

</div>
    
    <script src="/public//js/modal_create_post.js"></script>
</body>
</html>