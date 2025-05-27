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
                <!-- <p>Id: <?= $post->id_user?></p> -->
                <p> <?= date('d/m/Y') ?></p>
            </div>
            <form action="posts/create" method="POST" id="post_form" enctype="multipart/form-data">
            <div>
            <input type="file" class="image_input" name="image_input">
                <img src="<?= $post->image?>">
            </div>
            <input type="text" name="tittle" class="post_tittle" placeholder="Digite o título que deseja publicar">
            <input  class="post_text" name="content" placeholder="Digite a sua postagem">
            
            <div class="button_box">
            
            <button type="submit" class="action_button" id="post_button" name="post_button">POSTAR
                </button>

                <button class="action_button" id="cancel_button" type="button" onclick="fecharModalViewUser('create_post')" >CANCELAR
            
                </button> 
                </form>
                
                <?php
                    // if(isset($POST['post_button']))
                    //     if (!empty($_FILES['image_input']['name'])) {
                    //         $nomeArquivo = $_FILES['image_input']['name'];
                    //         $tipo = $_FILES['image_input']['type'];
                    //         $nomeTemporario = $_FILES['image_input']['tmp_name'];
                    //         $tamanho = $_FILES['image_input']['size'];
                    //         $erros = array();

                    //         $tamanhoMaximo = 1024 * 1024 * 5;
                    //         if($tamanho > $tamanhoMaximo){
                    //             $erros[] = "Seu arquivo excede o tamanho máximo.<br>";
                    //         }

                    //         $arquivosPermitidos = ["png", "jpg", "jpeg"];
                    //         $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
                    //         if (!in_array ($extensao, $arquivosPermitidos)){
                    //             $erros[] = "Arquivo não permitido.<br>";
                    //         }
                    //         $typesPermitidos = ["image/png", "image/jpg", "image/jpeg"];
                    //         if (!in_array ($type, $typesPermitidos)){
                    //             $erros[] = "Tipo de arquivo não permitido.<br>";
                    //         }
                    //         if (!empty ($erros)){
                    //             foreach ($erros as $erro){
                    //                 echo $erro;
                    //             }
                    //         } else {
                    //             $caminho = "public/assets";
                    //             $hoje = $date("d-m-Y_h-i");
                    //             $novoNome = $hoje."-".$nomeArquivo;
                    //             if(move_uploaded_file($nomeTemporario, $caminho.$novoNome)){
                    //                 echo "Upload feito com sucesso!";
                    //             } else {
                    //                 echo "Erro ao enviar o arquivo!";
                    //             }
                    //         }
                    //     }
                ?>

            </div>
                
              
        </div>
        

</div>
    
    
</body>
</html>