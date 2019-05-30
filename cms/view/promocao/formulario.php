<?php
// Verificando se o objeto existe
if (isset($promocoes)) {
  // Pegando os dados do objeto e setando em variavéis locais
  $idPromocao = $promocoes->getIdPromocao();
  $txtTituloPromocao = $promocoes->getTitulo();
  $txtDescricaoPromocao = $promocoes->getDescricao();
  $selectCadastroNecessario = $promocoes->getPrecisaCadastro();
  $selectStatus = $promocoes->getStatus();
  $selectStatusHome = $promocoes->getStatusHome();
  $imagem = $promocoes->getImagem();
  if ($selectStatus == 1) {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "";
  }else {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "SELECTED";
  }
  if ($selectCadastroNecessario) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }
  if ($selectStatusHome) {
    $selected_ativado_home = "SELECTED";
    $selected_desativado_home = "";
  }else {
    $selected_ativado_home = "SELECTED";
    $selected_desativado_home = "SELECTED";
  }
  //Função do onclick para saber qual ação chama o router
  $router = "router('promocao', 'atualizar', '".$idPromocao."')";
  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR PROMOÇÃO";
}else{
  //Função do onclick para saber qual ação chama o router
  $router = "router('promocao', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR PROMOÇÃO";
}
?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_eventos centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txt_">Título da promoção:</label><br>
      <input class="inputEventos font-input" type="text" id="txtTituloPromocao" name="txtTituloPromocao" value="<?= @$txtTituloPromocao?>">
    </div>
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label>Cadastro necessário?</label><br>
      <div class="cadastro_necessario">
        <select name="select_cadastro">
          <option <?= @$selected_ativado ?> value="1"> Sim </option>

          <option <?= @$selected_desativado ?> value="0"> Não </option>
        </select>
      </div>
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos" for="txt_">Descrição:</label>
      <textarea class="inputEventos font-input" type="text" id="txtDescricaoPromocao" name="txtDescricaoPromocao"><?= @$txtDescricaoPromocao?></textarea>
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos">Imagem da Promoção:</label><br>
      <input type="file" name="flefoto" id="flefoto" required value="Escolher arquivo">
    </div>

    <div class="caixa_inputs_evento titulo_e_localidade">
      <label>Status</label><br>
      <div class="cadastro_necessario">
        <select name="select_status">
        <option <?= @$selected_ativado_status ?> value="1"> Ativado </option>
        <option <?= @$selected_desativado_status ?> value="0"> Desativado</option>
        </select>
      </div>
    </div>

    <div class="caixa_inputs_evento titulo_e_localidade">
      <label>Status home</label><br>
      <div class="cadastro_necessario">
        <select name="select_home">
        <option <?= @$selected_ativado_home?> value="1"> Ativado </option>
        <option <?= @$selected_desativado_home?> value="0"> Desativado</option>
        </select>
      </div>
    </div>

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="promocao();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
