<?php
  session_start();
  // Iniciando as variáveis em null para não haver erro
  $path_local = null;
  $path_url = null;

  // Variáveis que recebem as variáveis de sessão
  $path_local = $_SESSION['path_local'];
  $path_url = $_SESSION['path_url'];

  // Verificando se o objeto existe
  if (isset($_POST["btnEnviar"])) {
    // Importando a classe Controller de pessoa fisica
    require_once "$path_local/cms/controller/controllerPessoaFisica.php";

    // Instância da Controller de pessoa fisica
    $controllerPessoaFisica = new ControllerPessoaFisica();

    // Chamando o método de inserir um novo registro
    $controllerPessoaFisica->inserirRegistro();
  }


 ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>POP'S - Cadastro e Edição Pessoa Física</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/cadastro_edicao_pessoa_fisica.css">
        <link rel="stylesheet" href="css/arielle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CHAMANDO O JQUERY -->
        <script src="js/jquery.js"></script>
        <script src="js/effects.js"></script>
        
        <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
        <script src="js/event.js"></script>
        <script src="js/validarCampos.js"></script>
        <script src="js/ws_requests.js"></script>
    </head>

    <body>
        <header>
             <?php require_once('header.php'); ?>
        </header>

        <div class="principal">
          <!-- Título da página -->
          <div class="titulo_pagina font-titulo">
              <h1>Cadastro - pessoa física</h1>
          </div>

          <!-- Caixa central do formulário que ocupa 1200 da tela -->
          <div class="caixa_central_formulario">
              <!-- caixa que guarda todo o formulário -->
              <div class="caixa_form_fisica">
                  <form name="frmCadPf" id="frmCadPf" method="POST" enctype="multipart/form-data">
                      <!-- div dos labels e inputs do form -->
                      <!-- nome completo -->

                      <div class="caixa_input">
                          <!-- Nome completo -->
                          <div class="caixa_inputs_form caixa_inputs_form_medio">
                              <input class="input_estilo inputs_form" type="text" placeholder="Nome completo" name="txtNome" id="txtNome" onkeypress="return validarCampos(event, 'number', this.id);" required>
                          </div>
                          <!-- CPF -->
                          <div class="caixa_inputs_form caixa_inputs_form_2">
                              <input class="input_estilo inputs_form" placeholder="CPF" type="text" name="txtCpf" id="txtCpf" onkeypress="return validarCampos(event, 'caracter', this.id);" required>
                          </div>

                      </div>

                      <div class="caixa_input">
                          <!-- E-mail -->
                          <div class="caixa_inputs_form caixa_inputs_form_medio">
                              <input class="input_estilo inputs_form" type="email" placeholder="E-mail" name="txtEmail" id="txtEmail" required>
                          </div>
                          <!-- Celular -->
                          <div class="caixa_inputs_form caixa_inputs_form_2">
                              <input class="input_estilo inputs_form" placeholder="Celular" type="text" name="txtCelular" id="txtCelular" onkeypress="return validarCampos(event, 'caracter', this.id);" required>
                          </div>
                      </div>

                      <div class="caixa_input">
                        <!-- Telefone -->
                        <div class="caixa_inputs_form caixa_inputs_form_4">
                            <input class="input_estilo inputs_form" type="text" placeholder="Telefone" name="txtTelefone" required>
                        </div>
                        <!-- Data nascimento -->
                        <div class="caixa_inputs_form caixa_inputs_form_4">
                            <input class="input_estilo inputs_form" placeholder="Data de nascimento" type="text" name="dtNasc" required>
                        </div>

                    </div>

                      <div class="caixa_input">
                          <!-- Logradouro -->
                          <div class="caixa_inputs_form caixa_inputs_form_medio">
                              <input class="input_estilo inputs_form" type="text" placeholder="Logradouro" name="txtLogradouro" id="txtLogradouro" onkeypress="return validarCampos(event, 'number', this.id);" required >
                          </div>
                          <!-- Número -->
                          <div class="caixa_inputs_form caixa_inputs_form_2">
                              <input class="input_estilo inputs_form" placeholder="N°" maxlength="4" type="text" name="txtNumero" id="txtNumero" onkeypress="return validarCampos(event, 'caracter', this.id);" required>
                          </div>

                      </div>


                  <div class="caixa_input">
                      <!-- Bairro -->
                      <div class="caixa_inputs_form caixa_inputs_form_4">
                          <input class="input_estilo inputs_form" type="text" placeholder="Bairro" name="txtBairro">
                      </div>
                      <!-- Cidade -->
                      <div class="caixa_inputs_form caixa_inputs_form_4">
                          <input class="input_estilo inputs_form" placeholder="Cidade" type="text" name="txtCidade">
                      </div>

                  </div>

                      <div class="caixa_input">
                          <!-- Estado -->
                          <div class="caixa_input largura_fixa_div_3 selectForm">
                              <select class="slt_estado formatacao_inputs borda_inputs largura_fixa_inputs_3 slt_estado" id="sltEstado" name="sltEstado">
                                  <option disabled selected>Selecione</option>
                                  <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                              </select>
                          </div>

                          <!-- Foto -->
                          <div class="imagem_pf">
                              <label class="label_estilo">Foto:</label><br>
                              <input type="file" id="file_img" name="file_img" >
                          </div>

                      </div>

                      <div class="caixa_input">
                          <!-- User -->
                          <div class="caixa_inputs_form caixa_inputs_form_5">
                              <input class="input_estilo inputs_form" type="text" placeholder="User" name="txtUser" id="txtUser" required>
                          </div>
                          <!-- Senha -->
                          <div class="caixa_inputs_form caixa_inputs_form_4">
                              <input class="input_estilo inputs_form" placeholder="Senha" type="password" name="txtSenha" id="txtSenha" required>
                         </div>
                      </div>

                      <div class="botao">
                          <input class="botao" type="submit" value="Enviar" name="btnEnviar" id="btnEnviar">
                      </div>
                  </form>
              </div>
          </div>
        </div>

       <footer> <?php require_once('footer.html') ?> </footer>

       <script src="js/jquery.mask.js"></script>
        <script>
            $(document).ready(function(){
                $('#txtCpf').mask('000.000.000-00');
                $('#txtCelular').mask('(00) 00000-0000');
            });
        </script>
    </body>
</html>
