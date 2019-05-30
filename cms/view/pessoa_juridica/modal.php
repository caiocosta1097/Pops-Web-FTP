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
    require_once "$path_local/cms/controller/controllerPessoaJuridica.php";

    // Instânciando a classe do controler
    $controllerPessoaJuridica = new ControllerPessoaJurica();

    // Result set que recebe os dados
    $rsUser = $controllerPessoaJuridica->buscarRegistro();

    $id = $_GET["id"];

    $nome_fantasia=  $rsUser->getNomeFantasia();
    $razao_social = $rsUser->getRazaoSocial();
    $cnpj= $rsUser->getCnpj();
    $email= $rsUser->getEmail();
    $celular= $rsUser->getCelular();
    $telefone= $rsUser->getTelefone();
    $foto=$rsUser->getFoto();
    $cidade = $rsUser->getCidade();
    $logradouro=$rsUser->getLogradouro();
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
  <div class="modal-pessoa-juridica centralizarX">
    <div class="head-pessoa-juridica">
      <span>INFORMAÇÕES</span>
      <a id="close" class="btn-close trigger" href="#">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>

    <div class="form_informacoes centralizarX">
      <div class="form_divisa_info">
        <label for="txt_escola">Nome Fantasia:</label>
        <input readonly type="text" id="txt_nome_fantasia" name="txt_nome_fantasia" value="<?= @$nome_fantasia?>">

        <label for="txt_escola">CNPJ:</label>
        <input  readonly type="text" id="txt_cnpj" name="txt_cnpj" value="<?= @$cnpj?>">

        <label for="txt_escola">E-mail:</label>
        <input readonly type="text" id="txt_email" name="txt_email" value="<?= @$email?>">

        <label for="txt_escola">Logradouro:</label>
        <input  readonly type="text" id="txt_logradouro" name="txt_logradouro" value="<?= @$logradouro?>">

        <label for="txt_escola">Cidade:</label>
        <input  readonly type="text" id="txt_logradouro" name="txt_logradouro" value="<?= @$cidade?>">
      </div>

      <div class="form_divisa_info">
        <div class="divisa-modal">
          <label for="txt_escola">Razão Social:</label>
          <input readonly type="text" id="txt_razao_social" name="txt_razao_social" value="<?= @$razao_social?>">

          <div class="divisa-modal-contatos">
            <div class="metade">
              <label for="txt_escola">Celular:</label>
              <input readonly type="text" id="txt_razao_social" name="txt_razao_social" value="<?= @$celular?>">
            </div>

            <div class="metade">
              <label for="txt_escola">Telefone:</label>
              <input  readonly type="text" id="txt_razao_social" name="txt_razao_social" value="<?= @$telefone?>">
            </div>
          </div>

        </div>


        <label for="txt_escola">Foto:</label>
        <div class="descarregar_imagem">
          <img src="<?= "$path_url/cms/view/img/temp/".$foto ?>" alt="">
        </div>
      </div>
    </div>
  </div>
</body>
</html>
