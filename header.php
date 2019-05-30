<?php
if(isset($_GET['logout'])){
  @setcookie("id_p_fisica", $_COOKIE['id_p_fisica'], 1);
  @setcookie("cnpj", $_COOKIE['cnpj'], 1);
  unset($_COOKIE['id_p_fisica']);
  unset($_COOKIE['cnpj']);
   //remove variaveis de sessão criadas em JS
   echo("<script>sessionStorage.clear();</script>");
}
if(isset($_COOKIE['id_p_fisica'])){
?>

  <div class="mini_painel">
    <div class="dropdown">
      <div class="dropbtn">
        <div id="nome_header"></div>

      </div>
      <div class="dropdown-content">
        <a href="painel_pessoa_fisica.php">Perfil</a>
        <a href="index.php?logout">Sair</a>
      </div>
    </div>
  </div>

<?php } elseif (isset($_COOKIE['cnpj'])){ ?>

    <div class="mini_painel">
    <div class="dropdown">
      <button class="dropbtn">
        <div id="responsavel_header"></div>

      </button>
      <div class="dropdown-content">
        <a href="painel_pessoa_juridica.php">Perfil</a>
        <a href="index.php?logout">Sair</a>
      </div>
    </div>
  </div>

  <?php } else{ ?>

      <div class="login">
        <div class="dropdown">
          <div class="dropbtn">
            <div id="icone"></div>

          </div>
          <div class="dropdown-content">
            <a href="login_compra.php?pf">Pessoa Física</a>
            <a href="login_compra.php?pj">Pessoa Jurídica</a>
          </div>
        </div>
      </div>

  <?php } ?>
<div id="caixa_cabecalho" class="centralizarX">
  <img src="img/logo.png" alt="Logo">
</div>
<nav>
  <div class="navbar centralizarX centralizarY">
  <a href="index.php">Home</a>
  <?php if (isset($_COOKIE['cnpj'])){ 
   ?>
  <a href="produtos-compra.php">Produtos</a>
<?php } else{?>
  <a href="produtos.php">Produtos</a>
  <?php }?>
  <a href="promocoes.php">Promoções</a>
  <a href="loja.php">Loja Pop'S</a>
  <div class="dropdown">
    <button class="dropbtn">Eventos e Anúncios
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="anuncios.php">Anúncios</a>
      <a href="eventos.php">Eventos</a>
      <a href="pops_escola.php">POP'S nas Escolas</a>
      <a href="patrocinios.php">Nossos Patrocínios</a>
      <a href="videos.php">Vídeos</a>
      <a href="noticias.php">Notícias</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Estabelecimentos
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="estabelecimento_proximo.php">Estabelecimentos Próximos</a>
      <a href="cred_est_comerciais.php">Credenciamento de Estabelecimentos Comerciais</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Pop'S
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="sobre.php">Sobre a Pop'S</a>
      <a href="historia_marca.php">História da Marca</a>
    </div>
  </div>
  <a href="fale_conosco.php">Entre em Contato</a>
</div>
</nav>
<script src="js/jquery.js"></script>
<script src="js/ws_requests.js"></script>
<script>
   $(document).ready(function(){
    getNome();
    getResponsavel();
   });
</script>