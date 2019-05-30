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
   GERENCIAMENTO DE EVENTOS
</div>

  <div id="registros_eventos" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Título:</th>
        <th>Descrição:</th>
        <th>Localidade:</th>
        <th>Data:</th>
        <th>Opções:</th>

      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de eventos
      require_once "$path_local/cms/controller/controllerEventos.php";

      // Instânciando a classe do controler
      $controllerEventos = new ControllerEventos();

      // Result set que recebe os dados
      $rsEventos = $controllerEventos->listarEventos();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsEventos)) {

        ?>
        <tr>
          <td><?= $rsEventos[$cont]->getTitulo()?></td>
          <td><?= $rsEventos[$cont]->getDescricao()?></td>
          <td><?= $rsEventos[$cont]->getLocalidade()?></td>
          <td><?= $rsEventos[$cont]->getDataEvento()?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('eventos', 'buscar', <?= $rsEventos[$cont]->getIdEventos()?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('eventos', 'excluir', <?= $rsEventos[$cont]->getIdEventos()?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_eventos();">
          <input type="button" name="" value="Novo">
        </a>
      </div>