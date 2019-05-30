<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($enquete)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $enquete->getId();
  $titulo_enquete = $enquete->getTitulo();
  $data = $enquete->getData();
  $respostas = explode(",", $enquete->getResposta());
  $status = $enquete->getStatus();

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  $_SESSION['id_opcoes'] = $enquete->getId_opcao();

  //Função do onclick para saber qual ação chama o router
  $router = "router('enquete', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR ENQUETE";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('enquete', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR ENQUETE";

}

?>

  <div class="title_paginas centralizarX">
     <?= $titulo ?>
  </div>
  <div class="caixa_form_enquete centralizarX">
    <form class="caixa_formulario" id="form" method="POST">
      <div id="form_enquete_1">
        <div class="form_campos">
          <label for="label_titulo">Titulo: </label> <br>
          <input type="text" id="txt_titulo" name="txt_titulo" value="<?= @$titulo_enquete ?>">
        </div>

        <div class="form_campos">
          <label style="margin-left:50px;" for="txt_data"> Data: </label> <br>
          <input type="text" class="txt_data" name="txt_data" value="<?= @$data ?>">
        </div>

        <div class="form_campos">
          <label for="txt_status">Status </label> <br>
          <select class="select_status" name="select_status">
            <option <?= @$selected_ativado ?> value="1"> Ativado </option>
            <option <?= @$selected_desativado ?> value="0"> Desativado </option>
          </select>
        </div>
      </div>

      <div id="label_opcoes">Opções da enquete:</div>

      <div id="form_enquete_2">

        <div class="input_opcoes">
          <input type="text" id="txt_opcao" name="txt_opcao1" value="<?= @$respostas[0] ?>"> <br>
          <input type="text" id="txt_opcao" name="txt_opcao2" value="<?= @$respostas[1] ?>">
        </div>

        <div class="input_opcoes">
          <input type="text" id="txt_opcao" name="txt_opcao3" value="<?= @$respostas[2] ?>"> <br>
          <input type="text" id="txt_opcao" name="txt_opcao4" value="<?= @$respostas[3] ?>">
        </div>
      </div>

      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?=$botao?>" onclick="<?= $router ?>">
        <input type="reset" value="Limpar">
        <a onclick="enquetes();">
          <input type="button" value="Cancelar">
        </a>
      </div>
    </form>
  </div>
