<?php

session_start();

$path_local = $_SERVER['DOCUMENT_ROOT']."/web";

$_SESSION['path_local'] = $path_local;

require_once "$path_local/cms/controller/controllerPessoaJuridica.php";

$controllerPessoaJuridica = new ControllerPessoaJurica();

$rsPessoaJuridica = $controllerPessoaJuridica->listarRegistros();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>POP'S - Estabelecimento Próximo</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/estabelecimento_proximo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- CHAMANDO O JQUERY -->
  <script src="js/jquery.js">
  </script>
  <!-- CHAMANDO O ARQUIVO DE EVENTOS EM JQUERY -->
  <script src="js/event.js">
  </script>
  <script src="js/effects.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLyCfZiJMTKw8SdqUKqCgYay1rTwnUtF8"></script>

  <script>

  $(document).ready(function() {

    // Variável que recebe as coordenadas iniciais do mapa e preenche a div
    var map = new google.maps.Map(document.getElementById("caixa_mapa"), {
      center: {
        lat: -23.5296000,
        lng: -46.8977517
      },
      zoom: 15
    });

    // Localizaçção do marcador do mapa
    var marker = new google.maps.Marker({
      position: {
        lat: -23.5296000,
        lng: -46.8977517
      },
      map: map,
      icon: "img/marcador.png"
    });

    // Ao clicar na caixa de estabalecimentos, ocorre um evento
    $('.caixa_estabelecimentos').click(function(){

      // Declara as varipaveis de cordenadas
      var lat;
      var lng;

      // Url com a chave da API
      var url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyDLyCfZiJMTKw8SdqUKqCgYay1rTwnUtF8&sensor=false&address=";

      // CEP que será pesquisado na requisição
      var cep = $(this).data("cep");

      // Faz a chamada da URL e retorna um JSON
      $.ajax({
        type: "POST",
        dataType: "json",
        url: url+cep,
        success: function(data) {

          // Seta os valores das coordenadas a partir dos resultados do JSON
          lat = data.results[0].geometry.location.lat;
          lng = data.results[0].geometry.location.lng;

          // Seta uma nova posição usando as novas coordenadas
          var location = new google.maps.LatLng(lat, lng);

          // Move o mapa para nova posição
          map.setCenter(location);

          // Move o marcador para nova posição
          marker.setPosition(location);

        }
      });

    });

});

</script>

</head>

<body>

  <header>
    <?php require_once('header.php')?>
  </header>
  <!-- Título da página -->
  <div class="titulo_pagina font-titulo">
    <h1>Encontre um estabelecimento próximo a você!</h1>
  </div>

  <div class="caixa_central_est_proximo">

    <div id="caixa_enderecos">

      <?php foreach ($rsPessoaJuridica as $pessoaJuridica) { ?>

        <div class="caixa_estabelecimentos" data-cep="<?= $pessoaJuridica->getCep() ?>" onclick="teste();">
          <div class="estabelecimento"><?= utf8_decode($pessoaJuridica->getNomeFantasia()) ?></div>
          <div class="endereco"><?= utf8_decode($pessoaJuridica->getLogradouro()." - ".$pessoaJuridica->getBairro()." - ".$pessoaJuridica->getCidade()) ?></div>
          <div class="telefone"><?= $pessoaJuridica->getTelefone() ?></div>
        </div>

      <?php } ?>

    </div>

    <!-- caixa do mapa -->
    <div id="caixa_mapa">

    </div>
</div>

<footer> <?php require_once('footer.html')?> </footer>

</body>
</html>
