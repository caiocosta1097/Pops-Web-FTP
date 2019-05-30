<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Nossos Patrocínios</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/patrocinios.css">
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
		
      <header>
        <?php require_once('header.php');?>
      </header>

        <!-- Título da página -->
        <div id="conteudo_chamativo">
            <h1>Nossos Patrocínios</h1>
        </div>

        <!-- caixa central que ocupa 100% de largura -->
        <div id="caixa_central_imagens">
			<?php		
				$sql = "SELECT * FROM tbl_patrocinio WHERE status = 1";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
			?>
            <!-- caixa da imagem -->
            <div class="caixa_imagem">
                <img src="cms/view/img/temp/<?php echo ($result['logo']) ?>" width="330" height="250" title="volei Hinode" alt="Imagem não encontrada" class="imgPatrocinio">
                <div class="descricaoPatrocinio">
                  <?php echo (utf8_encode($result['nome'])) ?>
                </div>
            </div>
		
			<?php } ?>
            
        </div>

        <!-- FOOTER -->
      <footer>  <?php require_once('footer.html')?> </footer>
    </body>
</html>
