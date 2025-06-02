<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar post</title>
    <link rel="stylesheet" href="/public/css/delete_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="modal_completo" id="delete_post<?= $post->id ?>">
        <div class="container">
            <div class="top_tittle">
                <h1 class="msg_tittle">Você realmente quer excluir este post?</h1>
            </div>
            <div class="actions">
                <form class="button_box" action="/posts/delete" method="POST">
                    <input type="hidden" value=<?= $post->id ?> name="id">
                    <button class="action_button" style=" background-color: #4CAF50;">
                        <input type="button" class="input_button" value="EXCLUIR" id="btn_excluir">

                        <button class="action_button" style="background-color: rgba(214, 5, 5, 0.73);" type="button" onclick="fecharModalViewUser('modal_view_user_<?= $post->id ?>')">CANCELAR</button>
                    </button>
                </form>

            </div>
        </div>


    </div>


</body>

</html>