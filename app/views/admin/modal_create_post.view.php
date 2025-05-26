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
                <p>Por: Ana Freitas</p>
                <p>23/04/2025</p>
            </div>
            <form action="posts/create" method="POST" id="post_form">
            
            <input type="file" class="image_input">
            <input type="text" name="tittle" class="post_tittle" placeholder="Digite o título que deseja publicar">
            <input  class="post_text" name="content" placeholder="Digite a sua postagem">
            
            <div class="button_box">
            
            <button type="submit" class="action_button" id="post_button">POSTAR
                </button>

                <button class="action_button" id="cancel_button" type="button" onclick="fecharModalViewUser('create_post')" >CANCELAR
            
                </button> 
                </form>
            </div>
                
              
        </div>
        

</div>
    
    
</body>
</html>