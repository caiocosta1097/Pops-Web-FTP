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
  Gerenciamento do Fale Conosco
</div>

<div id="registros_adm_fale_conosco" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerFaleConosco.php";

      // Instânciando a classe do controler
      $controllerFaleConosco = new ControllerFaleConosco();

      // Result set que recebe os dados
      $rsFaleConosco = $controllerFaleConosco->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsFaleConosco)) {

        ?>
        <tr>
          <td><?= $rsFaleConosco[$cont]->getNome() ?></td>
          <td><?= $rsFaleConosco[$cont]->getEmail() ?></td>
          <td><?= $rsFaleConosco[$cont]->getTipo() ?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('faleConosco', 'excluir', <?= $rsFaleConosco[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
            <a   class="visualizar_fale_conosco" onclick="visualizar_fale_conosco( <?= $rsFaleConosco[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/vizualizar.png" ?>" alt="visualizar" title="Visualizar">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>
