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
  Gerenciamento de Brindes
</div>

<div id="registros_adm_sustentavel" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Brinde</th>
        <th>Imagem</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
    <?php

      // Importando a controller
      require_once "$path_local/cms/controller/controllerBrinde.php";

      // Instânciando a classe do controler
      $controllerBrinde = new ControllerBrinde();

      // Result set que recebe os dados
      $rsBrindes = $controllerBrinde->listarRegistros();

      // Loop para colocar todos os registros no result set
      foreach ($rsBrindes as $brinde) {

      ?>
        <tr>
          <td><?= $brinde->getNome() ?></td>
          <td id="imagem">
            <img src="<?= "$path_url/cms/view/img/temp/".$brinde->getImagem() ?>" alt="">
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('brinde', 'buscar', <?= $brinde->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('brinde', 'excluir', <?= $brinde->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
      <?php } ?>
      <tbody>
      </table>
    </div>
    <div class="area_botao centralizarX">
      <a href="#" onclick="form_cms('brinde');">
        <input type="button" name="" value="Novo">
      </a>
    </div>
