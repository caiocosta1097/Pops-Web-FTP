<?php

// Iniciando uma sessão
session_start();

// Iniciando as variáveis em null para não haver erro
$path_local = null;
$path_url = null;

// Variáveis que recebem as variáveis de sessão
$path_local = $_SESSION['path_local'];
$path_url = $_SESSION['path_url'];

// Importanto a classe de conexão com BD
require_once "$path_local/cms/model/DAO/conexao.php";

// Instânciando a classe de Conexão
$conexao = new Conexao();

// Verifica se o formulário foi submetido
if (isset($_POST['btn_login'])) {

  // Variáveis que recebem o usuário e senha digitados
  $user = $_POST['txt_usuario'];
  $senha = $_POST['txt_senha'];

  // Variávalpara fazer o controle da autenticação
  $autenticar = false;

  // SELECT de todos os registros da tabela
  $sql = "SELECT * FROM tbl_funcionario";

  // Abrindo a conexão com BD
  $con = $conexao->connectDatabase();

  // Executando o SELECT do banco
  $select = $con->query($sql);

  // Loop para pegar cada registro no SELECT e colocar em um array
  while($rsUsers = $select->fetch(PDO::FETCH_ASSOC)){

    // Coloca o usuário e a senha de cada registro em variáveis
    $_user = $rsUsers['usuario'];
    $_senha = $rsUsers['senha'];

    // Verifica se existe alguma combinação com o usuário e senha digitados
    if($user == $_user and $senha == $_senha){

      // Autenticação fica true se existir a combinação
      $autenticar = true;

      // Cria uma variável de sessão que recebe o código do funcionário
      $_SESSION['cod'] = $rsUsers['matricula'];

    }

  }

  // Verifica se a autenticação é verdadeira e redireciona para o CMS, senão exibe um erro
  if($autenticar)
  header("location:$path_url/cms/view/home.php");
  else
  echo "<script>alert('Login ou senha inválido'); window.location.assign('login.php');</script>";

}

?>
