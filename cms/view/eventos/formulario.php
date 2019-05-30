<?php
// Verificando se o objeto existe
if (isset($eventos)) {
  // Pegando os dados do objeto e setando em variavéis locais
  $idEventos = $eventos->getIdEventos();
  $txtTituloEvento = $eventos->getTitulo();
  $txtDescricaoEvento = $eventos->getDescricao();
  $txtLocalidadeEvento = $eventos->getLocalidade();
  $txtDataEvento = $eventos->getDataEvento();
  $selectStatus = $eventos->getStatus();
  if ($selectStatus == 1) {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "";
  }else {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "SELECTED";
  }
  //Função do onclick para saber qual ação chama o router
  $router = "router('eventos', 'atualizar', '".$idEventos."')";
  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR EVENTO";
}else{
  //Função do onclick para saber qual ação chama o router
  $router = "router('eventos', 'inserir', 0)";
  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR EVENTOS";
}
?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_eventos centralizarX">
  <form id="form" method="POST">
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txtTituloEvento">Título do evento:</label><br>
      <input class="inputEventos font-input" type="text" id="txtTituloEvento" name="txtTituloEvento" value="<?= @$txtTituloEvento?>">
    </div>
    <div class="caixa_inputs_evento titulo_e_localidade">
      <label class="lblEventos" for="txtLocalidadeEvento">Localidade:</label>
      <input class="inputEventos font-input" type="text" id="txtLocalidadeEvento" name="txtLocalidadeEvento" value="<?= @$txtLocalidadeEvento?>">
    </div>
    <div class="caixa_inputs_evento descricao_data_e_status">
      <label class="lblEventos" for="txtDescricaoEvento">Descrição:</label>
      <textarea class="inputEventos font-input" type="text" id="txtDescricaoEvento" name="txtDescricaoEvento"><?= @$txtDescricaoEvento?></textarea>
    </div>
    <div class="caixa_inputs_evento">
      <label class="lblEventos" for="txtDataEvento">Data:</label><br>
      <input class="inputEventos font-input largura_data" maxlength="10" type="text" id="txtDataEvento" name="txtDataEvento" value="<?= @$txtDataEvento?>"><br>

      <label>Status</label><br>
      <div class="cadastro_necessario">
        <select name="select_status">
        <option <?= @$selected_ativado_status ?> value="1"> Ativado </option>

        <option <?= @$selected_desativado_status ?> value="0"> Desativado</option>

        </select>
      </div>
    </div>

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="eventos();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
