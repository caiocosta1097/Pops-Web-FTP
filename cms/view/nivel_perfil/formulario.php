<?php

// Verificando se o objeto existe
if (isset($nivel_perfil)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $nivel_perfil->getId();
  $perfil = $nivel_perfil->getPerfil();
  $status = $nivel_perfil->getStatus();

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('nivel_perfil', 'atualizar', $id)";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR NÍVEL PERFIL";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('nivel_perfil', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR NÍVEL PERFIL";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST">
    <label for="txt_perfil">Nível Perfil</label>
    <input type="text" id="txt_perfil" name="txt_perfil" value="<?= @$perfil ?>">
    
     <label for="select_status">Status: </label> <br>
    <select class="select_status" name="select_status">
      <option <?= @$selected_ativado ?> value="1"> Ativado </option>
      <option <?= @$selected_desativado ?> value="0"> Desativado </option>
    </select>

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="adm_cms('nivel_perfil');">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>