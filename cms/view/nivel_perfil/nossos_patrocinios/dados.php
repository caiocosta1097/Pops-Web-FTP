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
   GERENCIAMENTO DE PATROCÍNIOS
</div>
<div class="caixa_filtro centralizarX">
  <div class="caixa_input centralizarX">
    <form action="#">
      <label for="fname">Buscar</label>
      <input type="text" id="fname" name="firstname" placeholder="">
      <input type="submit" value="Filtrar">
    </form>
  </div>
</div>
  <div id="registros_eventos" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Imagem</th>

        <th>Opções</th>

      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de eventos
      require_once "$path_local/cms/controller/controllerNossosPatrocinios.php";

      // Instânciando a classe do controler
      $controllerNossosPatrocinios = new ControllerNossosPatrocinios();

      // Result set que recebe os dados
      $rsPatrocinios = $controllerNossosPatrocinios->listarPatrocinios();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsPatrocinios)) {

        ?>
        <tr>
          <td><?= $rsPatrocinios[$cont]->getNome()?></td>
          <td align="center">
            <img class="img_size" width="70" height="70" src="<?= "$path_url/cms/view/img/temp/".$rsPatrocinios[$cont]->getImagem() ?>">
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('nossosPatrocinios', 'buscar', <?= $rsPatrocinios[$cont]->getIdPatrocinio() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('nossosPatrocinios', 'excluir', <?= $rsPatrocinios[$cont]->getIdPatrocinio() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_nossos_patrocinios();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
