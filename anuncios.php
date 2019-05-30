<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Anúncios</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/arielle.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/anuncios.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/effects.js"></script>
  <script src="js/event.js"></script>
</head>
<body>
  <?php
      session_start();
      require_once('cms/model/DAO/conexao.php');
      $conex = new Conexao();
      $con = $conex->connectDatabase();

  ?>

  <header><?php require_once 'header.php';?></header>
        <!-- Conteúdo chamativo -->
        <div id="caixa_conteudo_chamativo" style="background-image: url(img/estabelecimento1.jpg);">
            <div id="conteudo_chamativo">
                <h1 style="color:white; font-family:Helvetica "><strong>Anúncios</strong></h1>
                <p class="texto_conteudo_chamativo" style="color:white; font-size:23px; text-align:center; margin-top:20px; font-family:Gadugi">
                    Quer adquirir os produtos da POP'Soda Drink? Confira os estabelecimentos que
                    participam da Rede POP'S.
                </p>
            </div>
        </div>

        <!-- Anuncio -->
        <section class="caixa_geral_anuncios">
            <?php
              $sql = "SELECT a.*, e.logradouro, e.numero, e.cidade, pj.nome_fantasia
                  	  FROM tbl_anuncio AS a
                        INNER JOIN tbl_pessoa_juridica AS pj ON a.cnpj = pj.cnpj
                  	    INNER JOIN tbl_p_juridica_endereco AS pje ON a.cnpj = pje.cnpj
                  	    INNER JOIN tbl_endereco AS e ON pje.id_endereco = e.id_endereco WHERE a.status =1";

              $stm = $con->prepare($sql);
              $success = $stm->execute();
              foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
            ?>

            <div class="caixa_anuncios sombra">
                <h3 style="font-family:Helvetica"> <?php echo ($result['nome_fantasia'])?></h3>
                <div class="img_anuncios">
                    <img src="cms/view/img/temp/<?php echo ($result['img_anuncios']) ?>" width="200" height="200" title="ola" alt="Imagem não encontrada">
                </div>
                <p class="caixa_anuncios_texto" style="font-size:20px">
                    <?php echo ($result['descricao'])?>
                </p>

                <div class="caixa_endereco">
                    <div class="endereco div_tamanho_fixo_endereco">
                        <p class="texto_negrito_anuncios">Logradouro:</p>
                        <span><?php echo ($result['logradouro'])?></span>
                    </div>

                    <div class="endereco div_tamanho_fixo_endereco_2">
                        <p class="texto_negrito_anuncios">Nº:</p>
                        <span><?php echo ($result['numero'])?></span>
                    </div>

                    <div class="endereco div_tamanho_fixo_endereco_3">
                        <p class="texto_negrito_anuncios">Cidade:</p>
                        <span><?php echo ($result['cidade'])?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
      <footer> <?php require_once('footer.html');?>  </footer>
    </body>
</html>
