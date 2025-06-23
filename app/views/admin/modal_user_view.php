<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuário</title>
    <link rel="stylesheet" href="/public/css/modal_user_view_styles.css">
    <script src="/public/js/modais.js"></script>
    <link rel="icon" href="/public/assets/Logo-Globo.png" type="image/png">
</head>
<body>
    <div class="modal_view_user" id="modal_view_user_<?= $user->id ?>">

        <div class="box_titulo_modal_view_user">
            <h1>VISUALIZAR USUÁRIO</h1>
        </div>

        <div class="top_modal_view_user">
            <img src="/<?= $user -> image ?>" alt="icone de usuario" class="usuario_icon">
            <h2><?=$user->id?></h2>
        </div>
 
        <div class="box_informacoes_usuario">
            <form action="">
                <div class="inputs_view">
                    <h3>Nome:</h3>
                    <div class="caixa_texto">
                        <input type="text" placeholder="<?=$user->name?>" class="edit_user" readonly>
                    </div>

                    <h3>Email:</h3>
                    <div class="caixa_texto">
                        <input type="text" placeholder="<?=$user->email?>" class="edit_user" readonly>
                    </div>
                </div>
            </form>

            <div class="botoes_acoes_user_view">
                <button id="botaoFechar" onclick="fecharModalViewUser('modal_view_user_<?= $user->id ?>')">FECHAR</button>
            </div>
        </div>

    </div>
</body>
</html>