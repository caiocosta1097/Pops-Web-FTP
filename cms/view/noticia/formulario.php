<?php
// Verificando se o objeto existe
if (isset($noticias)) {
  // Pegando os dados do objeto e setando em variavéis locais
  $idNoticia = $noticias->getIdNoticia();
  $txtTituloNoticia = $noticias->getTitulo();
  $imagem = $noticias->getImagem();
  $txtDataNoticia = $noticias->getDataNoticia();
  $txtDescricaoNoticia = $noticias->getDescricao();
  $selectStatus = $noticias->getStatus();
  $selectStatusHome = $noticias->getStatusHome();
  if ($selectStatusHome == 1) {
    $selected_home = "SELECTED";
    $selected_desativado_home = "";
  }else {
    $selected_home = "SELECTED";
    $selected_desativado_home= "SELECTED";
  }
  if ($selectStatus == 1) {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "";
  }else {
    $selected_ativado_status = "SELECTED";
    $selected_desativado_status = "SELECTED";
  }
  //Função do onclick para saber qual ação chama o router
  $router = "router('noticia', 'atualizar', '".$idNoticia."')";
  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR NOTICIA";
}else{
  //Função do onclick para saber qual ação chama o router
  $router = "router('noticia', 'inserir', 0)";
  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR NOTÍCIA";
}
?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div>
      <label class="lblEventos" for="txt_">Título da notícia:</label><br>
      <input class="inputEventos font-input" type="text" id="txtTituloNoticia" name="txtTituloNoticia" value="<?= @$txtTituloNoticia?>">
    </div>

    <div>
      <label class="lblEventos" for="txt_">Data:</label><br>
      <input class="inputEventos font-input largura_data" maxlength="10" type="text" id="txtDataNoticia" name="txtDataNoticia" value="<?= @$txtDataNoticia?>">
    </div>

    <div>
      <label class="lblEventos" for="txt_">Descrição:</label>
      <textarea class="inputEventos font-input" type="text" id="txtDescricaoNoticia" name="txtDescricaoNoticia"><?= @$txtDescricaoNoticia?></textarea>
    </div>

    <div>
      <label class="lblEventos">Imagem da notícia:</label><br>
      <input type="file" name="flefoto" id="flefoto" required value="Escolher arquivo">
    </div>

      <label>Status</label><br>
      <div class="cadastro_necessario">
        <select name="select_status">
        <option <?= @$selected_ativado_status ?> value="1"> Ativado </option>

        <option <?= @$selected_desativado_status ?> value="0"> Desativado</option>

        </select>
      </div>

      <label>Status Home</label><br>
      <div class="cadastro_necessario">
        <select name="select_status_home">
          <option <?= @$selected_home ?> value="1"> Ativado </option>

          <option value="0" <?= @$selected_desativado_home ?>> Desativado</option>

        </select>
      </div>

    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
      <input type="reset" value="Limpar">
      <a onclick="noticia();">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
