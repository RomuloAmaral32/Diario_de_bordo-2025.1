<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal de Deletar o Usuário</title>
    <link rel="stylesheet" href="/public/css/delete_user_styles.css">
    <link rel="icon" href="/public/assets/Logo-Globo.png" type="image/png">
</head>
<body>
    <div class="modal_delete_box" id="modal_delete_user_<?= $user->id ?>">
        <div class="box_delete_titulo">
            <h1 class="delete_titulo">Você realmente quer excluir este usuário?</h1>
        </div>
        <div class="box_botoes">
            <div class="botoes_acoes">
            <form action="/users/delete" method="POST" >

            <input type="hidden" name="id" value="<?= $user->id ?>">
            
                <button id="botaoCancelarDoDelete" type="submit" style='background-color: #4CAF50;' >EXCLUIR</button>

                <button id="botaoExcluir" type="button" onclick="fecharModalViewUser('modal_delete_user_<?= $user->id ?>')" style='background-color: rgba(214, 5, 5, 0.73); color: white;'>CANCELAR</button>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>