<?php

// Iniciando uma sessão
session_start();

// Variáveis que recebem a URL e o caminho local
$path_url = "http://".$_SERVER['HTTP_HOST']."/web";
$path_local = $_SERVER['DOCUMENT_ROOT']."/web";

// Criando variáveis de sessões que recebem esses valores
$_SESSION['path_url'] = $path_url;
$_SESSION['path_local'] = $path_local;

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="<?= "$path_url/cms/view/css/reset.css" ?>">
  <link rel="stylesheet" href="<?= "$path_url/cms/view/css/style.css" ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
  <header class="cabecalho_login centralizarY">
    <div class="logo_login centralizarX">
      <img src="<?= "$path_url/cms/view/img/logo_psd.png" ?>" alt="Logo">
    </div>
  </header>
  <div class="content_login">
    <div class="titulo_cadastro centralizarX">
      Para acessar o CMS efetue o login.
    </div>
    <div class="caixa_login centralizarX">
      <div>
        <h1>Acesso ao sistema</h1>
      </div>
      <form action="<?= "$path_url/cms/autentica.php" ?>" method="POST">
        <i class="fas fa-user-tie"></i>
        <label for="txt_usuario">Usuário</label>
        <input type="text" id="txt_usuario" name="txt_usuario" placeholder="Digite seu usuário...">

        <i class="fas fa-lock"></i>
        <label for="txt_senha">Senha</label>
        <input type="password" id="txt_senha" name="txt_senha" placeholder="Digite sua senha...">
        <input type="submit" name="btn_login" value="Entrar">
      </form>
    </div>
  </div>
</body>
</html>
