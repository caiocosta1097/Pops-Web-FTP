<?php

 if (isset($_GET['pf'])) {
    $id = "txtcpf";
    $label = "CPF";
 }else {
    $id = "txtcnpj";
    $label = "CNPJ";
 }

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/arielle.css">
    <link rel="stylesheet" href="cms/view/css/style.css">
    <script src="js/jquery.js"></script>

  </head>
  <body>

    <!-- Imagem da tela de login -->
    <div class="bannerLogin"></div>

    <div class="loginMain">

      <div class="caixa_logo centralizarX">

      </div>

      <!-- Caixa de autenticacao -->
      <div id="caixa_login" class="caixa_login centralizarX">
        <div>
          <h1 id="titulo_login">Entrar</h1>
        </div>
        <form>
          <i class="fas fa-user-tie"></i>
          <label class="label_compra" for="<?= @$id ?>"><?= @$label ?></label>
          <input type="text" id="<?= @$id ?>" name="<?= @$id ?>" placeholder="Digite seu login...">

          <i class="fas fa-lock"></i>
          <label class="label_compra" for="txtpassword">Senha</label>
          <input type="password" id="txtpassword" name="txtpassword" placeholder="Digite sua senha...">

          <input type="button" data-tipo="<?= @$id ?>" name="btnlogar" id="btnlogar" value="ENTRAR">

          <a href="cadastro.php">
            <input type="button" id="botao_cadastro" value="QUERO ME CADASTRAR">
          </a>

        </form>
      </div>
    </div>
    <script src="js/ws_requests.js"></script>
  </body>
</html>
