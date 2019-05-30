<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <title>Produtos</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/murilo.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/arielle.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="js/jquery.js"></script>
      <script src="js/event.js"></script>
      <script src="js/ws_requests.js"></script>

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
        <div class="area-produtos">
          <a href="carrinhoPJ.php">
            <div class="carrinho-compras"></div>
          </a>

          <?php
             $sql = "SELECT * FROM tbl_produto WHERE status = 1";
             $stm = $con->prepare($sql);
             $success = $stm->execute();
             foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
         ?>

          <div class="section-six-products">
            <div class="section-six-image-products centralizar_elemento">
              <img src="cms/view/img/temp/<?php echo ($result['imagem'])?>" alt="">
            </div>
            <div class="section-six-text-products">
              <h2>Fardo com  <?php echo (utf8_decode($result['qtd_fardo'])) ?> <?php echo (utf8_decode($result['nome'])) ?> de <?php echo (utf8_decode($result['unidade_medida'])) ?>ml </h2>
              <p>R$ <?php echo number_format(($result['qtd_fardo']*$result['valor_unitario']), 2, ",", "") ?></p>
            </div>
            <div class="section-six-button">
              <input type="button" name="" value="Adicionar o fardo" onclick="adicionarFardo(<?= ($result['id_produto'])?>, event)">
            </div>
        </div>
      <?php } ?>
      </div>
      </div>
      <footer><?php require_once 'footer.html'; ?></footer>
      </body>
  </html>
