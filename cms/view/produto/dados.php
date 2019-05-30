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
   Gerenciamento do Produto
</div>

<div id="registros_adm_sustentavel" class="centralizarX">
  <table id="tabela">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Imagem</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // Importando a controller do objeto
      require_once "$path_local/cms/controller/controllerProduto.php";

      // Instânciando a classe do controler
      $controllerProduto = new ControllerProduto();

      // Result set que recebe os dados
      $rsProdutos = $controllerProduto->listarRegistros();

      // Loop para colocar todos os registros no result set
      foreach ($rsProdutos as $produto) {

        ?>
        <tr>
          <td id="descricao"><?= $produto->getNome() ?></td>
          <td id="imagem">
            <img src="<?= "$path_url/cms/view/img/temp/".$produto->getImagem() ?>" alt="">
          </td>
          <td id="td_imagens">
            <a href="#" onclick="router('produto', 'buscar', <?= $produto->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/editar.png" ?>" alt="editar" title="Editar">
            </a>
            <a href="#" onclick="router('produto', 'excluir', <?= $produto->getId() ?>);">
              <img src="<?= "$path_url/cms/view/img/deletar.png" ?>" alt="excluir" title="Excluir">
            </a>
          </td>
        </tr>
        <?php } ?>
        <tbody>
        </table>
      </div>
      <div class="area_botao centralizarX">
        <a href="#" onclick="form_cms('produto');">
          <input type="button" name="" value="Novo">
        </a>
      </div>
