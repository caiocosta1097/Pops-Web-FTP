<?php

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

// Importanto a classe de conexão com BD
require_once "$path_local/cms/model/DAO/conexao.php";

// Função para verificar se o usuário ainda está autenticado
function verificarAutentica(){

  // Instânciando a classe de Conexão
  $conexao = new Conexao();

  // Verifica se a variável de sessão existe, senão redireciona para página de login
  if(isset($_SESSION['cod'])){

    // Variável que recebe o id do user
    $cod = $_SESSION['cod'];

    // SELECT do funcionário logado
    $sql = "SELECT tbl_funcionario.*, tbl_perfil.perfil AS perfil_nome
    FROM tbl_funcionario, tbl_perfil
    WHERE tbl_funcionario.id_perfil = tbl_perfil.id_perfil
    AND matricula =".$cod;

    // Abrindo conexão com BD
    $con = $conexao->connectDatabase();

    // Executando o SELECT
    $select = $con->query($sql);

    // Coloca o registro em um array
    $rsUser = $select->fetch(PDO::FETCH_ASSOC);

    // Verifica se logout existe, encerra a variável de sessão e redireciona para página de login
    if(isset($_GET['logout'])){

      // Encerrando a sessão
      session_destroy();

      // Direcionando para página de login
      header("location: $path_url/cms/login.php");

    }

  }else
  header("location: $path_url/cms/login.php");

  // REtorna o funcionário que logou
  return $rsUser;

}

?>
