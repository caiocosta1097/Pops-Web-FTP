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
   GERENCIAMENTO DE NOTÍCIA
</div>

  <div id="registros_eventos" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Opções</th>

      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de eventos
      require_once "$path_local/cms/controller/controllerNoticia.php";

      // Instânciando a classe do controler
      $controllerNoticias = new ControllerNoticias();

      // Result set que recebe os dados
      $rsNoticias = $controllerNoticias->listarNoticias();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsNoticias)) {

        ?>
        <tr>
          <td><?= $rsNoticias[$cont]->getTitulo()?></td>
          <td><?= $rsNoticias[$cont]->getDataNoticia()?></td>
          <td><?= $rsNoticias[$cont]->getDescricao()?></td>
          <td align="center">
            <img class="img_size" width="70" height="70" src="<?= "$path_url/cms/view/img/temp/".$rsNoticias[$cont]->getImagem() ?>">
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('noticia', 'buscar', <?= $rsNoticias[$cont]->getIdNoticia() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('noticia', 'excluir', <?= $rsNoticias[$cont]->getIdNoticia() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_noticia();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
