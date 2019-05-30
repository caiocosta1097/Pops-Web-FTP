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
   ADM. SETOR
</div>

  <div id="registros_adm_setor" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Setor</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de setor
      require_once "$path_local/cms/controller/controllerSetor.php";

      // Instânciando a classe do controler
      $controllerSetor = new ControllerSetor();

      // Result set que recebe os dados
      $rs = $controllerSetor->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rs)) {

        ?>
        <tr>
          <td><?= $rs[$cont]->getSetor() ?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('setor', 'buscar', <?= $rs[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('setor', 'excluir', <?= $rs[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_cms('setor');">
          <input type="button" name="" value="Novo">
        </a>
      </div>
