<?php
  // Iniciando uma sessão
  session_start();

  // Iniciando as variáveis em null para não haver erro
  $path_local = null;
  $path_url = null;

  // Variáveis que recebem as variáveis de sessão
  $path_local = $_SESSION['path_local'];
  $path_url = $_SESSION['path_url'];

  // if(isset($_GET["id"])) {
  //   // Importando a controller de produtos
  //   require_once "$path_local/cms/controller/controllerBrinde.php";
  //
  //   // Instânciando a classe do controler
  //   $controllerBrinde = new ControllerBrinde();
  //
  //   // Result set que recebe os dados
  //   $id = $_GET["id"];
  //
  //   $rsBrindeCarrinho = $controllerBrinde->adicionarCarrinho('mais', $id);
  //   $rsBrinde = $controllerBrinde->buscarRegistro();
  //
  //    $imagem = $rsBrinde->getimagem();
  //    $brinde = $rsBrinde->getNome();
  //    $preco = $rsBrinde->getValorUnitario();
  //
  // }
  // var_dump($_SESSION['carrinho']);
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/murilo.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/arielle.css">
    <link rel="stylesheet" type="text/css" href="css/carrinho.css">
    <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/effects.js"></script>
    <script src="js/event.js"></script>
    <script src="js/ws_requests.js"></script>
  </head>


  <body>
    <script>
      var itemList = new Array(); //armazena os itens para ser inserido na API 
      var itens;
    </script>
    <header><?php require_once 'header.php'; ?></header>

        <!-- Título da página -->
        <div class="titulo_pagina font-titulo">
            <h1>Meu carrinho</h1>
        </div>

        <!-- caixa geral do conteúdo -->
        <div class="caixa_central_carrinho centralizar_caixa">

            <!-- caixa título das informações do produto -->
            <div class="caixa_inf_produto centralizar_caixa">
                <div class="inf_produto inf_nome_produto font-titulo inf_produto_texto">Produto</div>
                <div class="inf_produto inf_qtd_produto font-titulo inf_produto_texto centralizar_texto">Quantidade</div>
                <div class="inf_produto inf_valor_produto font-titulo inf_produto_texto centralizar_texto">Valor<br>Unitário</div>
                <div class="inf_produto inf_valor_produto font-titulo inf_produto_texto centralizar_texto">Valor<br>Total</div>
            </div>


            <?php
                //contador
                $cont = 0;

                //percorrendo os produtos do carrinho
                foreach($_SESSION['carrinho'] as $produtos) {
                  //manipulando js
                  echo("
                  <script>
                       itens = {
                         id: '".$produtos['id']."',
                         title: '".$produtos['nome']."',
                         unit_price: ".($produtos['valorUnitario'] * 100).",
                         quantity: ".$produtos['quantidade'].",
                         tangible: true
                      }
                      itemList.push(itens);
                      
                  </script>");
                
            ?>

            <!-- Div do carrinho / fazer while aqui -->
            <div class="caixa_carrinho centralizar_caixa">

                <!-- caixa da imagem do produto -->
                <div class="caixa_imagem_carrinho">
                  <img src="<?= "$path_url/cms/view/img/temp/".$produtos['imagem'] ?>" alt="">
                </div>
                <!-- Caixa nome e preço do produto -->
                <div class="caixa_nome_preco">
                        <p class="font-texto nome_produto">
                          <?php echo($produtos['nome']) ?>
                        <p>
                        <p class="font-texto font-negrito">
                          R$<?php echo $produtos['valorUnitario']; ?>
                        </p>
                </div>
                <!-- Caixa da quantidade do produto -->
                <div class="caixa_qtd">
                    <div class="caixa_botao_qtd">
                        <input class="botao_qtd" type="button" id="plus" value='-' onclick="process(<?php echo($produtos['id']) ?>, <?php echo $cont?>, -1)">
                    </div>
                    <div class="caixa_quantidade">
                        <input class="quantidade text" id="quant<?php echo $cont?>" name="quant<?php echo $cont?>"   size="1" type="text" value="<?php echo $produtos['quantidade']; ?>" maxlength="5" >
                    </div>
                    <div class="caixa_botao_qtd">
                        <input class="botao_qtd" type="button" id="minus" value='+' onclick="process(<?php echo($produtos['id']) ?>, <?php echo $cont?>, 1)">
                    </div>
                </div>

                <div class="caixa_valor borda_caixa_valor">
                    <p>R$<?php echo number_format($produtos['valorUnitario'], 2, ',', ' '); ?></p>
                </div>
                <div class="caixa_valor ">
                    <p> R$<?php echo number_format($produtos['subtotal'], 2, ',', ' '); ?></p>
                </div>
            </div>
            <?php
                $cont++;
                }
                echo("<script>
                          sessionStorage.setItem('itemList', JSON.stringify(itemList));
                      </script>");
                
            ?>

            <!-- DIV SUB TOTAL -->
              <div class="div_subtotal">
                    <p>Total:
                      <span class="font-negrito" id="pre">
                        <input style="min-width:150px; width:auto;" class="quantidade text" id="total" name="quant"  size="5" type="text" value="R$ <?php  echo number_format(($_SESSION['totalCarrinho']), 2, ',', ' ')?>" readonly >
                      </span>
                    </p>

                    <?php
                        if(@$_COOKIE['id_p_fisica'] == null){
                      ?>
                      <a href="login_compra.php">
                        <input type="button" value="Concluir compra" id="btnContinuar" name="btnContinuar">
                      </a>
                      <?php
                        }else{
                      ?>
                      <a href="checkout_endereco.php">
                        <input type="button" value="Concluir compra" id="btnContinuar" name="btnContinuar">
                      </a>
                      <?php
                        }
                       ?>
              </div>
        </div>
        <footer><?php require_once 'footer.html'; ?></footer>

        <script>
          function process(id, num, quant){
            var value = parseInt(document.getElementById("quant"+num).value);
            value+=quant;

            const retorno = atualizarCarrinho(id, quant);

            if(value < 1){
              document.getElementById("quant"+num).value = 1;
            }else{
              document.getElementById("quant"+num).value = value;
            }
            window.location.reload();
          }
          </script>
          <script src="js/pagamento.js">
        </script>
    </body>


</html>
