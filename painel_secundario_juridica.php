<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>POP'S - Painel Pessoa Jurídica Secundário</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/painel_pessoa_juridica.css">
        <link rel="stylesheet" type="text/css" href="css/painel_secundario_juridica.css">
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
        <!-- caixa central que ocupa 1200px de largura -->
        <div class="caixa_central_pj centralizar_caixa caixa_crescer">
            <div class="caixa_painel_pj centralizar_caixa">

                <!-- Caixa identidade -->
                <div class="caixa_identidade_pj centralizar_caixa">
                    <div class="caixa_imagem_pj centralizar_caixa">
                        <img src="img/atacadao.jpg" width="200" height="200" alt="atacadao" title="ola">
                    </div>
                    <!-- Razão Social -->
                    <p class="centralizar_texto font-titulo font-negrito identidade_pj_font">Atacadao</p>
                    <p class="centralizar_texto font-texto">Patricia Silva</p>
                    <p class="centralizar_texto font-texto">@patriciaatacadao</p>
                </div>

                <!-- Caixa dos dados -->
                <div class="caixa_geral_dados caixa_crescer centralizar_caixa">
                    <div class="grupo_form caixa_crescer elemento_esquerda">
                        <!-- CNPJ -->
                        <div class="texto_dados">
                            <p class="font-negrito font-texto">CNPJ: </p><p class="font-texto">000000000000000</p>
                        </div>
                        <!-- Email -->
                        <div class="texto_dados caixa_crescer">
                            <p class="font-negrito font-texto">Email: </p><p class="font-texto">popssodadrink@hotmail.com</p>
                        </div>
                        <!-- Logradouro -->
                        <div class="texto_dados caixa_crescer">
                            <p class="font-negrito font-texto">Logradouro: </p><p class="font-texto">Rua Senai Jandira</p>
                        </div>
                        <!-- Bairro -->
                        <div class="texto_dados caixa_crescer">
                            <p class="font-negrito font-texto">Bairro: </p><p class="font-texto">Jd. Senai Jandira </p>
                        </div>
                    </div>
                    <!-- grupo form 2 -->
                    <div class="grupo_form caixa_crescer elemento_direita">
                        <!-- Nome fantasia -->
                        <div class="texto_dados caixa_crescer">
                            <p class="font-negrito font-texto">Nome Fantasia: </p><p class="font-texto">POP'Soda Drink</p>
                        </div>
                        <!-- Telefone-->
                        <div class="texto_dados caixa_crescer">
                            <p class="font-negrito font-texto">Telefone: </p><p class="font-texto">(00) 0000-0000</p>
                        </div>
                        <!-- Número e CEP-->
                        <div class="texto_dados caixa_crescer">
                            <!-- Número -->
                            <div class="caixa_num_cep elemento_esquerda caixa_crescer">
                                <p class="font-negrito font-texto">Nº: </p><p class="font-texto">00000</p>
                            </div>
                            <!-- CEP -->
                            <div class="caixa_num_cep elemento_direita caixa_crescer">
                                <p class="font-negrito font-texto">CEP: </p><p class="font-texto">0000000</p>
                            </div>
                        </div>
                        <!-- Estado-->
                        <div class="texto_dados caixa_crescer">
                            <p class="font-negrito font-texto">Estado: </p><p class="font-texto">São Paulo</p>
                        </div>
                    </div>
                </div>

                

                <!-- Meus Pedidos -->
                <div class="caixa_meus_pedidos centralizar_caixa caixa_crescer">
                    <h1 class="font-titulo font-negrito identidade_pj_font">Meus Pedidos</h1>
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
                            <p class="">Número do Pedido</p>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <p>Total</p>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <p>Status</p>
                        </div>
                    </div>

                    <!-- Caixa resultado -->
                    <div class="caixa_titulo_mp">
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <p class="">Número do Pedido</p>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <p>Total</p>
                        </div>
                        <!-- Número do pedido -->
                        <div class="titulos_mp elemento_esquerda ont-titulos_res">
                            <p>Status</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <footer> <?php require_once('footer.html')?> </footer>
    </body>
</html>
