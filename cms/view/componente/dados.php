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
   ADM. COMPONENTE
</div>

<div id="registros_adm_cargor" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Componente</th>
        <th>Tipo</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de cargo
      require_once "$path_local/cms/controller/controllerComponente.php";

      // Instânciando a classe do controler
      $controllerComponente = new ControllerComponente();

      // Result set que recebe os dados
      $rsComponentes = $controllerComponente->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsComponentes)) {

        if ($rsComponentes[$cont]->getTipo() == "M")
          $rsComponentes[$cont]->setTipo("Máteria Prima");
        else
          $rsComponentes[$cont]->setTipo("Embalagem");
        
        ?>
        <tr>
          <td><?= $rsComponentes[$cont]->getNome() ?></td>
          <td><?= $rsComponentes[$cont]->getTipo() ?></td>
          <td id="td_imagens">
            <a href="#" onclick="router('componente', 'buscar', <?= $rsComponentes[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('componente', 'excluir', <?= $rsComponentes[$cont]->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a href="#" onclick="form_cms('componente');">
          <input type="button" name="" value="Novo">
        </a>
      </div>
