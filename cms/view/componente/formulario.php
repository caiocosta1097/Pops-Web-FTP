<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($componente)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $componente->getId();
  $nome = $componente->getNome();
  $tipo = $componente->getTipo();
  $qtd = $componente->getQtd();
  $valor_unitario = $componente->getValorUnitario();
  $localizacao = $componente->getLocalizacao();
  $descricao = $componente->getDescricao();
  $ipi = $componente->getIpi();
  $demanda_mensal = $componente->getDemandaMensal();
  $tempo_ressuprimento = $componente->getTempoRessuprimento();
  $intervalo_ressuprimento = $componente->getIntervaloRessuprimento();
  $estoque_seguranca = $componente->getEstoqueSeguranca();
  $ponto_ressuprimento = $componente->getPontoRessuprimento();
  $lote_compras = $componente->getLoteCompras();
  $estoque_maximo = $componente->getEstoqueMaximo();
  $status = $componente->getStatus();

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('componente', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR COMPONENTE";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('componente', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR COMPONENTE";

}

?>

  <div class="title_paginas centralizarX">
     <?= $titulo ?>
  </div>
  <div class="caixa_form_componente centralizarX">
    <form id="form" method="POST">
      <div>
        <div class="coluna_form">
          <label for="txt_componente">Componente: </label> <br>
          <input type="text" id="txt_componente" name="txt_componente" value="<?= @$nome ?>">

          <label for="select_tipo">Tipo: </label> <br>
          <select class="select_tipo" name="select_tipo">
            <option <?= (@$tipo == "M" ? "SELECTED" : "") ?> value="M"> Matéria Prima </option>
            <option <?= (@$tipo == "E" ? "SELECTED" : "") ?> value="E"> Embalagem </option>
          </select>

          <label for="txt_qtd">Quantidade: </label> <br>
          <input type="number" id="txt_qtd" name="txt_qtd" value="<?= @$qtd ?>">

          <label for="txt_valor">Valor Unitário: </label> <br>
          <input type="number" id="txt_valor" name="txt_valor" value="<?= @$valor_unitario ?>">

          <label for="txt_localizacao">Localização: </label> <br>
          <input type="text" id="txt_localizacao" name="txt_localizacao" value="<?= @$localizacao ?>">
        </div>

        <div class="coluna_form">
          <label for="txt_descricao">Descrição: </label> <br>
          <input type="text" id="txt_descricao" name="txt_descricao" value="<?= @$descricao ?>">

          <label for="txt_ipi">IPI: </label> <br>
          <input type="number" id="txt_ipi" name="txt_ipi" value="<?= @$ipi ?>">

          <label for="txt_demanda_mensal">Demanda Mensal: </label> <br>
          <input type="number" id="txt_demanda_mensal" name="txt_demanda_mensal" value="<?= @$demanda_mensal ?>">

          <label for="txt_tempo_ressuprimento">Tempo de Ressuprimento: </label> <br>
          <input type="number" id="txt_tempo_ressuprimento" name="txt_tempo_ressuprimento" value="<?= @$tempo_ressuprimento ?>">

          <label for="txt_intervalo_ressuprimento">Intervalo de Ressuprimento: </label> <br>
          <input type="text" id="txt_intervalo_ressuprimento" name="txt_intervalo_ressuprimento" value="<?= @$intervalo_ressuprimento ?>">
        </div>

        <div class="coluna_form">
          <label for="txt_estoque_seguranca">Estoque de Segurança: </label> <br>
          <input type="number" id="txt_estoque_seguranca" name="txt_estoque_seguranca" value="<?= @$estoque_seguranca ?>">

          <label for="txt_ponto_ressuprimento">Ponto de Ressuprimento: </label> <br>
          <input type="number" id="txt_ponto_ressuprimento" name="txt_ponto_ressuprimento" value="<?= @$ponto_ressuprimento ?>">

          <label for="txt_lote_compras">Lote de Compras: </label> <br>
          <input type="number" id="txt_lote_compras" name="txt_lote_compras" value="<?= @$lote_compras ?>">

          <label for="txt_estoque_maximo">Estoque Máximo: </label> <br>
          <input type="number" id="txt_estoque_maximo" name="txt_estoque_maximo" value="<?= @$estoque_maximo ?>">

          <label for="select_status">Status: </label> <br>
          <select class="select_status" name="select_status">
            <option <?= @$selected_ativado ?> value="1"> Ativado </option>
            <option <?= @$selected_desativado ?> value="0"> Desativado </option>
          </select>

        </div>

      </div>
      <div>
        <div class="area_botao_form">
          <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
          <input type="reset" value="Limpar">
          <a onclick="adm_cms('componente');">
            <input type="button" value="Cancelar">
          </a>
        </div>
      </div>
    </form>
  </div>
