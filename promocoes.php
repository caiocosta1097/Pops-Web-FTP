<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Promoções</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/murilo.css">
  <link rel="stylesheet" href="css/arielle.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/event.js"></script>
  <script src="js/effects.js"></script>

  <script>
    function teste(){
      alert('OK');
    }

  </script>
</head>
<body>
    <?php
		session_start();
		//Iniciando as variáveis em null para não haver erro
		$path_local = null;
		$path_url = null;

		require_once('cms/model/DAO/conexao.php');
		$conex = new Conexao();
		$con = $conex->connectDatabase();

    ?>
  <header><?php require_once 'header.php'; ?></header>

    <div class="principal">
      <div class="titulo_pagina font-titulo">
          <h1 class="title-pag-promocoes">Promoções</h1>
      </div>
      <?php
					$sql = "SELECT * FROM tbl_promocao WHERE status = 1";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
      ?>
 
      <div class="section-three-conteudo centralizar_elemento">
        <div class="section-three-conteudo-imagem centralizarY">
          <img class="centralizar_elemento" src="img/7upPromocao.jpg" alt="Promoção">
        </div>
        <div class="section-three-conteudo-infomarcao">
          <div class="section-three-conteudo-titulo"><?php echo (utf8_decode($result['titulo'])) ?></div>
          <div class="section-three-conteudo-texto">
            <?php echo (utf8_decode($result['descricao'])) ?><br>
            <?php 
                if(@$_COOKIE['id_p_fisica'] && $result['precisa_cadastro'] == 1){
                  echo "<input type='button' onclick='teste()' class='btn_votar btnParticipar' value='Participe'></a><br>"; 
                }else if(@$_COOKIE['id_p_fisica'] == null && $result['precisa_cadastro'] == 1){
                  echo "<a href='login_compra.php?pf'><input type='button' class='btn_votar btnParticipar' value='Participe'>
                  <br><a/>";
                }  
            ?>
          </div>
        </div>
      
      </div>

      <?php } ?>

    </div>
  <footer> <?php require_once 'footer.html'; ?></footer>
  </body>
</html>
