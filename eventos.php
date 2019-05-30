<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Eventos</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/arielle.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/event.js"></script>
  <script src="js/effects.js"></script>
</head>
<body>
	<?php 
		session_start();
		require_once('cms/model/DAO/conexao.php');   
		$conex = new Conexao();
		$con = $conex->connectDatabase();

     ?>
  <header><?php require_once 'header.php'; ?></header>
    <div class="principal">
      <div class="titulo_pagina font-titulo">
          <h1>Eventos</h1>
      </div>

      <div class="caixa_filtro_eventos">

      </div>
	
		<?php		
			$sql = "SELECT * FROM tbl_eventos WHERE status = 1";
			$stm = $con->prepare($sql);
			$success = $stm->execute();
			foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
        ?>
      <div class="body-eventos-informacoes">
          <div class="area-div-data">
            <div class="box-data">
              <img src="img/logos.png" alt="data" title="data" class="data">
            </div>
          </div>

          <div class="area-div-conteudo">
            <div class="box-nome-evento">
              <?php echo (utf8_decode($result['titulo'])) ?>
            </div>

            <div class="box-descricao-evento">
              <?php echo (utf8_decode($result['descricao'])) ?>
            </div>

            <div class="localidade-evento">
              <div class="linha"> </div>
              <h6> ONDE:
                <span><?php echo (utf8_decode($result['localidade'])) ?></span>
              </h6>

              <h6> QUANDO:
                <span> <?php echo date('d/m/Y', strtotime($result['dt_evento'])); ?> </span>
              </h6>
            </div>
          </div>
      </div>
	  
		<?php } ?>

    </div>
  <footer><?php require_once 'footer.html'; ?></footer>
</body>
</html>
