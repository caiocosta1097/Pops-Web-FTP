<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variável de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($produto)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $produto->getId();
  $id_componente = $produto->getIdComponente();
  $id_nutricional = $produto->getIdNutricional();
  $id_produto_componente = $produto->getIdProdutoComponente();
  $nome = $produto->getNome();
  $unidade_medida = $produto->getUnidadeMedida();
  $descricao = $produto->getDescricao();
  $imagem = $produto->getImagem();
  $valor_unitario = $produto->getValorUnitario();
  $qtd_fardo = $produto->getQtdFardo();
  $qtd_estoque = $produto->getQtdEstoque();
  $peso = $produto->getPeso();
  $volume = $produto->getVolume();
  $localizacao = $produto->getLocalizacao();
  $ipi = $produto->getIpi();
  $demanda_mensal = $produto->getDemandaMensal();
  $tempo_ressuprimento = $produto->getTempoRessuprimento();
  $intervalo_ressuprimento = $produto->getIntervaloRessuprimento();
  $estoque_seguranca = $produto->getEstoqueSeguranca();
  $ponto_ressuprimento = $produto->getPontoRessuprimento();
  $lote_compras = $produto->getLoteCompras();
  $estoque_maximo = $produto->getEstoqueMaximo();
  $tipo_produto = $produto->getTipoProduto();
  $valor_energetico = $produto->getValorEnergetico();
  $carboidratos = $produto->getCarboidratos();
  $proteinas = $produto->getProteinas();
  $gordura_totais = $produto->getGorduraTotais();
  $gordura_saturadas = $produto->getGorduraSaturadas();
  $gordura_trans = $produto->getGorduraTrans();
  $fibra_alimentar = $produto->getFibraAlimentar();
  $sodio = $produto->getSodio();
  $status = $produto->getStatus();
  $status_home = $produto->getStatusHome();

  // Passando algumas variavéis por sessão para recuperar na controller
  $_SESSION['id_nutricional'] = $id_nutricional;
  $_SESSION['id_produto_componente'] = $id_produto_componente;
  $_SESSION['imagem'] = $imagem;

  //Função do onclick para saber qual ação chama o router
  $router = "router('produto', 'atualizar', '$id')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR PRODUTO";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('produto', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR PRODUTO";

}

// Importando a controller do objeto
require_once "$path_local/cms/controller/controllerComponente.php";

// Instânciando a controller
$controllerComponente = new ControllerComponente();

// Chamando o método que lista os registros e colocando em um result set
$rsMateriaPrima = $controllerComponente->listarMateriaPrima();
$rsEmbalagem = $controllerComponente->listarEmbalagem();

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_produto centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div>
      <div class="coluna_form_produto">
        <label for="txt_produto">Produto: </label> <br>
        <input type="text" id="txt_produto" name="txt_produto" value="<?= @$nome ?>">

        <label for="select_materia_prima">Matéria Prima: </label> <br>
        <select name="select_materia_prima">
          <?php  foreach ($rsMateriaPrima as $componente) { ?>
          <option <?= ($componente->getId() == @$id_componente ? "SELECTED" : NULL) ?> value="<?= $componente->getId() ?>"><?= $componente->getNome() ?></option>
        <?php } ?>
        </select>

        <label for="select_embalagem">Embalagem: </label> <br>
        <select name="select_embalagem">
          <?php  foreach ($rsEmbalagem as $componente) { ?>
          <option value="<?= $componente->getId() ?>"><?= $componente->getNome() ?></option>
        <?php } ?>
        </select>

        <label for="txt_unidade_medida">Unidade de Medida: </label> <br>
        <input type="number" id="txt_unidade_medida" name="txt_unidade_medida" value="<?= @$unidade_medida ?>">

        <label for="txt_valor">Valor Unitário: </label> <br>
        <input type="number" id="txt_valor" name="txt_valor" value="<?= @$valor_unitario ?>">

        <label for="txt_localizacao">Localização: </label> <br>
        <input type="text" id="txt_localizacao" name="txt_localizacao" value="<?= @$localizacao ?>">

        <label for="txt_qtd_fardo">Quantidade Fardo: </label> <br>
        <input type="number" id="txt_qtd_fardo" name="txt_qtd_fardo" value="<?= @$qtd_fardo ?>">

        <label for="txt_proteina">Proteína: </label> <br>
        <input type="number" id="txt_proteina" name="txt_proteina" value="<?= @$proteinas ?>">

      </div>

      <div class="coluna_form_produto">

        <label for="file_img">Imagem: </label> <br>
        <input id="file_img" type="file" name="file_img">

        <label for="txt_descricao">Descrição: </label> <br>
        <textarea id="txt_descricao_produto" name="txt_descricao"><?= @$descricao ?></textarea>

        <label for="txt_ipi">IPI: </label> <br>
        <input type="number" id="txt_ipi" name="txt_ipi" value="<?= @$ipi ?>">



        <label for="txt_peso">Peso: </label> <br>
        <input type="number" id="txt_peso" name="txt_peso" value="<?= @$peso ?>">

        <label for="txt_volume">Volume: </label> <br>
        <input type="number" id="txt_volume" name="txt_volume" value="<?= @$volume ?>">

        <label for="txt_demanda_mensal">Demanda Mensal: </label> <br>
        <input type="number" id="txt_demanda_mensal" name="txt_demanda_mensal" value="<?= @$demanda_mensal ?>">

        <label for="txt_estoque_seguranca">Estoque de Segurança: </label> <br>
        <input type="number" id="txt_estoque_seguranca" name="txt_estoque_seguranca" value="<?= @$estoque_seguranca ?>">

      </div>

      <div class="coluna_form_produto">


        <label for="txt_ponto_ressuprimento">Ponto de Ressuprimento: </label> <br>
        <input type="number" id="txt_ponto_ressuprimento" name="txt_ponto_ressuprimento" value="<?= @$ponto_ressuprimento ?>">

        <label for="txt_lote_compras">Lote de Compras: </label> <br>
        <input type="number" id="txt_lote_compras" name="txt_lote_compras" value="<?= @$lote_compras ?>">

        <label for="txt_estoque_maximo">Estoque Máximo: </label> <br>
        <input type="number" id="txt_estoque_maximo" name="txt_estoque_maximo" value="<?= @$estoque_maximo ?>">

        <label for="select_tipo">Tipo de Produto: </label> <br>
        <select class="select_tipo" name="select_tipo">
          <option <?= (@$tipo_produto == "Suco" ? "SELECTED" : NULL) ?> value="Suco"> Suco </option>
          <option <?= (@$tipo_produto == "Água" ? "SELECTED" : NULL) ?> value="Água"> Água </option>
          <option <?= (@$tipo_produto == "Refrigerante" ? "SELECTED" : "") ?> value="Refrigerante"> Refrigerante </option>
        </select>

        <label for="select_status">Status: </label> <br>
        <select class="select_status" name="select_status">
          <option <?= (@$status == "1" ? "SELECTED" : NULL) ?> value="1"> Ativado </option>
          <option <?= (@$status == "0" ? "SELECTED" : NULL) ?> value="0"> Desativado </option>
        </select>

        <label for="select_status_home">Status Home: </label> <br>
        <select class="select_status" name="select_status_home">
          <option <?= (@$status_home == "1" ? "SELECTED" : NULL) ?> value="1"> Ativado </option>
          <option <?= (@$status_home == "0" ? "SELECTED" : NULL) ?> value="0"> Desativado </option>
        </select>

        <label for="txt_gordura_totais">Gordura Totais: </label> <br>
        <input type="number" id="txt_gordura_totais" name="txt_gordura_totais" value="<?= @$gordura_totais ?>">

        <label for="txt_intervalo_ressuprimento">Intervalo de Ressuprimento: </label> <br>
        <input type="text" id="txt_intervalo_ressuprimento" name="txt_intervalo_ressuprimento" value="<?= @$intervalo_ressuprimento ?>">

      </div>

      <div class="coluna_form_produto">

        <label for="txt_tempo_ressuprimento">Tempo de Ressuprimento: </label> <br>
        <input type="number" id="txt_tempo_ressuprimento" name="txt_tempo_ressuprimento" value="<?= @$tempo_ressuprimento ?>">

        <label for="txt_qtd_estoque">Quantidade Estoque: </label> <br>
        <input type="number" id="txt_qtd_estoque" name="txt_qtd_estoque" value="<?= @$qtd_estoque ?>">

        <label for="txt_valor_energetico">Valor Energético: </label> <br>
        <input type="number" id="txt_valor_energetico" name="txt_valor_energetico" value="<?= @$valor_energetico ?>">

        <label for="txt_carboidratos">Carboidratos: </label> <br>
        <input type="number" id="txt_carboidratos" name="txt_carboidratos" value="<?= @$carboidratos ?>">

        <label for="txt_fibra_alimentar">Fibra Alimentar: </label> <br>
        <input type="number" id="txt_fibra_alimentar" name="txt_fibra_alimentar" value="<?= @$fibra_alimentar ?>">

        <label for="txt_gordura_saturada">Gordura Saturada: </label> <br>
        <input type="number" id="txt_gordura_saturada" name="txt_gordura_saturada" value="<?= @$gordura_saturadas ?>">

        <label for="txt_gordura_trans">Gordura Trans: </label> <br>
        <input type="number" id="txt_gordura_trans" name="txt_gordura_trans" value="<?= @$gordura_trans ?>">

        <label for="txt_sodio">Sódio: </label> <br>
        <input type="number" id="txt_sodio" name="txt_sodio" value="<?= @$sodio ?>">
      </div>

    </div>
    <div>
      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
        <input type="reset" value="Limpar">
        <a onclick="adm_cms('produto');">
          <input type="button" value="Cancelar">
        </a>
      </div>
    </div>
  </form>
</div>
