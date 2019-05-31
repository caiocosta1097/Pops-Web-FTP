<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Pop'Soda Drink</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/murilo.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="icon" href="img/logos.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/arielle.css">
  <link rel="stylesheet" href="css/loading.css">
  <link rel="stylesheet" href="css/effects.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/effects.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
    $(document).ready(function(){
          //SELECIONAR DADOS VIA COOKIE
          getAllDataPJ();
          getAllData();
    });
    function teste()
    {
      alert('Participando...');
    }
  </script>
</head>
<body>
      <?php
  // Variáveis que recebem a URL e o caminho local
        $path_url = "http://".$_SERVER['HTTP_HOST']."/web";
        $path_local = $_SERVER['DOCUMENT_ROOT']."/web";

        session_start();
        // Criando variáveis de sessões que recebem esses valores
        $_SESSION['path_url'] = $path_url;
        $_SESSION['path_local'] = $path_local;

        require_once('cms/model/DAO/conexao.php');
        require_once('cms/controller/controllerEnquete.php');
        require_once('cms/model/DAO/promocaoDAO.php');
        $conex = new Conexao();
        $con = $conex->connectDatabase();

        if (isset($_POST['btn_enviar'])) {
   
          if (isset($_COOKIE['id_p_fisica'])) {
            $resposta = $_POST['txt_resposta'];
            $id = $_GET['id'];
            $id_pessoa = $_COOKIE['id_p_fisica'];
      
            $sqlInsert = "INSERT INTO tbl_resposta (descricao, id_comentario, id_p_fisica) VALUES ('$resposta', '$id', '$id_pessoa')";

            if(!$con->query($sqlInsert)){
              echo "Erro no script de insert";
            }

            header("location:index.php");

          }else{

            echo "<script>alert('Para realizar essa ação, você deve estar logado!'); 
                  window.location.href = 'login_compra.php?pf';</script>";

          }
      
        }

        else if(isset($_POST['btnEnviarEmail'])){

          $respostaEmail = $_POST['txt_email'];

          $sqlInsertEmail = "INSERT INTO tbl_email (email) VALUES ('".$respostaEmail."')";

          if(!$con->query($sqlInsertEmail)){
            echo "Erro no script de insert";
          }
            header("location:index.php");

          }
        

        //call controllers
        $controllerEnquete = new ControllerEnquete();
        $rsEnquete = $controllerEnquete->listarRegistros();

      ?>
      <header>
        <?php require_once 'header.php'; ?>
      </header>
    <div id="loading">
     <div id="loader"></div>
    </div>
      <div id="index_principal" style="display:none;">
      <div id="inicio" class="centralizarY">
        <div id="conteudo_inicio" class="centralizarX">
          <div id="titulo_inicio" class="fadeInLeft"  style="font-family:Helvetica;">
            Já conhece os produtos da POP'S?
          </div>
          <div id="texto_inicio" class="fadeInRight">
             A POP'Soda Drink é uma fornecedora de bebidas não alcoólicas, como: refrigerantes, sucos naturais, polpas e água tônica. Confira todos os benefícios que você terá ao navegar o nosso site!
          </div>
        </div>
      </div>
      <!-- SECTION 6 -->
      <section class="section-six">
        <h1 class="titulo_sections">Produtos em destaque</h1>
        <div class="section-six-conteudo centralizar_elemento">

            <div id="box_products" class="section-six-div-products fadeInTop">
            <?php
              $sql = "SELECT * FROM tbl_produto WHERE status_home = 1 ORDER BY RAND() LIMIT 4";
              $stm = $con->prepare($sql);
              $success = $stm->execute();
              foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        	  ?>
              <div class="section-six-products">
                <div class="section-six-image-products centralizar_elemento">

                  <img src="cms/view/img/temp/<?php echo ($result['imagem']) ?>" alt="Produto">

                </div>
                <div class="section-six-text-products">
                  <h2><?php echo ($result['nome']) ?></h2>
                </div>

                <div class="section-six-button">
                  <input type="button" value="Tabela nutrional">

                </div>

              </div>
            <?php } ?>
          </div>
        </div>

      </section>
      <!-- SECTION 2 -->
      <section class="section-two">
        <h1 class="titulo_sections">Participe das enquetes da POP'S</h1>
        <div id="enquetes" class="div-geral-section-imagens centralizar_elemento fadeInTop">
          <?php
          
               foreach ($rsEnquete as $enquete) {
                
                $rsOption = $controllerEnquete->listarOpcoes($enquete->getId());
                $respostas = explode(",", $rsOption->getResposta());
                $idRespostas = explode(",", $rsOption->getId_opcao());
               
          ?>

          <div class="imagens-section-two centralizarY">
            <div  class="caixa_enquete centralizar_elemento">
              <div class="titulo_enquete"><?php echo ($enquete->getTitulo()) ?></div>
              <div class="itens_enquete centralizar_elemento">
                
                <input type="radio"  name="rdo_option<?=$enquete->getId()?>" 
                id="rdo_option<?=$respostas[0]?>" value="<?=$idRespostas[0]?>" required><?=$respostas[0]?><br><br>
                
                <input type="radio"  name="rdo_option<?=$enquete->getId()?>" 
                id="rdo_option<?=$respostas[1]?>" value="<?=$idRespostas[1]?>" required><?=$respostas[1]?><br><br>
                
                <input type="radio"  name="rdo_option<?=$enquete->getId()?>" 
                id="rdo_option<?=$respostas[2]?>" value="<?=$idRespostas[2]?>" required><?=$respostas[2]?><br><br>
                
                <input type="radio"  name="rdo_option<?=$enquete->getId()?>" 
                id="rdo_option<?=$respostas[3]?>" value="<?=$idRespostas[3]?>" required><?=$respostas[3]?><br><br>
               
                <br><br>
              </div>
              <input type="button"  onclick="answer(<?=$enquete->getId()?>)" class="btn_votar" value="Votar">
            </div>
          </div>
        
          <?php } ?>
        </div>
      </section>

      <!-- SECTION 3 -->
      <section class="section-three">
        <h1 class="titulo_sections">Promoção do mês</h1>
        <div id="promo" class="section-three-conteudo centralizar_elemento fadeInTop">
          <div class="section-three-conteudo-infomarcao">
            <?php
              $sql = "SELECT * FROM tbl_promocao WHERE status_home = 1 ORDER BY rand() LIMIT 1";
              $stm = $con->prepare($sql);
              $success = $stm->execute();
              foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
            ?>
              <div class="section-three-conteudo-titulo"><?php echo ($result['titulo']) ?></div>
              <div class="section-three-conteudo-texto">
                <?php echo ($result['descricao']) ?>
                <?php 
                  if(@$_COOKIE['id_p_fisica'] && $result['precisa_cadastro'] == 1){
                    echo "<input type='button' onclick='teste()' class='btn_votar btnParticipar' value='Participe'></a><br>"; 
                  }else if(@$_COOKIE['id_p_fisica'] == null && $result['precisa_cadastro'] == 1 ){
                    echo "<a href='login_compra.php?pf'><input type='button' class='btn_votar btnParticipar' value='Participe'>
                    <br></a>";
                  }  
                ?>
              </div>
              
              
              
          </div>
          <div class="section-three-conteudo-imagem centralizarY">
            <img src="cms/view/img/temp/<?php echo ($result['img_promo']) ?>" width="330" height="250" title="volei Hinode" alt="Imagem não encontrada" class="imgPatrocinio">
          </div>

          <?php } ?>
        </div>
      </section>

      <!-- SECTION 4 -->
      <section class="section-four">
        <h1 class="titulo_sections">Fique de olho na POP'S</h1>
        <div  id="news" class="section-four-conteudo centralizar_elemento fadeInLeft">
            <?php
              $sql = "SELECT * FROM tbl_noticia WHERE status_home = 1 ORDER BY rand() LIMIT 1";
              $stm = $con->prepare($sql);
              $success = $stm->execute();
              foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
            ?>

          <div class="caixa_noticia ">
            <div class="caixa_noticia-imagem centralizarY">
              <img class="centralizar_elemento" src="cms/view/img/temp/<?php echo ($result['imagem']) ?>" alt="Notícia">
            </div>
            <div class="caixa_noticia-infomarcao">
              <div class="informacoes">
                <div class="caixa_noticia-titulo">
                  <?php echo ($result['titulo']) ?>
                </div>
                <div class="caixa_noticia-texto">
                  <?php echo ($result['descricao']) ?>
                </div>
                <div class="caixa_noticia-data">
                  <?php echo date('d/m/Y', strtotime($result['dt_noticia'])); ?>
                </div>
              </div>
            </div>
          </div>

            <?php } ?>
          <div class="caixa_noticia-botao">
              <a href="noticias.php">
                  <button >Mais notícias</button>
              </a>
          </div>

          <form action="index.php" name="frmEmail" id="frmEmail" method="POST">
            <div class="caixa_email centralizar_elemento">
              <div class="caixa_input">
                <label for="txt_email" style="font-family:Helvetica;">Deseja receber emails da POP'S?</label>
                <input type="text" id="txt_email" name="txt_email">
              </div>
              <div class="caixa_botao_email">
                <button type="submit" name="btnEnviarEmail">Enviar</button>
              </div>
            </div>
          </form>

        </div>
      </section>

      <!-- SECTION 5 -->
      <section class="section-five">
        <h1 class="titulo_sections">POP'S Ecológico</h1>
        <?php
          $sql = "SELECT * FROM tbl_sustentavel WHERE status = 1 LIMIT 1";
          $stm = $con->prepare($sql);
          $success = $stm->execute();
          foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        ?>
        <div id="sustentavel" class="section-five-conteudo centralizar_elemento fadeInTop">
          <div class="caixa_sustentavel-imagem centralizarY">
            <img class="centralizar_elemento" src="cms/view/img/temp/<?php echo ($result['imagem']) ?>" alt="Ecológico">
          </div>
          <div class="caixa_sustentavel-infomarcao">

            <div class="caixa_sustentavel-titulo">
              Planeta Sustentável
            </div>
            <div class="caixa_sustentavel-texto">
              <?php echo ($result['descricao']) ?>
            </div>
          </div>
        </div>

        <?php } ?>

      </section>
      <section class="section-eight">
        <h1 class="titulo_sections">Comentários POP'S</h1>
        <div id="comments" class="section-eight-conteudo centralizar_elemento">

        <?php
            $sql = "SELECT comentario.*, pessoa_fisica.nome AS pessoa_nome
            FROM tbl_comentario AS comentario
            INNER JOIN tbl_pessoa_fisica AS pessoa_fisica ON pessoa_fisica.id_p_fisica = comentario.id_p_fisica";
            $stm = $con->prepare($sql);
            $success = $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){

            $id_comentario = $result['id_comentario'];

          ?>

          <div class="caixa_comentario centralizar_elemento">
          
            <div class="section-eight-usuario">
              <div class="section-eight-usuario-imagem centralizarY">
                <img class="centralizar_elemento" src="img/icon_user.png" alt="Usuário">
              </div>
              <div class="section-eight-usuario-nome">
                <?php echo ($result['pessoa_nome']) ?>
              </div>
              <div class="section-eight-usuario-comentario">
                <?php echo ($result['descricao']) ?>
              </div>
            </div>

            <?php
            $sql1 = "SELECT tbl_resposta.*, tbl_pessoa_fisica.nome FROM tbl_resposta 
                    INNER JOIN tbl_pessoa_fisica ON tbl_resposta.id_p_fisica = tbl_pessoa_fisica.id_p_fisica
                    WHERE id_comentario = $id_comentario";
            $stm = $con->prepare($sql1);
            $success = $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result1){
          ?>

            <div class="section-eight-usuario">
              <div class="section-eight-usuario-imagem centralizarY">
                <img class="centralizar_elemento" src="img/icon_user.png" alt="Usuário">
              </div>
              <div class="section-eight-usuario-nome">
                <?php echo $result1['nome']?>
              </div>
              <div class="section-eight-usuario-comentario">
                <?php echo ($result1['descricao']) ?>
              </div>
            </div>

            <?php } ?>

            <div class="section-eight-resposta">
              <form action="index.php?id=<?= $id_comentario ?>" method="POST">
              <div class="caixa_input">
                <label for="txt_resposta">Resposta</label>
                <input type="text"  name="txt_resposta">
              </div>
              <div class="caixa_botao_email">
                <button type="submit" name="btn_enviar">Enviar</button>
              </div>
              </form>
            </div>

            </div>
            
			<?php } ?>
          
        </div>
    </section>
    <footer>
      <?php require_once 'footer.html'; ?>
    </footer>
      </div>
      <script src="js/ws_requests.js"></script>
</body>
</html>
