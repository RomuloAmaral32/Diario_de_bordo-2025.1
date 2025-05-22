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
        <div id="user_icon">
            <img src="/public/assets/modal_edit_user/account.png" alt="user">
        </div>
        <div id="container_edit_input">
            <form action="users/edit" method="POST">
                <div class="input_edit_inf">
                <h2>Nome:</h2>
                    <div class="box_edit">
                        <input type="text" value="<?= $user->name?>" class="edit_user">
                        <img src="/public/assets/modal_edit_user/pen.png" alt="icon edit">
                    </div>
                <h2>Email:</h2>
                    <div class="box_edit">
                        <input type="text" value="<?= $user->email?>" class="edit_user">
                        <img src="/public/assets/modal_edit_user/pen.png" alt="icon edit">
                    </div>
                <h2>Senha:</h2>
                    <div class="box_edit">
                        <input type="text" value="<?= $user->password?>" class="edit_user">
                        <img src="/public/assets/modal_edit_user/pen.png" alt="icon edit">
                    </div>
                </div>
            
            <div id="buttons_modal_edit">
                <button class="button" type="submit" style='background-color: #4CAF50;'><h3>Salvar</h3></button>
                
                <button class="button" type="button" onclick="fecharModalViewUser('modal_edit_user_<?= $user->id ?>')" style='background-color: rgba(214, 5, 5, 0.73); color: white;' ><h3>Cancelar</h3></button>
            </div>
            </form>
        </div>

    </div>
</body>
</html>