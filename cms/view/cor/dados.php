<?php
    /**
     * Esse arquivo irá retornar as informações cadastradas em banco, via SELECT
     */
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
   Gerenciamento de Cores
</div>
<div id="registros_adm_sustentavel" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Cor</th>
        <th>Código</th>
        <th>Elemento do Site</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerCor.php";

      // Instânciando a classe do controler
      $controllerCor = new ControllerCor();

      // Result set que recebe os dados
      $rsCor = $controllerCor->listar();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsCor)) {
        ?>
        <tr>
          <td id="cor"> 
              <div class="color_sample centralizarX" style="background-color:<?=$rsCor[$cont]->getCodHexadec()?>;"></div> </td>
          <td id="cod_hexadec">
                <?= $rsCor[$cont]->getCodHexadec() ?>
          </td>
          <td id="elemento">
                <?= $rsCor[$cont]->getNomeElementoVisual() ?>
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('cor', 'excluir', <?= $rsCor[$cont]->getIdCores() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
           
            <a href="#" onclick="router_status('cor', 'status', <?= $rsCor[$cont]->getIdCores() ?>, <?= $rsCor[$cont]->getElementoVisual()?>);">
              <img src="<?=($rsCor[$cont]->getStatus() == 1) ? "$path_url/cms/view/img/ativado.png": "$path_url/cms/view/img/desativado.png"?>" alt="ativacao" 
              title="Clique para Ativar/Desativar">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>
    <div class="area_botao centralizarX">
        <a href="#" onclick="form_cms('cor');">
          <input type="button" name="" value="Novo">
        </a>
      </div>