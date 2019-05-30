<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($brinde)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $brinde->getId();
  $nome = $brinde->getNome();
  $valor_unitario = $brinde->getValorUnitario();
  $descricao = $brinde->getDescricao();
  $peso = $brinde->getPeso();
  $volume = $brinde->getVolume();
  $imagem = $brinde->getImagem();
  $status = $brinde->getStatus();

  $_SESSION['imagem'] = $imagem;

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('brinde', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR BRINDE";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('brinde', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR BRINDE";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <label for="file_img">Imagem</label>
    <input type="file" id="file_img" name="file_img" value="<?= @$imagem ?>">

    <label for="txt_brinde">Brinde</label>
    <input type="text" id="txt_brinde" name="txt_brinde" value="<?= @$nome ?>">

    <label for="txt_valor_unitario">Valor Unitário</label>
    <input type="number" id="txt_valor_unitario" name="txt_valor_unitario" value="<?= @$valor_unitario ?>">

    <label for="txt_descricao">Descrição</label>
    <textarea name="txt_descricao" rows="4" required><?= @$descricao ?></textarea>

    <label for="txt_peso">Peso</label>
    <input type="number" id="txt_peso" name="txt_peso" value="<?= @$peso ?>">

    <label for="txt_volume">Volume</label>
    <input type="number" id="txt_volume" name="txt_volume" value="<?= @$volume ?>">

    <label for="select_status">Status</label>
    <select name="select_status">
      <option <?= @$selected_ativado ?> value="1"> Ativado </option>
      <option <?= @$selected_desativado ?> value="0"> Desativado </option>
    </select>

      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
        <input type="reset" value="Limpar">
        <a onclick="adm_cms('brinde');">
          <input type="button" value="Voltar">
        </a>
      </div>
    </form>
  </div>
