<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>

    <link rel="stylesheet" href="/public/css/modal_user_edit.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<body> 
    <div class="modal_edit_user" id="modal_edit_user_<?= $user->id ?>">
        <div class="top_edit_user">
            <h1>EDITAR USUÁRIO</h1>
        </div>
       
        <div id="container_edit_input"  class="container_edit_input">
            <form action="/users/edit" method="post" enctype="multipart/form-data">
             <div class="user_icon">
                <img src="/<?= $user -> image ?>" alt="user">
            </div>
            <input type="file" name="imagem_user" accept="image/*"  id="imagem" class="edit_img">
                 <input type="hidden" name="id" value="<?= $user->id ?>">
                <div class="input_edit_inf">
                <h2>Nome:</h2>
                    <div class="box_edit">
                        <input type="text" value="<?= $user->name?>" class="edit_user" name="name" maxlength="30">
                        <img src="/public/assets/modal_edit_user/pen.png" alt="icon edit">
                    </div>
                <h2>Email:</h2>
                    <div class="box_edit">
                        <input type="text" value="<?= $user->email?>" class="edit_user" name="email">
                        <img src="/public/assets/modal_edit_user/pen.png" alt="icon edit">
                    </div>
                <h2>Senha:</h2>
                    <div class="box_edit">
                        <input type="password" value="<?= $user->password?>" class="edit_user" name="password">
                        <img src="/public/assets/modal_edit_user/pen.png" alt="icon edit">
                    </div>
                </div>
            
            <div id="buttons_modal_edit" class="buttons_modal_edit">
                <button class="button_input" type="submit" style='background-color: #4CAF50;'>Salvar</button>
                
                <button class="button_input" type="button" onclick="fecharModalViewUser('modal_edit_user_<?= $user->id ?>')" style='background-color: rgba(214, 5, 5, 0.73); color: white;' >Cancelar</button>
            </div>
            </form>
        </div>

    </div>
</body>
</html>