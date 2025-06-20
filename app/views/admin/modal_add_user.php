<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>

    <link rel="stylesheet" href="/public/css/modal_add_user.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="/public/js/modais.js"></script>

</head> 
<body>
<!-- Modal -->
    <div id="modal_new_user" class="modal_new_user">
            <div class="top_new_user">
                <h1>NOVO USUÁRIO</h1>
            </div>
        <div class="container_inputs">
            <h2>Adicionar foto de perfil:</h2>
            <form method="POST" action="users/create" enctype="multipart/form-data">
                <div class="img_user">
                    <input type="file" name="imagem_user" accept="image/*" id="imagem_user" class="image_user">
                </div>
                <div class="input_infos">
                <input type="text" placeholder="Nome" class="input_user" name="name">
                <input type="text" placeholder="Email" class="input_user" name="email">
                <input type="text" placeholder="Senha" class="input_user" name="password">
                </div>
                <div class="buttons_modal_user">
                    <button class="button_user" type="submit" style='background-color: #4CAF50;'>Criar</button>
                    <button class="button_user" type="button"  onclick="fecharModalViewUser('modal_new_user')" style='background-color: rgba(214, 5, 5, 0.73); color: white;'>Cancelar</button>
                </div>
</form>

        </div>
    </div>
</body>
<script src="/public/js/index.js"></script>
</html>