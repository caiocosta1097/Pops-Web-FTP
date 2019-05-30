<?php

// Verificando se o objeto existe
if (isset($setor)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $setor->getId();
  $nome_setor = $setor->getSetor();
  $status = $setor->getStatus();

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('setor', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR SETOR";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('setor', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR SETOR";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST">
    <label for="txt_setor">Setor</label>
    <input type="text" id="txt_setor" name="txt_setor" value="<?= @$nome_setor ?>">

    <label for="select_status">Status: </label> <br>
    <select class="select_status" name="select_status">
      <option <?= @$selected_ativado ?> value="1"> Ativado </option>
      <option <?= @$selected_desativado ?> value="0"> Desativado </option>
    </select>
    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="setor();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
