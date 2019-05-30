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
   ADM. ENQUETE
</div>

<div id="registros_enquete" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Titulo</th>
        <th>Data</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de enquetes
      require_once "$path_local/cms/controller/controllerEnquete.php";

      // Instânciando a classe do controler
      $controllerEnquete = new ControllerEnquete();

      // Result set que recebe os dados
      $rsEnquete = $controllerEnquete->listarRegistros();

      // Loop para colocar todos os registros no result set
      foreach ((array) $rsEnquete as $enquete) {

        ?>
        <tr>
          <td><?= $enquete->getTitulo() ?></td>
          <td><?= $enquete->getData() ?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('enquete', 'buscar', <?= $enquete->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('enquete', 'excluir', <?= $enquete->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php } ?>
    <tbody>
  </table>
  </div>

    <div class="area_botao centralizarX">
      <a href="#" onclick="form_enquete();">
        <input type="button" name="" value="Novo">
      </a>
    </div>
