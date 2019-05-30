<?php
  session_start();
  // Iniciando as variáveis em null para não haver erro
  $path_local = null;
  $path_url = null;

  // Variáveis que recebem as variáveis de sessão
  $path_local = $_SESSION['path_local'];
  $path_url = $_SESSION['path_url'];

  // Importanto a classe de conexão com BD
  require_once "$path_local/cms/model/DAO/conexao.php";

  // Instânciando a classe de Conexão
  $conexao = new Conexao();

  if(isset($_POST["btnEnviar"])){

    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $tipo = $_POST['select_tipo'];
    $telefone = $_POST['txtTelefone'];
    $celular =  $_POST['txtCelular'];
    $observacao =  $_POST['txtObservacao'];


      $sql = "INSERT INTO tbl_fale_conosco(nome, email , telefone, tipo, descricao, celular)
              VALUES ('".$nome."','".$email."', '".$telefone."','".$tipo."', '".$celular."', '".$observacao."')
  ";

    // Abrindo a conexão com BD
    $con = $conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
      echo 'Erro no script de insert';
    else
      echo "<script> alert('Resposta enviada com sucesso'); </script>";

    header('location:fale_conosco.php');
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Fale Conosco</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/fale_conosco.css">
        <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CHAMANDO O JQUERY -->
        <script src="js/jquery.js"></script>
        <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
        <script src="js/event.js"></script>

        <script src="js/mask.js"></script>

		      <script src="js/validar.js"></script>

    </head>

    <body>
      <!-- header -->
        <header>
          <?php require_once('header.php') ?>
        </header>

        <!-- Título da página -->
        <div class="titulo_pagina font-titulo">
            <h1>Fale Conosco</h1>
        </div>
        <!-- caixa central do fomulario -->
        <div class="caixa_central_fl">
            <div class="caixa_form_fl bordas-form">
                <form action="fale_conosco.php" name="frmFaleConosco" id="frmFaleConosco" method="POST">
                    <!-- Nome: -->
                    <div class="campos-form bordas-form">
                        <input class="bordas-form bordas-sombra" type="text" id="txtNome" name="txtNome" placeholder="Nome completo" required>
                    </div>

                    <!-- E-mail: -->
                    <div class="campos-form bordas-form">
                        <input class="bordas-form" type="email" id="txtEmail" name="txtEmail" placeholder="Email" required>
                    </div>

                    <!-- Telefone e Celular -->
                    <div class="campos-form bordas-form">
                        <div class="caixa_contato">
                          <input class="bordas-form bordas-sombra" type="text" maxlength="12" id="txtTelefone" name="txtTelefone" placeholder="Telefone"  onkeyup="celData(this)" required>
                        </div>
                        <div class="caixa_contato margin-direita-contato">
                            <input class="bordas-form bordas-sombra" type="text" id="txtCelular"  maxlength="13" name="txtCelular" placeholder="Celular" onkeyup="celData(this)" required>
                        </div>
                    </div>

                    <!-- Tipo de Contato-->
                    <div class="campos-form bordas-form">
                        <select class="slt-form bordas-form bordas-sombra" name="select_tipo">
                            <option disabled selected>Selecione:</option>
                            <option value="Crítica">Crítica</option>
                            <option value="Informação">Informação</option>
                            <option value="Dúvida">Dúvida</option>
                        </select>
                    </div>

                    <!-- TextArea -->
                    <div class="campos-form bordas-form">
                        <label for="txtObservacao" class="font-texto label">Observação:</label><br>
                        <textarea class="observacao bordas-form bordas-sombra" id="txtObservacao" name="txtObservacao" required></textarea>
                    </div>

                    <!-- Botão Enviar -->
                    <div class="caixa_botao">
                        <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar" >
                    </div>
                </form>
            </div>
        </div>

        <!-- footer -->
       <footer> <?php require_once('footer.html')?> </footer>
    </body>
</html>
