<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Vitoria
  Data Criação: 25/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller da Pessoa fisica

 */

class ControllerPessoaFisica
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $pessoaFisicaDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];
    $path_url = $_SESSION['path_url'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/pessoaFisica.php";

	  require_once "$path_local/cms/upload.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/pessoaFisicaDAO.php";

    // Instânciando a classe SetorDAO
    $this->pessoaFisicaDAO = new PessoaFisicaDAO();

  }

  public function inserirRegistro(){
    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $pessoaFisica = new PessoaFisica();

      $pessoaFisica->setNome($_POST["txtNome"]);
      $pessoaFisica->setCpf($_POST["txtCpf"]);
      $pessoaFisica->setImagem(upload($_FILES['file_img']));
      $pessoaFisica->setEmail($_POST["txtEmail"]);
      $pessoaFisica->setTelefone($_POST["txtTelefone"]);
      $pessoaFisica->setCelular($_POST["txtCelular"]);
      $pessoaFisica->setDtNasc($_POST["dtNasc"]);
      $pessoaFisica->setStatus("1");
      $pessoaFisica->setLogradouro($_POST["txtLogradouro"]);
      $pessoaFisica->setNumero($_POST["txtNumero"]);
      $pessoaFisica->setBairro($_POST["txtBairro"]);
      $pessoaFisica->setCidade($_POST["txtCidade"]);
      $pessoaFisica->setUsuario( $_POST["txtUser"]);
      $pessoaFisica->setSenha( $_POST["txtSenha"]);

      // Insere o registro no BD
      $this->pessoaFisicaDAO->insert($pessoaFisica);
    }
  }



  public function listarRegistros()
  {

    return $this->pessoaFisicaDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->pessoaFisicaDAO->selectById($id);

  }

}

 ?>
