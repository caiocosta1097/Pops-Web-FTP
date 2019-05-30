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

<div class="title_paginas centralizarX">
   ADM. CARGO
</div>

<div id="registros_adm_cargor" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Cargo</th>
        <th>Setor</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerCargo.php";

      // Instânciando a classe do controler
      $controllerCargo = new ControllerCargo();

      // Result set que recebe os dados
      $rsCargos = $controllerCargo->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsCargos)) {

        ?>
        <tr>
          <td><?= $rsCargos[$cont]->getCargo() ?></td>
          <td><?= $rsCargos[$cont]->getSetor() ?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('cargo', 'buscar', <?= $rsCargos[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('cargo', 'excluir', <?= $rsCargos[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a href="#" onclick="form_cargo();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
