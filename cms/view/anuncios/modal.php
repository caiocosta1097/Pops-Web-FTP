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
    require_once "$path_local/cms/controller/controllerAnuncio.php";

    // Instânciando a classe do controler
    $controllerAnuncio = new ControllerAnuncio();

    // Result set que recebe os dados
    $rsAnuncios = $controllerAnuncio->buscarRegistro();

    $id = $_GET["id"];
    $status = $_GET["status"];


    $estabelecimento= $rsAnuncios ->getEstabelecimento();
    $anuncio_descricao= $rsAnuncios ->getAnuncio();
    $imagem = $rsAnuncios -> getImagem();

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
  <div class="modal-anuncio centralizarX">
    <div class="head-anuncio">
      <span>ANUNCIO</span>
      <a id="close" class="btn-close trigger" href="#">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>

    <div class="form_comentario centralizarX">
      <div class="divisa-anuncio">

          <form class="" action="index.html" method="post">
              <label for="txt_estabelecimento">Estabelecimento:</label>
              <input readonly type="text" id="txt_user" name="txt_user" value="<?= @$estabelecimento ?>">

              <label for="txt_cnpj">Anuncio:</label>
              <textarea readonly name="txt_comentario" rows="8" cols="80"><?= @$anuncio_descricao ?></textarea>
          </form>
      </div>

      <div class="divisa-anuncio">
      <label for="txt_estabelecimento">Imagem do anuncio:</label>

      <div class="descarregar_imagem">
        <img src="<?= "$path_url/cms/view/img/temp/".$imagem ?>" alt="">
      </div>
    </div>

      <div class="icones_status_anuncio">
        <div onclick="router_status('anuncio', 'status', <?= $id?>, <?= $status?>);">
          <img style="width:70px; height:70px; margin-top:32px; margin-left: 50px; float:left;" src="<?= "$path_url/cms/view/img/icon_close.png" ?>" alt="Negar" title="Negar">
        </div>

        <div  onclick="router_status('anuncio', 'status', <?= $id?>, <?= $status?>);">
          <img style="width:140px; height:130px; margin-top:-95px; float:left;" src="<?= "$path_url/cms/view/img/aprovar.jpg" ?>" alt="Aprovar" title="Aprovar">
        </div>
      </div>
    </div>
</body>
</html>
