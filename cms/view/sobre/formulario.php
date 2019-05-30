<?php
// Iniciando uma sessão
@session_start();
// Iniciando a variável em null para não haver erro
$path_local = null;
// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];
// Verificando se o objeto existe
if (isset($sobre)) {
  // Pegando os dados do objeto e setando em variavéis locais
  $id = $sobre->getId();
  $tituloSobre = $sobre->getTituloSobre();
  $descricao = $sobre->getDescricao();
  $imagem = $sobre->getImagem();
  $status = $sobre->getStatus();
  $_SESSION['imagem'] = $imagem;
  //Função do onclick para saber qual ação chama o router
  $router = "router('sobre', 'atualizar', '".$id."')";
  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "Atualizar Sobre a POP'S";
}else {
  //Função do onclick para saber qual ação chama o router
  $router = "router('sobre', 'inserir', 0)";
  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "Cadastrar Sobre a POP'S";
}
?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <label for="file_img">Imagem</label>
    <input type="file" id="file_img" name="file_img" value="<?= @$imagem ?>">
    <label for="txt_descricao">Titulo</label>
    <textarea name="txt_titulo" rows="4" required><?= @$tituloSobre ?></textarea>
    <label for="txt_descricao">Descrição</label>
    <textarea name="txt_descricao" rows="4" required><?= @$descricao ?></textarea>
    <label for="select_status">Status</label>
    <select name="select_status">
      <option <?= (@$status == 1 ? "SELECTED" : "") ?> value="1">Ativado</option>
      <option <?= (@$status == 0 ? "SELECTED" : "") ?> value="0">Desativado</option>
    </select>
      <div class="area_botao_form">
        <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>;">
        <input type="reset" value="Limpar">
        <a onclick="sobre();">
          <input type="button" value="Voltar">
        </a>
      </div>
    </form>
  </div>
