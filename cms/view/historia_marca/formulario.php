<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($historia_marca)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $historia_marca->getId();
  $texto = $historia_marca->getTexto();
  $dt_versao = $historia_marca->getDtVersao();
  $selectStatus = $historia_marca->getStatus();
  if ($selectStatus == 1) {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "";
  }else {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('historia_marca', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "Editar História da Marca";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('historia_marca', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "Cadastrar História da Marca";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST">
    <label>Descrição</label>
    <textarea rows="4" cols="50" name="txt_texto"><?= @$texto ?></textarea>
    <label>Data da versão</label>
    <input type="text" id="txt_cargo" name="txt_dt_versao" value="<?= @$dt_versao ?>">
    <label for="txt_status">Status </label> <br>
    <select class="select_status" name="select_status">
      <option <?= @$selected_ativado_status ?> value="1"> Ativado </option>

      <option <?= @$selected_desativado_status ?> value="0"> Desativado</option>
    </select>
    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="historia_marca();">
        <input type="button" value="Cancelar">
      </a>
    </div>
    </form>
  </div>
