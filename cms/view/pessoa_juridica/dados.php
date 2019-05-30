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
    url: "<?= "$path_url/cms/view/pessoa_juridica/modal.php?id="?>"+id,
    success: function(dados){
      $(".modal").html(dados)
    }
  });

  $('#container').fadeIn(600);
}


</script>

  <div id="container">
    <div class="modal">

    </div>
  </div>
<div class="title_paginas centralizarX">
   ADM. PESSOA JURIDICA
</div>

<div id="registros_enquete" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Estabelecimento</th>
        <th>E-mail</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerPessoaJuridica.php";

      // Instânciando a classe do controler
      $controllerPessoaJuridica = new ControllerPessoaJurica();

      // Result set que recebe os dados
      $rsUsuarios = $controllerPessoaJuridica->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsUsuarios)) {

        ?>
        <tr>
          <td><?= $rsUsuarios[$cont]->getNomeFantasia() ?> </td>
          <td><?= $rsUsuarios[$cont]->getEmail() ?></td>

          <td id="td_imagens">
            <a class="consulta" onclick="consulta(<?= $rsUsuarios[$cont]->getCnpj()?>);">
              <img src="<?= "$path_url/cms/view/img/consulta.png" ?>" alt="consulta" title="consulta">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
  </table>
</div>
