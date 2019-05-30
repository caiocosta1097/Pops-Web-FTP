<?php

// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

?>
<script>
$(document).ready(function(){
  //CHAMAR MODAL
  // $('.consulta').click(function(){
  //   consulta();
  //   $('#container').fadeIn(600);
  // });
});

function consulta(id, status){
  $.ajax({
    type: "GET",
    url: "<?= "$path_url/cms/view/anuncios/modal.php?id="?>"+id+"&status="+status,
    success: function(dados){
      $(".modal").html(dados)
    }
  });

  $('#container').fadeIn(600);
}

</script>


<div class="modal-teste">

  <div id="container">
    <div class="modal">

    </div>
  </div>
<div class="title_paginas centralizarX">
   ADM. ANUNCIOS
</div>

<div id="registros_enquete" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Estabelecimento</th>
        <th>Status</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerAnuncio.php";

      // Instânciando a classe do controler
      $controllerAnuncio = new ControllerAnuncio();

      // Result set que recebe os dados
      $rsAnuncio = $controllerAnuncio->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsAnuncio)) {

        ?>
        <tr>
          <td><?= $rsAnuncio[$cont]->getEstabelecimento() ?> </td>
          <td>
            <?php
              if($rsAnuncio[$cont]->getStatus() == 0){
                echo "<font color='#f00'>Negado</font>";
              } else{
                echo "<font color='#68d871'>Aprovado</font>";
              }
             ?>
            </td>
          <td id="td_imagens">
            <a class="consulta" onclick="consulta(<?= $rsAnuncio[$cont]->getId()?>, <?= $rsAnuncio[$cont]->getStatus()?> );">
              <img src="<?= "$path_url/cms/view/img/consulta.png" ?>" alt="consulta" title="consulta">
            </a>
            <a href="#" onclick="router('anuncio', 'excluir', <?= $rsAnuncio[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
  </table>
</div>
</div>
