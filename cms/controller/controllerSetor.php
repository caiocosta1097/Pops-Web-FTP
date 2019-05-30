<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Caio
  Data Criação: 24/03/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Setor

 */

class ControllerSetor
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $setorDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/setor.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/setorDAO.php";

    // Instânciando a classe SetorDAO
    $this->setorDAO = new SetorDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $setor_nome = $_POST['txt_setor'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $setor = new Setor();

      // Guardando os dodos no objeto Setor
      $setor->setSetor($setor_nome);
      $setor->setStatus($status);

      // Insere o registro no BD
      $this->setorDAO->insert($setor);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->setorDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $setor_nome = $_POST['txt_setor'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $setor = new Setor();

      // Guardando os dodos no objeto Setor
      $setor->setSetor($setor_nome);
      $setor->setStatus($status);

      // Insere o registro no BD
      $this->setorDAO->update($setor, $id);

    }

  }

  public function listarRegistros()
  {

    return $this->setorDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->setorDAO->selectById($id);

  }

}

 ?>
