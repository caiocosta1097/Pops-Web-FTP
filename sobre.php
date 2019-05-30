<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <title>Sobre</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/reset.css">
      <link rel="stylesheet" type="text/css" href="css/sobre.css">
      <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- CHAMANDO O JQUERY -->
      <script src="js/jquery.js">
      </script>
      <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
      <script src="js/event.js">
      </script>
       <script src="js/effects.js"></script>
  </head>
    <body>
      <?php
        session_start();
        require_once('cms/model/DAO/conexao.php');
        $conex = new Conexao();
        $con = $conex->connectDatabase();
      ?>
        <!-- header -->
          <header>
            <?php require_once('header.php') ?>
          </header>

        <!-- Título da página -->
        <div class="titulo_pagina font-titulo">
            <h1>Sobre</h1>
        </div>

        <!-- caixa que contém todo o conteúdo -->
        <div class="caixa_geral_sobre centralizar_div caixa_crescer">
          <?php
            $sql = "SELECT * FROM tbl_quem_somos WHERE status = 1";
            $stm = $con->prepare($sql);
            $success = $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
          ?>

          <!-- CAIXA DO SOBRE ITEM -->
            <div class="caixa_principal_sobre centralizar_div caixa_crescer">


                <div class="caixa_titulo_e_imagem centralizar_div">
                    <div class="imagem div_esquerda">
                        <img src="cms/view/img/temp/<?php echo ($result['imagem']) ?>" width="80" height="50" title="missao icon" alt="Imagem não encontrada">
                    </div>
                    <div class="titulo-sobre div_direita">
                        <h1><?php echo (utf8_decode($result['titulo']))?></h1>
                    </div>
                </div>

                <div class="caixa_texto centralizar_div caixa_crescer">
                    <p>
                      <?php echo (utf8_decode($result['descricao']))?>
                    </p>
                </div>


            </div>
            <?php
              }
            ?>
        </div>

        <!-- footer -->
      <footer>  <?php require_once('footer.html') ?> </footer>
    </body>
</html>
