<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($sustentavel)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $sustentavel->getId();
  $imagem = $sustentavel->getImagem();
  $descricao = $sustentavel->getDescricao();
  $status = $sustentavel->getStatus();

  $_SESSION['imagem'] = $imagem;

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('sustentavel', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR PLANETA SUSTENTÁVEL";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('sustentavel', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR PLANETA SUSTENTÁVEL";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <label for="file_img">Imagem</label>
    <input type="file" id="file_img" name="file_img" value="<?= @$imagem ?>">
    <label for="txt_descricao">Descrição</label>
    <textarea name="txt_descricao" rows="4" required><?= @$descricao ?></textarea>
    <label for="select_status">Status</label>
    <select name="select_status">
      <option <?= @$selected_ativado ?> value="1"> Ativado </option>
      <option <?= @$selected_desativado ?> value="0"> Desativado </option>
    </select>
      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
        <input type="reset" value="Limpar">
        <a onclick="planeta_sustentavel();">
          <input type="button" value="Voltar">
        </a>
      </div>
    </form>
  </div>
