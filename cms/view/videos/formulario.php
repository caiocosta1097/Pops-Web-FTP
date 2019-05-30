<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];


// Verificando se o objeto existe
if (isset($video)) {

  $id = $video->getId();;
  $titulo_video = $video->getTitulo();
  $arquivo= $video->getArquivo();
  $status = $video->getStatus();

  if ($status == 1) {
    $selected_ativado = "SELECTED";
    $selected_desativado = "";
  }else {
    $selected_ativado = "SELECTED";
    $selected_desativado = "SELECTED";
  }

  // //Função do onclick para saber qual ação chama o router
  $router = "router('videos', 'atualizar', '".$id."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR VÍDEO";


}else {

  //Função do onclick para saber qual ação chama o router
  $router = "router('videos', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR VÍDEO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <label for="txt_area">Titulo do vídeo</label>
    <input type="text" name="txt_titulo" value="<?= @$titulo_video ?>">

    <label for="txt_area">Link do arquivo</label>
    <input type="text" name="file_video" id="file_video" value="<?= @$arquivo?>">

    <label for="select_status">Status: </label> <br>
    <select class="select_status" name="select_status">
      <option <?= @$selected_ativado ?> value="1"> Ativado </option>
      <option <?= @$selected_desativado ?> value="0"> Desativado </option>
    </select>



    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="videos();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>
