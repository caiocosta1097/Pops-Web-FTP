<?php
  session_start();
  // Iniciando as variáveis em null para não haver erro
  $path_local = null;
  $path_url = null;

  // Variáveis que recebem as variáveis de sessão
  $path_local = $_SESSION['path_local'];
  $path_url = $_SESSION['path_url'];

    $titulo = "Cadastro - pessoa juridica";
    $botao = "Cadastrar"

  // Verificando se o objeto existe
  if (isset($_POST["btnCad"])) {
    // Importando a classe Controller de pessoa fisica
    require_once "$path_local/cms/controller/controllerPessoaJuridica.php";

    // Instância da Controller de pessoa fisica
    $controllerPessoaJuridica = new ControllerPessoaJurica();

    // Chamando o método de inserir um novo registro
    $controllerPessoaJuridica->inserirRegistro();


  }

  if (isset($_GET['id'])) {
    // Importando a controller de enquetes
    require_once "$path_local/cms/controller/controllerPessoaJuridica.php";

    // Instânciando a classe do controler
    $controllerPessoaJuridica = new ControllerPessoaJurica();

    // Result set que recebe os dados
    $rsUser = $controllerPessoaJuridica->buscarRegistro();

    $id = $_GET["id"];

    $nome_fantasia=  $rsUser->getNomeFantasia();
    $razao_social = $rsUser->getRazaoSocial();
    $logradouro=$rsUser->getLogradouro();
    $numero = $rsUser->getNumero();
    $bairro = $rsUser->getBairro();
    $cep = $rsUser->getCep();
    $cidade = $rsUser->getCidade();
    $responsavel = $rsUser->getResponsavel();
    $email= $rsUser->getEmail();
    $telefone= $rsUser->getTelefone();
    $celular= $rsUser->getCelular();
    $usuario=$rsUser->getUsuario();
    $senha = $rsUser->getSenha();

    $titulo = "Edição - pessoa juridica";

      $botao = "Salvar"


  }


 ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>POP'S - Cadastro e Edição Pessoa Jurídica</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/cadastro_edicao_pessoa_juridica.css">
        <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CHAMANDO O JQUERY -->
        <script src="js/jquery.js"></script>
        <script src="js/effects.js"></script>

        <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
        <script src="js/event.js">
        </script>
        <script src="js/validarCampos.js"></script>
    </head>

    <body>
        <header>
          <?php require_once('header.php'); ?>
        </header>

        <!-- Título da página -->
        <div class="titulo_pagina font-titulo">
            <h1><?= $titulo?></h1>
        </div>

        <!-- Caixa central do formulário que ocupa 1200 da tela -->
        <div class="caixa_central_formulario">
            <form name="frmCadPjs" method="POST" enctype="multipart/form-data">
                <!-- caixa que guarda todo o formulário -->
                <div class="caixa_form_juridica">
                    <!-- LINHA 1-->
                    <div class="caixa_input">
                        <!-- CNPJ -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="CNPJ" name="txtCnpj" id="txtCnpj" maxlength="18" value="<?= @$id ?>">
                        </div>
                        <!-- Razão Social -->
                        <div class="caixa_inputs_form caixa_inputs_form_medio">
                            <input class="input_estilo inputs_form" type="text" placeholder="Razão Social" name="txtRazaoSocial" id="txtRazaoSocial" value="<?= @$razao_social?>" onkeypress="return validarCampos(event, 'number', this.id);">
                        </div>

                        <!-- Nome Fantasia-->
                        <div class="caixa_inputs_form caixa_inputs_form_medio">
                            <input class="input_estilo inputs_form" type="text" placeholder="Nome fantasia" name="txtNomeFantasia" id="txtNomeFantasia" value="<?= @$nome_fantasia?>" nkeypress="return validarCampos(event, 'number', this.id);">
                        </div>
                    </div>

                    <!-- LINHA 2-->
                    <div class="caixa_input">
                        <!-- Logradouro-->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="Logradouro" name="txtLogradouro" id="txtLogradouro" value="<?= @$logradouro?>" onkeypress="return validarCampos(event, 'number', this.id);">
                        </div>
                        <!-- num -->
                        <div class="caixa_inputs_form caixa_inputs_form_minima">
                            <input class="input_estilo inputs_form" type="text" placeholder="Nº" name="txtNum" id="txtNum" value="<?= @$numero?>" maxlength="4" onkeypress="return validarCampos(event, 'caracter', this.id);">
                        </div>
                        <!-- Bairro-->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="Bairro" name="txtBairro" id="txtBairro" value="<?= @$bairro?>" onkeypress="return validarCampos(event, 'number', this.id);">
                        </div>
                        <!-- CEP-->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="CEP" name="txtCep" id="txtCep" value="<?= @$cep?>">
                        </div>
                        <!-- Cidade -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="Cidade" name="txtCidade" id="txtCidade" value="<?= @$cidade?>" onkeypress="return validarCampos(event, 'number', this.id);">
                        </div>
                        <!-- Estado -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <div class="caixa_input largura_fixa_div_3 selectForm">
                                <select class="slt_estado formatacao_inputs borda_inputs largura_fixa_inputs_3 slt_estado" id="sltEstado" name="sltEstado">

                                    <option disabled selected >Estado:</option>
                                    <option value="Acre">AC</option>
                                    <option value="Alagoas">AL</option>
                                    <option value="Amapá">AP</option>
                                    <option value="Amazonas">AM</option>
                                    <option value="Bahia">BA</option>
                                    <option value="Ceará">CE</option>
                                    <option value="Distrito Federal">DF</option>
                                    <option value="Espito Santo">ES</option>
                                    <option value="Goias">GO</option>
                                    <option value="Maranhao">MA</option>
                                    <option value="Mato Grosso">MT</option>
                                    <option value="Mato Grosso do Sul">MS</option>
                                    <option value="Minas Gerais">MG</option>
                                    <option value="Para">PA</option>
                                    <option value="Paraiba">PB</option>
                                    <option value="Parana">PR</option>
                                    <option value="Pernambuco">PE</option>
                                    <option value="Piaui">PI</option>
                                    <option value="Rio de Janeiro">RJ</option>
                                    <option value="Rio Grande do Norte">RN</option>
                                    <option value="Rio Grande do Sul">RS</option>
                                    <option value="Rondonia">RO</option>
                                    <option value="Roraima">RR</option>
                                    <option value="Santa Catarina">SC</option>
                                    <option value="Sao Paulo">SP</option>
                                    <option value="Sergipe">SE</option>
                                    <option value="Tocantins">TO</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- LINHA 3-->
                    <div class="caixa_input">
                        <!-- Responsavel pelo Contato -->
                        <div class="caixa_inputs_form caixa_inputs_form_medio">
                            <input class="input_estilo inputs_form" type="text" placeholder="Responsável pelo contato" value="<?= @$responsavel?>" name="txtRespContato" id="txtRespContato" onkeypress="return validarCampos(event, 'number', this.id);" >
                        </div>

                        <!-- Email-->
                        <div class="caixa_inputs_form caixa_inputs_form_medio">
                            <input class="input_estilo inputs_form" type="email" placeholder="Email" name="txtEmail" id="txtEmail" value="<?= @$email?>">
                        </div>

                        <!-- Telefone -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="Telefone" name="txtTelefone" id="txtTelefone" value="<?= @$telefone?>">
                        </div>

                        <!-- Celular  -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="Celular" name="txtCelular" id="txtCelular" value="<?= @$celular?>">
                        </div>
                    </div>

                    <!-- Linha 4 -->
                    <!-- LINHA 3-->
                    <div class="caixa_imagem">
                        <div class="imagem_pj">
                            <label class="label_estilo">Foto:</label><br>
                            <input type="file" name="fotoPj" id="fotoPj">
                        </div>
                        <!-- Usuário -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="text" placeholder="User" value="<?= @$usuario ?>" name="txtUser" id="txtUser"  onkeypress="return validarCampos(event, 'number', this.id);">
                        </div>

                        <!-- Senha -->
                        <div class="caixa_inputs_form caixa_inputs_form_pequena">
                            <input class="input_estilo inputs_form" type="password" placeholder="Senha" name="txtSenha" id="txtSenha" value="<?= @$senha?>">
                        </div>
                    </div>

                    <!-- LINHA 4 BOTÃO -->
                    <div class="caixa_botao_pj">
                        <input class="botao_pj" type="submit" value="<?= $botao ?>" name="btnCad" id="btnCad" >
                    </div>

                </div>
            </form>
        </div>
        <footer>  <?php require_once('footer.html')?> </footer>
        <script src="js/jquery.mask.js"></script>
        <script>
           $(document).ready(function(){
                $('#txtCnpj').mask('00.000.000/0000-00');
                $('#txtCep').mask('00000-000');
                $('#txtTelefone').mask('(00) 0000-0000');
                $('#txtCelular').mask('(00) 00000-0000');
           });
        </script>
    </body>
</html>
