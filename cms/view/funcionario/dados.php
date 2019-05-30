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
   GERENCIAMENTO DE FUNCIONÁRIO
</div>

  <div id="registros_eventos" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Perfil</th>
        <th>Cargo</th>
        <th>Opções</th>

      </tr>
    </thead>
    <tbody>
      <?php
      // Importando a controller de eventos
      require_once "$path_local/cms/controller/controllerFuncionario.php";
      // Instânciando a classe do controler
      $controllerFuncionarios = new ControllerFuncionarios();
      // Result set que recebe os dados
      $rsFuncionarios = $controllerFuncionarios->listarFuncionarios();
      // Variável do contador
      $cont = 0;
      // Loop para colocar todos os registros no result set
      while ($cont < count($rsFuncionarios)) {

        ?>
        <tr>
          <td><?= $rsFuncionarios[$cont]->getNome()?></td>
          <td><?= $rsFuncionarios[$cont]->getEmail()?></td>
          <td><?= $rsFuncionarios[$cont]->getPerfil()?></td>
          <td><?= $rsFuncionarios[$cont]->getCargo()?></td>

          <td id="td_imagens">
            <a href="#" onclick="router('funcionario', 'buscar', <?= $rsFuncionarios[$cont]->getMatricula() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('funcionario', 'excluir', <?= $rsFuncionarios[$cont]->getMatricula() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_cms('funcionario');">
          <input type="button" name="" value="Novo">
        </a>
      </div>
