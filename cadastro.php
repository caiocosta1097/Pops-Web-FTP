<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/arielle.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/event.js"></script>
    <script src="js/effects.js"></script>
    <title>Participe da rede Pop's</title>
  </head>
  <body>
    <header>
       <?php require_once 'header.php' ?>
    </header>
    <div class="principal">
      <div class="principal-cadastro">
        <div class="cadastro-header-title">
          <h5> Escolha um tipo de cadastro </h5>
        </div>

        <div class="escolha-cadastro">
          <div class="escolha-cadastro-body">
            <a href="cadastro_pessoa_fisica.php">
              <div class="cadastro-item1">
                  <img src="img/pessoa_fisica.png" alt="" class="iconCadastro">
                  <div class="txtCadastroItem">Pessoa Fisica</div>
              </div>
            </a>

            <a href="cadastro_pessoa_juridica.php">
              <div class="cadastro-item2">
                  <img src="img/pessoa_juridica.png" alt="" class="iconCadastro">
                  <div class="txtCadastroItem">Pessoa Juridica</div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <footer> <?php require_once 'footer.html' ?></footer>
  </body>
</html>
