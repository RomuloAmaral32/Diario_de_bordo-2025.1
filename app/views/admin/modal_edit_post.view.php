<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="/public/css/styles_modal_edit_post.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Editar Postagem</title>
</head>

<body>
    <div class="full_container_edit" id="edit_post<?= $post->id ?>">

        <div class="top_tittle">
            <h1 class="top_text">EDITAR PUBLICAÇÃO</h1>
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
            <form action="posts/edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" value=<?= $post->id ?> name="id">
                <p>Imagem atual:</p>
                <div class="image_input">
                <img src="/<?= $post -> image ?>" alt="Imagem post">
                </div>
                <input type="file" name="imagem" accept="image/*"  id="imagem">
                <input type="text" maxlength="60" class="post_tittle" name="tittle" value="<?= $post->tittle ?>"></input>
                <textarea name="content" class="post_text"><?= $post->content ?></textarea>
                <div class="button_box">
                    <button class="action_button" style='background-color: #4CAF50;' type="submit">POSTAR</button>
                    <button class="action_button" style='background-color: rgba(214, 5, 5, 0.73); color:white' type="button" onclick="fecharModalViewUser('edit_post<?= $post->id ?>')">CANCELAR</button>
                </div>
            </form>

        </div>


    </div>


</body>

</html>