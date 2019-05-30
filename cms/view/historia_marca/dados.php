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
   Gerenciamento da história da marca
</div>

<div id="registros_adm_historia" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>História</th>
        <th>Data da versão</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

        // Importando a controller de historia_marca
        require_once "$path_local/cms/controller/controllerHistoriaMarca.php";

        // Instânciando a classe do controler
        $controllerHistoriaMarca = new ControllerHistoriaMarca();

        // Result set que recebe os dados
        $rsHistoria = $controllerHistoriaMarca->listarRegistros();

        // Variável do contador
        $cont = 0;

        // Loop para colocar todos os registros no result set
        while ($cont < count($rsHistoria)) {

      ?>
      <tr>
        <td><?= $rsHistoria[$cont]->getTexto() ?></td>
        <td><?= $rsHistoria[$cont]->getDtVersao() ?></td>
        <td id="td_imagens">
          <a href="#" onclick="router('historia_marca', 'buscar', <?= $rsHistoria[$cont]->getId() ?>);">
            <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
          </a>
          <a href="#" onclick="router('historia_marca', 'excluir', <?= $rsHistoria[$cont]->getId() ?>);">
            <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
          </a>
        </td>
      </tr>
      <?php
        $cont++; }
      ?>
    </tbody>
    </table>
  </div>
  <div class="area_botao centralizarX">
    <a href="#" onclick="form_historia_marca();">
      <input type="button" name="" value="Novo">
    </a>
  </div>
