<?php
  session_start();
  
  if(!isset($_SESSION['id'])){
    header('Location: /login');
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabela de Usuários</title>
  <link rel="stylesheet" href="../../../public/css/user_list_styles_admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="/public/css/user_list_styles.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="/public/assets/Logo-Globo.png" type="image/png">
  <script src="/public/js/modais.js"></script>
  

  <!-- Link para os ícones (Google Fonts) foi necessário somente esse link. Para adcionar outros icones, basta colocar o span referente dele -->

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
  <!-- Link para as fontes do Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Shantell+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet">
 

</head>

<body>
  <div id="filtro"></div>


  <header class="cabecalho-post">
    <div class="logo">
      <img src="../../../public/assets/user_list_admin/logo_navbar.png" alt="Logo do Diario de Bordo" class="logo">
    </div>

    <div class="titulo-post">
      <h1>Tabela de Usuários</h1>
    </div>

    <button class="div-btn" onclick=" abrirModalNewUser('modal_new_user')">      
       <p>NOVO</p>
      
      <span class="material-symbols-outlined">add_circle</span>

    </button>
  </header>

  <?php require('app\views\admin\sidebar.view.php'); ?>
  
  <div class="container-search" >

    <!-- <input type="text" id="search" placeholder="Pesquisar" icon="search" class="search-input">
      <span class="material-symbols-outlined">search</span>
    </div>-->

    <form action="/users/search" method="GET">
      <div id="btn-pesquisar" >
        <input type="text" name="busca" id="txtBusca" placeholder="Pesquisar" />
        <span class="material-symbols-outlined">search</span>
        <!--<p>Pesquisar <span class="material-symbols-outlined">search</span></p>=--->
      </div>
    </form>
  </div>

  <div class="container-principal" >
    <div class="container-user" >
      <table style="border-collapse: separate; gap:0px; border-spacing: 0 30px; align-items: center; justify-content: center; overflow: hidden;"  class="table_total">

        <thead style="border: 2px solid F0C85A; ">
 
          <tr style="width: 100%; height: 50px; 
            background-color: rgba(240, 200, 90, 1);  align-items: center; font-family: 'Shantell Sans', cursive; 
            border-radius: 20px; border: 2px solid green;">

            <th class="id"
              style="font-weight:normal; border-radius:20px 0 0 20px; border-top:2px solid #F0C85A; border-bottom: 2px solid #F0C85A ; border-left: 2px solid #F0C85A; padding: 10px; ">
              ID </th>
            <th class="titulo-postagem" style="font-weight:normal; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A;">Nome</th>
            <th class="data-post" style="font-weight:normal; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A;">Email</th>
            
            </th>
            <th class="acoes-user"
              style="font-weight:normal; border-radius:0 20px 20px 0; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A; border-right:2px solid #F0C85A;">
              Ações</th>
          </tr>
          </tr>

        </thead>
        <tbody>
        
        <?php $id_falso = $inicio + 1; ?>
          <?php foreach($users as $user):?>
          <tr id="linha-tabela">
            <td style="padding: 16px 12px; border-radius: 16px 0px  0px  16px; "><?= $id_falso++ ?></td>
            <td><?= $user->name ?></td>
            <td> <?= $user->email ?></td>
            
          
            <td style=" border-radius: 0px 16px  16px  0px;">
              <div class="icones-acoes"
                style="display: flex; justify-content: center; align-items: center; gap: 10px; flex-direction: row; ">
                <div class="icones">
                  <span class="material-symbols-outlined" onclick="abrirModalViewUser('modal_view_user_<?= $user->id ?>')">visibility</span>
                </div>
                <div class="icones">
                  <span class="material-symbols-outlined" onclick="abrirModalViewUser('modal_edit_user_<?= $user->id ?>')">edit</span>
                </div>
                <div class="icones">
                  <span class="material-symbols-outlined" onclick="abrirModalViewUser('modal_delete_user_<?= $user->id ?>')">delete</span>
                </div>
              </div>
            </td>
          </tr>

          <?php endforeach; ?>

          <?php foreach($users as $user):?>  
          <!------ Modal de Visualizar Usuário ------->

          <?php require('app\views\admin\modal_user_view.php'); ?>
         
          <!------------------------------------------>

          <!------ Modal de Editar Usuário ------->

          <?php require('app\views\admin\modal_user_edit.view.php'); ?>
         
          <!------------------------------------------>

          <!------ Modal de Deletar Usuário ------->

          <?php require('app\views\admin\delete_user.php'); ?>
         
          <!------------------------------------------>

          <?php endforeach; ?>

          <!------ Modal de Criar Usuário ------->

          <?php require('app\views\admin\modal_add_user.php'); ?>
         
          <!------------------------------------------>

          <?php
                if (!empty($users)&& is_array($users)):
                  foreach($users as $user){
                    $usuario = App\Core\App::get('database')->selectOne('users', $user->id);
                  }
                else:
                ?>
                  <tr>
                      <td colspan="4" class="text-center">Nenhum Usuário Encontrado</td>
                  </tr>
              <?php
                endif;
                ?>
        </tbody>
      </table>

      <nav class="page_box">
      
    <ul class="pagination">

    <?php $tempSearch = isset($busca) && $busca !== '' ? "&busca=" . urlencode($busca) : ""; ?> <!-- Guarda a busca atual para usar na uri da paginacao -->
    
    <li class="page-item">
      <a class="page-link <?= $page <=1 ? "disabled" : "" ?>" href="?paginacaoNumero=<?= $page - 1?><?= $tempSearch ?>" aria-label="Previous">
        <span class="arrow" aria-hidden="true" id="arrow1"></span>
        <span id="sr-only"></span>
      </a>
    </li>
         
        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
        <li  class="page_icons" ><a class ="page_link <?= $page_number == $page ? "active" : "" ?>
        " href="?paginacaoNumero=<?= $page_number?><?= $tempSearch ?>">
        <?=$page_number?> </a></li>
        <?php endfor ?>
     
        <li class="page-item" >
      <a class="page-link <?= $page >=$total_pages ? "disabled" : "" ?>" href="?paginacaoNumero=<?= $page + 1?><?= $tempSearch ?>" aria-label="Next">
        <span class="arrow" aria-hidden="true" id="arrow2"></span>
        <span class="sr-only"></span>
      </a>
    </li>

      </ul>
        </nav>


    </div>

  </div>
</body>


</html>