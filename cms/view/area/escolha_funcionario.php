<?php

// Iniciando uma sessão
session_start();

// Iniciando a variável em null para não haver erro
$path_url = null;

// Variável que recebe a variáveil de sessão
$path_url = $_SESSION['path_url'];

?>

<div class="title_paginas centralizarX">
    Administração
</div>
<div class="opcoes_funcionario centralizarX centralizarY">
  <div class="caixa_opcao">
    <div class="foto_opcoes centralizarX">
      <a href="<?= "$path_url/cms/view/pagina_setor.php" ?>">
        <img src="<?= "$path_url/cms/view/img/adm_setor.png" ?>" alt="">
      </a>
    </div>
    <div class="titulo_opcao">
      Adm. Setor
    </div>
  </div>
  <div class="caixa_opcao">
    <div class="foto_opcoes centralizarX">
      <a href="<?= "$path_url/cms/view/pagina_cargo.php" ?>">
        <img src="<?= "$path_url/cms/view/img/adm_cargo.png" ?>" alt="">
      </a>
    </div>
    <div class="titulo_opcao">
      Adm. Cargo
    </div>
  </div>
  <div class="caixa_opcao">
    <div class="foto_opcoes centralizarX">
      <a href="<?= "$path_url/cms/view/pagina_funcionario.php"?>">
        <img src="<?= "$path_url/cms/view/img/funcionarios.png" ?>" alt="">
      </a>
    </div>
    <div class="titulo_opcao">
      Adm. Funcionário
    </div>
  </div>

  <div class="caixa_opcao">
    <div class="foto_opcoes centralizarX">
      <a href="<?= "$path_url/cms/view/pagina_nivel_perfil.php"?>">
        <img src="<?= "$path_url/cms/view/img/level.png" ?>" alt="">
      </a>
    </div>
    <div class="titulo_opcao">
      Adm. Nivel de usuário
    </div>
  </div>
</div>
