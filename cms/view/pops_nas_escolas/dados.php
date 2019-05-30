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

function consulta(id){
  $.ajax({
    type: "GET",
    url: "<?= "$path_url/cms/view/pops_nas_escolas/modal.php?id="?>"+id,
    success: function(dados){
      $(".modal").html(dados)
    }
  });

  $('#container').fadeIn(600);
}

</script>

<!-- <div id="container">
  <div class="modal">

  </div>
</div> -->

<div class="modal-teste">
  <div class="title_paginas centralizarX">
     ADM. POP'S NAS ESCOLAS
  </div>
  
    <div id="registros_pops_escolas" class="centralizarX">
      <table id="tabela">
        <thead>
          <tr>
            <th>Escola</th>
            <th>CNPJ</th>
            <th>Opções</th>
          </tr>
        </thead>

        <tbody>
          <?php

          // Importando a controller de enquetes
          require_once "$path_local/cms/controller/controllerPops_Nas_Escolas.php";

          // Instânciando a classe do controler
          $controllerEscola = new ControllerEscolas();

          // Result set que recebe os dados
          $rsEscolas = $controllerEscola->listarRegistros();

          // Variável do contador
          $cont = 0;

          // Loop para colocar todos os registros no result set
          while ($cont < count($rsEscolas)) {

            ?>
            <tr>
              <td><?= $rsEscolas[$cont]->getEscola() ?></td>
              <td><?= $rsEscolas[$cont]->getCNPJ() ?></td>
              <td id="td_imagens">
                <a class="consulta" onclick="consulta( <?= $rsEscolas[$cont]->getId()?>);">
                  <img src="<?= "$path_url/cms/view/img/consulta.png" ?>" alt="consulta" title="consulta">
                </a>
                <a href="#" onclick="router('escola', 'excluir', <?= $rsEscolas[$cont]->getId() ?>);">
                  <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
                </a>
              </td>
            </tr>
            <?php $cont++; } ?>
        <tbody>
        </table>
      </div>
</div>
