<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>História da marca</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/arielle.css">
        <link rel="stylesheet" type="text/css" href="css/historia_marca.css">
        <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/anuncios.css">
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

        <!-- Conteúdo chamativo e Título da página -->
        <div id="caixa_conteudo_chamativo" style="background-image: url(img/sobre.jpg);">
            <div id="conteudo_chamativo">
                <h1 style="color:white;">Historia da Marca</h1>
            </div>
        </div>

        <!-- Conteudo da pagina -->
        <div class="caixa_historia_marca centralizar_caixa">
            <div class="texto centralizar_caixa">
            <?php		
					$sql = "SELECT * FROM tbl_historia";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
        	?>
                <p>
                    <?php echo (utf8_decode($result['descricao'])) ?>
                </p>
            <?php } ?>
            </div>
        </div>

        <footer>
            <?php require_once('footer.html') ?>
        </footer>
    </body>
</html>
