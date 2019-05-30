<?php

// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

// Verificando se o objeto existe
if (isset($_GET['btnFiltrar'])) { 
  require_once "$path_local/cms/controller/controllerPromocao.php";
  $controllerPromocao = new ControllerPromocoes();
  $controllerPromocao->filtrar();
}

?>

<div class="title_paginas centralizarX">
   GERENCIAMENTO DE PROMOÇÕES
</div>

  <div id="registros_eventos" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Cadastro</th>
        <th>Opções</th>

      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller de promocao
      require_once "$path_local/cms/controller/controllerPromocao.php";

      // Instânciando a classe do controlerPromocoes
      $controllerPromocoes = new ControllerPromocoes();

      // Result set que recebe os dados
      $rsPromocoes = $controllerPromocoes->listarPromocoes();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsPromocoes)) {

        ?>
        <tr>
          <td><?= $rsPromocoes[$cont]->getTitulo()?></td>
          <td><?= $rsPromocoes[$cont]->getDescricao()?></td>
          <td align="center">
            <img class="img_size" width="70" height="70" src="<?= "$path_url/cms/view/img/temp/".$rsPromocoes[$cont]->getImagem() ?>">
          </td>
          <td>
            <?php
              if($rsPromocoes[$cont]->getPrecisaCadastro() == 0){
                echo "Não";
              } else{
                echo "Sim";
              }
             ?>
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('promocao', 'buscar', <?= $rsPromocoes[$cont]->getIdPromocao() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('promocao', 'excluir', <?= $rsPromocoes[$cont]->getIdPromocao() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>

          </td>
        </tr>
        <?php $cont++; } ?>
        <tbody>
        </table>
      </div>

      <div class="area_botao centralizarX">
        <a onclick="form_promocao();">
          <input type="button" name="" value="Novo">
        </a>
      </div>
