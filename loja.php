 <!DOCTYPE html>
 <html lang="pt">
   <head>
     <meta charset="utf-8">
     <title> Loja Pop's</title>
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/reset.css">
     <link rel="stylesheet" href="css/arielle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="js/jquery.js"></script>
     <script src="js/event.js"></script>
     <script src="js/effects.js"></script>
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
         <div class="area-brindes">
           <a href="carrinho.php">
              <div class="carrinho-compras"></div>
           </a>

           <?php
              $sql = "SELECT * FROM tbl_brinde WHERE status = 1";
              $stm = $con->prepare($sql);
              $success = $stm->execute();
              foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        	?>

           <div class="caixa-produtos-brindes">
             <div class="card-imagem-brinde">
               <img src="cms/view/img/temp/<?php echo ($result['imagem'])?>" alt="">
             </div>

             <div class="descricao-brinde">
               <p> <?php echo (utf8_decode($result['nome'])) ?> </p>
               <span> R$ <?php echo number_format(($result['valor_unitario']), 2, ',', ' '); ?></span> <p></p>
               <input type="submit" name="btnCompra" Value="Comprar" onclick="adicionarCarrinho(<?= ($result['id_brinde'])?>, event)">
             </div>
           </div>

          <?php } ?>

         </div>
       </div>
       <footer> <?php require_once 'footer.html'; ?></footer>
   </body>
 </html>
