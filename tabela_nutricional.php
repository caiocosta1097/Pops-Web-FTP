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
    require_once "$path_local/cms/controller/controllerProduto.php";

    // Instânciando a classe do controler
    $controllerProduto = new ControllerProduto();

    // Result set que recebe os dados
    $rsProduto = $controllerProduto->buscarRegistro();

    $id = $_GET["id"];

    $valor_energetico = $rsProduto->getValorEnergetico();
    $carboidratos = $rsProduto-> getCarboidratos();
    $proteinas = $rsProduto -> getProteinas();
    $gorduras_totais = $rsProduto -> getGorduraTotais();
  }
 ?>


<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Tabela nutrional</title>
    <link rel="stylesheet" href="css/arielle.css">
    <!-- <link rel="stylesheet" href="cms/view/css/style.css"> -->
    <script>
    $(document).ready(function(){
      //function para fechar a modal

      $('#close').click(function(){
        $('#container').fadeOut(400);
      });
    });
    </script>
  </head>
  <body>
    <div class="modal-tabela-nutrional">
    <div class="head-tabela">
      <span>Tabela nutrional</span>
      <a id="close" class="btn-close trigger" href="#">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>

      <div class="modal-header-tabela-nutrional">
        <h4> Informações nutrional </h4>
      </div>

      <div class="quantidade-porcao">
        <h5>Valor energetico </h5>
      </div>

      <div class="porcentagem-porcao">
        <h5> <?= $valor_energetico ?> </h5>
      </div>

      <div class="quantidade-porcao">
        <h5> Carboidratos </h5>
      </div>

      <div class="porcentagem-porcao">
        <h5> <?= $carboidratos

         ?> </h5>
      </div>

      <div class="quantidade-porcao">
        <h5>Proteínas </h5>
      </div>

      <div class="porcentagem-porcao">
        <h5> <?= $proteinas ?> </h5>
      </div>

      <div class="quantidade-porcao">
        <h5>Gorduras totais </h5>
      </div>

      <div class="porcentagem-porcao">
        <h5> <?= $gorduras_totais ?> </h5>
      </div>

    </div>
  </body>
</html>
