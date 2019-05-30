<?php
// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

  if(isset($_GET["id"])){
    // Importando a controller de enquetes
    require_once "$path_local/cms/controller/controllerPops_Nas_Escolas.php";

    // Instânciando a classe do controler
    $controllerEscola = new ControllerEscolas();

    // Result set que recebe os dados
    $rsEscolas = $controllerEscola->buscarRegistro();

    $id = $_GET["id"];

    $escola = $rsEscolas ->getEscola();
    $cnpj= $rsEscolas ->getCNPJ();
    $responsavel = $rsEscolas ->getResponsavel();
    $localidade = $rsEscolas ->getLocalidade();
    $email = $rsEscolas ->getEmail();
    $telefone = $rsEscolas ->getTelefone();
    $motivo = $rsEscolas ->getMotivo();

  }

 ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat Modal Window</title>
  <link rel="stylesheet" href="$path_url/cms/view/css/style.css">

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
  <div class="modal-escola centralizarX">
    <div class="head-escola">
      <span>DETALHES</span>
      <a id="close" class="btn-close trigger" href="#">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>

    <div class="form_escola1 centralizarX">
      <form class="" action="index.html" method="post">
        <div class="divisao_escola">
          <label for="txt_escola">Escola:</label>
          <input type="text" id="txt_escola" name="txt_escola" value="<?= @$escola ?>">

          <label for="txt_cnpj">CNPJ:</label>
          <input type="text" id="txt_cnpj" name="txt_cnpj" value="<?= @$cnpj ?>">

          <label for="txt_email">E-mail:</label>
          <input type="text" id="txt_email" name="txt_email" value="<?= @$email ?>">
        </div>

        <div class="divisao_escola">
          <label for="txt_responsavel">Responsavel:</label>
          <input type="text" id="txt_responsavel" name="txt_responsavel" value="<?= @$responsavel?>">

          <label for="txt_localidade">Localidade:</label>
          <input type="text" id="txt_localidade" name="txt_localidade" value="<?= @$localidade ?>">

          <label for="txt_telefone">Telefone:</label>
          <input type="text" id="txt_telefone" name="txt_telefone" value="<?= @$telefone ?>">
        </div>

        <div class="final_form" >
          <label for="txt_setor" style="margin-left:250px;"> Motivo:</label>
          <textarea name="name" rows="8" cols="60"><?=@$motivo ?> </textarea>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
