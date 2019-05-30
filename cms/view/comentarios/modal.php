<?php
// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

  if(isset($_GET["id"])&isset($_GET["status"])){
    // Importando a controller de enquetes
    require_once "$path_local/cms/controller/controllerComentario.php";

    // Instânciando a classe do controler
    $controllerComentario = new ControllerComentario();

    // Result set que recebe os dados
    $rsComentarios = $controllerComentario->buscarRegistro();

    $id = $_GET["id"];
    $status = $_GET["status"];

    $user = $rsComentarios ->getUser();
    $comentario_user= $rsComentarios ->getComentario();


  }

 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat Modal Window</title>
  <link rel="stylesheet" href="../css/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="<?= "$path_url/cms/view/js/jquery.js" ?>"></script>
  <script src="<?= "$path_url/cms/view/js/ajax.js" ?>"></script>
</head>

<script>
$(document).ready(function(){
  //function para fechar a modal

  $('#close').click(function(){
    $('#container').fadeOut(400);
  });
});
</script>

<body>
<!-- Modal -->
  <div class="modal-comentario centralizarX">
    <div class="head-comentario">
      <span>COMENTARIO</span>
      <a id="close" class="btn-close trigger" href="#">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>

    <div class="form_comentario centralizarX">
      <form class="" action="index.html" method="post">
          <label for="txt_escola">Nome do usuario:</label>
          <input type="text" id="txt_user" name="txt_user" value="<?= @$user ?>" readonly>

          <label for="txt_cnpj">Comentario:</label>
          <textarea name="txt_comentario" rows="8" cols="80" readonly><?= @$comentario_user ?></textarea>

          <div class="icones_status">
            <div class="aprovar_negar" onclick="router_status('comentario', 'status', <?= $id?>, <?= $status?>);">
              <img style="width:140px; height:140px; float:left;" src="<?= "$path_url/cms/view/img/aprovar.jpg" ?>" alt="Aprovar" title="Aprovar">
            </div>


            <div class="aprovar_negar" onclick="router_status('comentario', 'status', <?= $id?>, <?= $status?>);">
              <img style="width:70px; height:70px; margin-top:32px;" src="<?= "$path_url/cms/view/img/icon_close.png" ?>" alt="Negar" title="Negar">
            </div>
          </div>


      </form>
    </div>
  </div>
</body>
</html>
