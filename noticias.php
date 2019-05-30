<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Notícias</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/noticias.css">
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
        <header><?php require_once 'header.php';?></header>

        <!-- Título da página -->
        <div class="titulo_pagina font-titulo">
            <h1>Notícias</h1>
        </div>

        <!-- caixa que guarda todo o conteudo da página -->
        <div id="caixa_geral_noticias">
          <?php
  					$sql = "SELECT * FROM tbl_noticia WHERE status = 1 ";
  					$stm = $con->prepare($sql);
  					$success = $stm->execute();
  					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        	?>

            <!-- caixa que guarda todas as noticias -->
            <div class="caixa_principal_noticias">
                <!-- caixa que contém imagem, titulo, texto e data da notícia -->
                <div class="imagem_noticias">
                    <img src="cms/view/img/temp/<?php echo ($result['imagem']) ?>" width="200" height="200" title="ola" alt="Imagem não encontrada">
                </div>
                <div class="caixa_titulo_noticias">
                    <h1 class="titulo_noticias padding_noticias">
                        <?php echo ($result['titulo'])?>
                    </h1>
                    <p class="texto_noticias padding_noticias">
                        <?php echo ($result['descricao']) ?>
                    </p>
                    <p class="data_noticias">
                        <?php echo date('d/m/Y', strtotime($result['dt_noticia'])); ?>
                    </p>
                </div>
            </div>

            <?php } ?>
        </div>

        <!-- footer -->
        <footer> <?php require_once('footer.html')?></footer>
    </body>
</html>
