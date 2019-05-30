<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>POP'S - Perfil Pessoa Física</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/painel_pessoa_fisica.css">
    <link rel="stylesheet" type="text/css" href="css/painel_pessoa_juridica.css">
    <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CHAMANDO O JQUERY -->
	<script src="js/jquery.js">
	</script>
	<!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
	<script src="js/event.js">
	</script>


</head>
    <body>
      <header>
        <?php require_once 'header.php' ?>
      </header>
        <!-- caixa que ocupa 100% de altura e largura -->
        <div class="caixa_geral_pessoa_fisica centralizar_caixa">
            <div class="caixa_central_pessoa_fisica centralizar_caixa">
                
                <div id="guardaFtoPerfil">
                    <!-- FOTO E NOME-->
                    <div class="caixa_identidade">
                        <img src="" id="foto" width="245" height="250" title="Foto" alt="Imagem não encontrada">       
                    </div>

                    <div>
                        <img src="cms/view/img/editar.png"  title="icon" class="iconEditarFis">
                    </div>
                </div>

                <!-- INFORMAÇÕES USER -->
                <!--<div class="informacoes_pessoa_fisica">-->

                <div class="caixa_guarda_inf">

                    <h6>Dados pessoais</h6>
                    <div class="caixa_titulo_inf tamanho_caixa_nome">
                        <p>
                            <span class="font-titulo font-negrito">Nome:</span>
                            <span class="font-texto" id="nome"></span>

                        </p>
                    </div>
                    <div class="caixa_titulo_inf tamanho_caixa_celular_cpf_estado">
                        <span class="font-titulo font-negrito">CPF:</span>

                        <span class="font-texto color-blue" id="cpf"></span>
                    </div>

                </div>

                <div class="caixa_guarda_inf2">

                    <h6>Dados de contato</h6>
                    <div class="caixa_titulo_inf tamanho_caixa_celular_cpf_estado">
                        <span class="font-titulo font-negrito">Celular:</span>
                        <span class="font-texto color-blue" id="celular"></span>

                    </div>
                </div>

                <div class="caixa_guarda_inf3">

                    <h6>Dados de endereço</h6>
                    <div class="caixa_titulo_inf tamanho_caixa_logradouro_bairro">
                        <span class="font-titulo font-negrito">Logradouro:</span>
                        <span class="font-texto color-blue" id="logradouro"></span>
                    </div>

                    <div class="caixa_titulo_inf tamanho_caixa_numero">
                        <span class="font-titulo font-negrito">Nº:</span>

                        <span class="font-texto color-blue" id="num"></span>

                    </div>

                    <div class="caixa_titulo_inf tamanho_caixa_logradouro_bairro">
                        <span class="font-titulo font-negrito">Bairro:</span>
                        <span class="font-texto color-blue" id="bairro"></span>

                    </div>

                    <div class="caixa_titulo_inf tamanho_caixa_cidade">
                        <span class="font-titulo font-negrito">Cidade:</span>
                        <span class="font-texto color-blue" id="cidade"></span>

                    </div>

                    <div class="caixa_titulo_inf tamanho_caixa_celular_cpf_estado">
                        <span class="font-titulo font-negrito">Estado:</span>

                        <span class="font-texto color-blue" id="uf"></span>

                    </div>

                </div>

                <!--</div>-->

                <!-- COMENTÁRIO -->
                <section id="comentario">
                    <form class="form-comentario" id="form-comentario" action="painel_pessoa_fisica.php" method="POST">
                        <div class="font-titulo font-negrito color-blue">Comentário</div>
						    <textarea class="font-texto"  name="txtComentario" id="txtComentario"></textarea><br>
                        <input class="botao_comentario" type="submit" value="Enviar">
                    </form>
                </section>

                <!-- Meus Pedidos -->
                <div class="caixa_meus_pedidos centralizar_caixa caixa_crescer">
                    <div class="font-titulo font-negrito identidade_pj_font">Meus Pedidos</div>
                    <!-- caixa do título -->
                    <div class="caixa_titulo_mp">
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda font-negrito font-titulo">
                            <p>Número do Pedido</p>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda font-negrito font-titulo">
                            <p>Total</p>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda font-negrito font-titulo">
                            <p>Status</p>
                        </div>
                    </div>

                    <!-- Caixa resultado -->
                    <div class="caixa_titulo_mp">
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <div class="titulo_pedido">Número do Pedido</div>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <div class="titulo_pedido">Total</div>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <div class="titulo_pedido">Status</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <footer>  <?php require_once('footer.html')?> </footer>

      <!-- CHAMANDO O ARQUIVO DE REQUESTS EM JQUERY -->
        <script src="js/ws_requests.js">
        </script>
		    <script>

        $(document).ready(function(){
                  //SELECIONAR DADOS VIA COOKIE
          getAllData();
              });
		</script>
    </body>
</html>
