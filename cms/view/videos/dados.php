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

<div class="modal-teste">
  <div class="title_paginas centralizarX">
     ADM. VIDEOS
  </div>

    <div id="registros_pops_escolas" class="centralizarX">
      <table id="tabela">
        <thead>
          <tr>
            <th>Titulo do video</th>
            <th>Opções</th>
          </tr>
        </thead>

        <tbody>
          <?php

          // Importando a controller de cargo
          require_once "$path_local/cms/controller/controllerVideos.php";

          // Instânciando a classe do controler
          $controllerVideo = new ControllerVideo();

          // Result set que recebe os dados
          $rsVideos = $controllerVideo->listarRegistros();

          // Variável do contador
          $cont = 0;

          // Loop para colocar todos os registros no result set
          while ($cont < count($rsVideos)) {
          ?>
            <tr>
              <td><?= $rsVideos[$cont]->getTitulo() ?></td>
              <td id="td_imagens">
                <a href="#" onclick="router('videos', 'buscar', <?= $rsVideos[$cont]->getId() ?>);">
                  <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
                </a>
                <a href="#" onclick="router('videos', 'excluir', <?= $rsVideos[$cont]->getId() ?>);">
                  <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
                </a>
              </td>
            </tr>
            <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a href="#" onclick="form_video();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
</div>
