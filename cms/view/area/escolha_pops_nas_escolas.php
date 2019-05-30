<?php

// Iniciando uma sessão
session_start();

// Iniciando a variável em null para não haver erro
$path_url = null;

// Variável que recebe a variáveil de sessão
$path_url = $_SESSION['path_url'];

?>

<div class="title_paginas centralizarX">
   Gerenciamento de Pop's nas escolas
</div>
<div class="opcoes_funcionario centralizarX centralizarY">


  <div class="caixa_opcao">
    <div class="foto_opcoes centralizarX">
      <a href="<?= "$path_url/cms/view/conteudo_pops_nas_escolas.php" ?>">
        <img src="<?= "$path_url/cms/view/img/conteudo.png" ?>" alt="">
      </a>
    </div>
    <div class="titulo_opcao">
      Adm. Conteudo
    </div>
  </div>
  <div class="caixa_opcao">
    <div class="foto_opcoes centralizarX">
      <a href="<?= "$path_url/cms/view/pagina_pops_nas_escolas.php" ?>">
        <img src="<?= "$path_url/cms/view/img/form.png" ?>" alt="">
      </a>
    </div>
    <div class="titulo_opcao">
      Adm. Formularios
    </div>
  </div>
</div>
