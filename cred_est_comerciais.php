<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>POP'Soda Drink - Meu Carrinho</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/cred_est_comerciais.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CHAMANDO O JQUERY -->
        <script src="js/jquery.js">
        </script>
         <script src="js/effects.js"></script>
        <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
        <script src="js/event.js">
        </script>
    </head>

    <body>
        <!-- header -->
        <header>
           <?php require_once('header.php')?>
        </header>

        <section id="caixa_imagem_credenciamento" style="background-image:url(img/credenciamento.jpg); background-repeat:no-repeat; background-size:cover;">
            <h1 class="font-titulo font-cor2">Credenciamento de estabelecimentos comerciais</h1>
            <h3 class="font-titulo font-cor2">Quer anunciar o seu estabelecimento aqui no site da POP'S?</h3>
            <div id="caixa_botao_estabelecimento">
              <a href="cadastro_pessoa_juridica.php">
                  <input class="botao_estabelecimento font-cor2" type="button" value="Participe da POP'S" id="btnParticipe" name="btnParticipe">
              </a>
            </div>
        </section>

        <footer> <?php require_once('footer.html')?> </footer>

    </body>
</html>
