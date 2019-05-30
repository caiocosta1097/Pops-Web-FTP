<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($cargo)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $cargo->getId();
  $nome_cargo = $cargo->getCargo();
  $id_setor = $cargo->getIdSetor();
  $status = $cargo->getStatus();

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  //Função do onclick para saber qual ação chama o router
  $router = "router('cargo', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR CARGO";

}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('cargo', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR CARGO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST">
    <label for="txt_cargo">Cargo</label>
    <input type="text" id="txt_cargo" name="txt_cargo" value="<?= @$nome_cargo ?>">
    <label for="select_setor">Setor</label>
    <select name="select_setor">
      <?php

      // Importando a controller de setor
      require_once "$path_local/cms/controller/controllerSetor.php";

      // Instânciando a classe do controler
      $controllerSetor = new ControllerSetor();

      // Result set que recebe os dados
      $rsSetor = $controllerSetor->listarRegistros();

      // Variável do contador
      $cont = 0;

      // Loop para colocar todos os registros no result set
      while ($cont < count($rsSetor)) {

        // Verificando se o select está com o option que corresponde ao setor do cargo
        if ($rsSetor[$cont]->getId() == $id_setor)
        $selected = "selected";
        else
        $selected = "";

        ?>
        <option <?= $selected ?> value="<?= $rsSetor[$cont]->getId() ?>"><?= $rsSetor[$cont]->getSetor() ?></option>
        <?php $cont++; } ?>

    </select>
    
      <label for="select_status">Status: </label> <br>
      <select class="select_status" name="select_status">
        <option <?= @$selected_ativado ?> value="1"> Ativado </option>
        <option <?= @$selected_desativado ?> value="0"> Desativado </option>
      </select>

      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
        <input type="reset" value="Limpar">
        <a onclick="cargo();">
          <input type="button" value="Cancelar">
        </a>
      </div>
    </form>
  </div>
