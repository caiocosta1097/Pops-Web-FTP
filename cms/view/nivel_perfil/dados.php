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
   ADM. NÍVEL PERFIL
</div>

  <div id="registros_adm_setor" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Nível Perfil</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      // Importando a controller de setor
      require_once "$path_local/cms/controller/controllerNivelPerfil.php";

      // Instânciando a classe do controler
      $controllerNivelPerfil = new ControllerNivelPerfil();

      // Result set que recebe os dados
      $rs = $controllerNivelPerfil->listarRegistros();

      // Loop para colocar todos os registros no result set
      foreach ($rs as $nivel_perfil) {
        
       ?> 
        
        <tr>
          <td><?= $nivel_perfil->getPerfil() ?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('nivel_perfil', 'buscar', <?= $nivel_perfil->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('nivel_perfil', 'excluir', <?= $nivel_perfil->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_cms('nivel_perfil');">
          <input type="button" name="" value="Novo">
        </a>
      </div>    