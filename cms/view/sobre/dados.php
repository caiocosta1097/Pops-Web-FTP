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
   Gerenciamento do Sobre a POP'S
</div>

<div id="registros_adm_sustentavel" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerSobre.php";
      // Instânciando a classe do controler
      $controllerSobre = new ControllerSobre();
      // Result set que recebe os dados
      $rsSobre = $controllerSobre->listarRegistros();
      // Variável do contador
      $cont = 0;
      // Loop para colocar todos os registros no result set
      while ($cont < count($rsSobre)) {
        ?>
        <tr>
          <td id="descricao"><?= $rsSobre[$cont]->getTituloSobre() ?></td>
          <td id="descricao"><?= $rsSobre[$cont]->getDescricao() ?></td>
          <td id="imagem">
            <img src="<?= "$path_url/cms/view/img/temp/".$rsSobre[$cont]->getImagem() ?>" alt="">
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('sobre', 'buscar', <?= $rsSobre[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('sobre', 'excluir', <?= $rsSobre[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>
      <div class="area_botao centralizarX">
        <a href="#" onclick="form_sobre();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
