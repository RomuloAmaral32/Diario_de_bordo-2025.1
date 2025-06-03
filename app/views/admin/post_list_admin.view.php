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
  <title>Tabela de Postagens</title>
  <link rel="stylesheet" href="../../../public/css/styles_post_list_admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="../../../public/js/post_list_admin.js"></script>
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
      <img src="../../../public/assets/logo_navbar.png" alt="Logo do Diario de Bordo" class="logo">
    </div>

    <div class="titulo-post">
      <h1>Tabela de Postagens</h1>
    </div>

    <button class="div-btn" onclick="abrirModalNewUser('create_post')">      
       <p>NOVO</p>
      
      <span class="material-symbols-outlined">add_circle</span>

    </button>
  </header>

  <?php require('app\views\admin\sidebar.view.php'); ?>

  <div class="container-search" >

    <!-- <input type="text" id="search" placeholder="Pesquisar" icon="search" class="search-input">
      <span class="material-symbols-outlined">search</span>
    </div>-->

    <div id="btn-pesquisar" >
      <input type="text" id="txtBusca" placeholder="Pesquisar" />
      <span class="material-symbols-outlined">search</span>
      <!--<p>Pesquisar <span class="material-symbols-outlined">search</span></p>=--->
    </div>
  </div>

  <div class="container-principal" >
    <div class="container-postagem" >
      <table style="border-collapse: separate; gap:0px; border-spacing: 0 30px; align-items: center; justify-content: center;"  class="table_total">

        <thead style="border: 2px solid F0C85A; ">
 
          <tr style="width: 100%; height: 50px; 
            background-color: rgba(240, 200, 90, 1);  align-items: center; font-family: 'Shantell Sans', cursive; 
            border-radius: 20px; border: 2px solid green;">

            <th class="id"
              style="font-weight:normal; border-radius:20px 0 0 20px; border-top:2px solid #F0C85A; border-bottom: 2px solid #F0C85A ; border-left: 2px solid #F0C85A; padding: 10px; ">
              ID </th>
            <th class="titulo-postagem" style="font-weight:normal; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A;">Título da
              Postagem</th>
            <th class="data-post" style="font-weight:normal; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A;">Autor da
              Postagem</th>
            <th class="data-post" style="font-weight:normal; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A;">Data da Criação
            </th>
            <th class="acoes-post"
              style="font-weight:normal; border-radius:0 20px 20px 0; border-top:2px solid #F0C85A; border-bottom:2px solid #F0C85A; border-right:2px solid #F0C85A;">
              Ações</th>
          </tr>
          </tr>

        </thead>
        <tbody>
          <?php $id_falso = $inicio + 1; ?> 
          <?php foreach ($posts as $post): ?>
          <tr id="linha-tabela">
            <td style="padding: 16px 12px; border-radius: 16px 0px  0px  16px; "><?= $id_falso++ ?></td>
            <td><?= $post->tittle?></td>
            <td><?= $post->id_user?></td>
            <td><?= (new DateTime($post->created_at))->format('d-m-Y') ?></td>
            <td style=" border-radius: 0px 16px  16px  0px;">
              <div class="icones-acoes"
                style="display: flex; justify-content: center; align-items: center; gap: 10px; flex-direction: row; ">
                <div class="icones">
                  <span class="material-symbols-outlined" onclick="abrirModalViewUser('view_post<?= $post->id ?>')">visibility</span>
                </div>
                <div class="icones">
                  <span class="material-symbols-outlined"  onclick="abrirModalViewUser('edit_post<?= $post->id ?>')">edit</span>
                </div>
                <div class="icones">
                  <span class="material-symbols-outlined" onclick="abrirModalViewUser('delete_post<?= $post->id ?>')">delete</span>
                </div>
              </div>
            </td>
          </tr>
        
            <?php endforeach; ?>
            <?php foreach($posts as $post):?>  


          <!------ Modal de Visualizar Post ------->

          <?php require('app\views\admin\modal_view_post_admin.view.php'); ?>
         
          <!------------------------------------------>

          <!------ Modal de Editar Post ------->

          <?php require('app\views\admin\modal_edit_post.view.php'); ?>
         
          <!------------------------------------------>

          <!------ Modal de Deletar Post ------->

          <?php require('app\views\admin\modal_delete_post.view.php'); ?>
         
          <!------------------------------------------>

          

          <?php endforeach; ?>
          
          <?php require('app\views\admin\modal_create_post.view.php'); ?>
          
           
              <?php
                if (!empty($posts)&& is_array($posts)):
                  foreach($posts as $post){
                    $usuario = App\Core\App::get('database')->selectOne('users', $post->id_user);
                  }
                else:
                ?>
                  <tr>
                      <td colspan="4" class="text-center">Nenhum Post Econtrado</td>
                  </tr>
              <?php
                endif;
                ?>

        </tbody>
      </table>

      <nav class="page_box">
      
    <ul class="pagination">
    
    <li class="page-item">
      <a class="page-link <?= $page <=1 ? "disabled" : "" ?>" href="?paginacaoNumero=<?= $page - 1?>" aria-label="Previous">
        <span class="arrow" aria-hidden="true" id="arrow1"></span>
        <span id="sr-only"></span>
      </a>
    </li>
              
        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
        <li  class="page_icons" ><a class ="page_link <?= $page_number == $page ? "active" : "" ?>" href="?paginacaoNumero=<?= $page_number?>"> <?=$page_number?> </a></li>
        <?php endfor ?>
     
        <li class="page-item" >
      <a class="page-link <?= $page >=$total_pages ? "disabled" : "" ?>" href="?paginacaoNumero=<?= $page + 1?>" aria-label="Previous">
        <span class="arrow" aria-hidden="true" id="arrow2"></span>
        <span class="sr-only"></span>
      </a>
    </li>

      </ul>
        </nav>
      <!-- <div class="page_indicator">
        <a href="" class="arrow"></a> 
        <a href="" class="page_icons" id="icon_1">1</a>
        <a href="" class="page_icons">2</a>
        <a href="" class="page_icons">3</a> 
        <a href="" class="arrow" id="arrow2"> </a>
    </div> -->


    </div>

  </div>
</body>

</html>