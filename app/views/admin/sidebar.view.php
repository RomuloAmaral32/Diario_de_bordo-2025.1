<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/styles_sidebar.css">
    <title>Sidebar</title>
</head>
<body>
    <main>
        <aside class="sidebar fechada" id="sidebar">
            <div class="conteudo">
                <button id="menu">
                    <img src="/public/assets/sidebar/MenuIcon.png" alt="Menu" class="icone">
                </button>
        
                <ul class="itens">
                    <li class="item">
                        <a href="/">
                            <img src="/public/assets/sidebar/CasaIcon.png" alt="Casa" class="icone">
                            <span class="descricao">Home</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/dashboard">
                            <img src="/public/assets/sidebar/DashboardIcon.png" alt="Dashboard" class="icone">
                            <span class="descricao">Dashboard</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/posts">
                            <img src="/public/assets/sidebar/PublicacoesIcon.png" alt="Publicações" class="icone">
                            <span class="descricao">Publicações</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/users">
                            <img src="/public/assets/sidebar/UsuariosIcon.png" alt="Usuários" class="icone">
                            <span class="descricao">Usuários</span>
                        </a>
                    </li>
                </ul>

                <form action="logout" method="POST">
                <button id="logout" type="submit">
                    <img src="/public/assets/sidebar/LogoutIcon.png" alt="Logout" class="icone">
                    <span class="descricao">Logout</span>
                </button>
                </form>
            </div>
        </aside>
    </main>
    <script src="/public/js/sidebar.js"></script>
</body>
</html>
