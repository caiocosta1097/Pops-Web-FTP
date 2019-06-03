<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>POP'Soda Drink - Pagamento</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/pagamento.css">
        <link rel="stylesheet" type="text/css" href="css/titulo_pagina.css">
        <link rel="stylesheet" href="css/arielle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CHAMANDO O JQUERY -->
        <script src="js/jquery.js"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        
        <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
        <script src="js/event.js">
        </script>
        
    </head>

    <body>
        <!-- header -->
       <header>
           <?php require_once('header.php')?>
       </header>

       <div class="principal_pagamento">
         <!-- Título da página -->
         <div class="titulo_pagina font-titulo">
             <div class="pagamento"></div>
         </div>

         <div class="caixa_central_pagamento">
             <form name="frmPagamento" id="frmPagamento" method="POST" action="pagamento.php">
                 <!-- Grupos form 1  -->
                 <div class="caixa_form_pagamento">
                     <!-- NOME -->
                     <div class="caixa_grupo_form div_esquerda">
                         <div class="caixa_campos_form">
                             <label for="txtNome" class="label_estilo font-titulo">Número do cartão de crédito: </label><br>
                             <input class="input_estilo" type="text" name="txtNumCartao" id="txtNumCartao">
                         </div>

                         <!-- Número do Cartão -->
                         <div class="caixa_campos_form">
                             <label for="txtNumCartao" class="label_estilo font-titulo">Nome do titular do Cartão de Crédito</label><br>
                             <input class="input_estilo input_titular_e_cartao" type="text" name="txtNome" id="txtNome">
                         </div>
                     </div>

                     <!-- caixa form 2 -->
                     <div class="caixa_grupo_form div_direita">
                       <div class="caixa_campos_form">
                           <label class="label_estilo font-titulo">Validade: </label><br>
                           <select id="sltMes" class="input_mes">
                               <option selected>Selecione</option>
                               <option>01</option>
                               <option>02</option>
                               <option>03</option>
                               <option>04</option>
                               <option>05</option>
                               <option>06</option>
                               <option>07</option>
                               <option>08</option>
                               <option>09</option>
                               <option>10</option>
                               <option>11</option>
                               <option>12</option>
                           </select>

                           <select id="sltAno" class="input_ano">
                               <option selected>Selecione</option>
                               <option>2019</option>
                               <option>2020</option>
                               <option>2021</option>
                               <option>2022</option>
                               <option>2023</option>
                               <option>2024</option>
                               <option>2025</option>
                               <option>2026</option>
                               <option>2027</option>
                               <option>2028</option>
                               <option>2029</option>
                           </select>
                       </div>

                         <!-- Número do Cartão -->
                         <div class="caixa_campos_form">
                             <label for="txtCodSeguranca" class="label_estilo font-titulo">Código de Segurança: </label><br>
                             <input class="input_estilo input_seguranca" type="text" name="txtCodSeguranca" id="txtCodSeguranca">
                         </div>

                         <input class="botao_pagamento font-titulo" type="submit" value="Finalizar Compra" id="btnFinalizarCompra" name="btnFinalizarCompra">
                     </div>
                 </div>
             </form>
         </div>
       </div>
      <footer>   <?php require_once('footer.html')?> </footer>
     
      <script src="js/pagarme.min.js"> </script>
      <script src="js/pagamento.js">
        </script>
    </body>
</html>
