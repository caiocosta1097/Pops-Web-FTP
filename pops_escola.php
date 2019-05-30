<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Pop's nas escolas</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/arielle.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/pops_escola.css">
  <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/event.js"></script>
  <script src="js/validarCampos.js"></script>
</head>
<body>

  <header><?php require_once 'header.php';?></header>

    <!-- Título da página -->
    <div class="titulo_pagina font-titulo">
        <h1>POP'S nas Escolas</h1>
    </div>

    <!-- CONTEÚDO CHAMATIVO -->
    <div class="caixa_pops_escola div_centro">
        <div class="caixa_texto_imagem div_centro">

            <p id="texto_formatacao">
                A POP'S faz evento nas escolas, com a finalidade de apresentar nossos produtos e a nossa visão 
                para as crianças, jovens e adolescentes. Se você é diretor ou responsável por alguma instituição 
                de educação, preencha o formulário abaixo e aguarde o contato da POP'S.
            </p>
            <img class="sombra_imagens img_chamativa" src="img/escolas4.jpg" width="310" height="310" alt="Imagem não encontrada" title="ola">
        
        </div>
    </div>
    <!-- $nome = $_POST['txtNome'];
            $telefone = $_POST['txtTelefone'];
            $responsavel = $_POST['txtResponsavel'];
            $localidade = $_POST['txtLocalidade'];
            $cnpj = $_POST['txtCnpj'];
            $motivo = $_POST['txtMotivo'];
            $email = $_POST['txtEmail']; -->
    <!-- CAIXA DO CADASTRO DA ESCOLA -->
    <div id="caixa_geral_cadastro">
        <section class="caixa_central_cadastro div_centro">
                <div class="titulo_pops" >Cadastro da escola</div>
            <form name="frmEscola" id="frmPopsEscola" action="pops_escola.php" method="POST" autocomplete="off">
                <!-- FORM DIREITO -->
                <div class="caixa_principal_formulario">
                    <!-- Nome da escola -->
                    <div class="caixa_formulario">
                        <input class="formatacao_inputs borda_inputs largura_fixa_inputs_1" type="text" placeholder="Nome da escola" id="txtNome" name="txtNome" onkeypress="return validarCampos(event, 'number', this.id);" required>
                    </div>
                    <!-- Telefone -->
                    <div class="caixa_formulario">
                        <input class="formatacao_inputs borda_inputs largura_fixa_inputs_1" type="text" placeholder="Telefone" id="txtTelefone" name="txtTelefone" onkeypress="return validarCampos(event, 'caracter', this.id);" required>
                    </div>
                    <!-- Responsável -->
                    <div class="caixa_formulario">
                        <input class="formatacao_inputs borda_inputs largura_fixa_inputs_1" type="text" placeholder="Responsável" id="txtResponsavel" name="txtResponsavel" onkeypress="return validarCampos(event, 'number', this.id);" required>
                    </div>
                    <!-- Localidade -->
                    <div class="caixa_formulario">
                        <input class="formatacao_inputs borda_inputs largura_fixa_inputs_1" type="text" placeholder="Localidade" id="txtLocalidade" name="txtLocalidade" required>
                    </div>
                </div>

                <!-- FORM ESQUERDO -->
                <div class="caixa_principal_formulario">
                    <div class="caixa_formulario">
                        <!-- CNPJ -->
                        <div class="caixa_input largura_fixa_div">
                            <input class="formatacao_inputs borda_inputs largura_fixa_inputs_1" type="text" placeholder="CNPJ" id="txtCnpj" name="txtCnpj" onkeypress="return validarCampos(event, 'caracter', this.id);" required>
                        </div>
                        <!-- motivo -->
                        <div class="caixa_input largura_fixa_div">
                            <textarea id="txtMotivo" rows="5" cols="10" placeholder="Motivo" name="txtMotivo" required></textarea>
                        </div>
                        <!-- email -->
                        <div class="caixa_input largura_fixa_div">
                            <input class="formatacao_inputs borda_inputs largura_fixa_inputs_1" type="email" placeholder="Email" id="txtEmail" name="txtEmail" required>
                        </div>
                        <!-- BOTÃO -->
                        <div class="botao">
                            <input class="botao" type="submit" value="Enviar" name="btnEnviar" id="btnEnviar">
                        </div>
                    </div>
                </div>
            </form>
            <!-- AVISO -->
            <div class="aviso aviso_form div_centro">
                <h2 ><strong>Aviso</strong></h2>
                <p>A POP'S entrará em contato nos próximos 7 dias uteis para prestar maiores informações e marcar data para o evento na instituição.
                </p>
            </div>
        </section>
    </div>

    <!-- IMAGENS -->
    <div id="caixa_imagens_pops">
        <div class="caixa_central_imagens_pops div_centro">
            <div class="imagens sombra_imagens">
                <img src="img/escolas.jpg" width="300" height="300" title="ola" alt="Imagem não encontrada">
            </div>

            <div class="imagens sombra_imagens">
                <img src="img/escolas2.jpg" width="300" height="300" title="ola" alt="Imagem não encontrada">
            </div>

            <div class="imagens sombra_imagens">
                <img src="img/escolas3.jpg" width="300" height="300" title="ola" alt="Imagem não encontrada">
            </div>
        
        </div>
    </div>

    <!-- FOOTER -->
    <footer>  <?php require_once('footer.html')?> </footer>
    <script src="js/ws_requests.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script>
        $(document).ready(function(){
            $('#txtTelefone').mask('(00) 0000-0000');
            $('#txtCnpj').mask('00.000.000/0000-00');
        });
    </script>
</body>
</html>