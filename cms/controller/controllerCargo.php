<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Caio
  Data Criação: 25/03/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Cargo

 */

class ControllerCargo
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $cargoDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/cargo.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/cargoDAO.php";

    // Instânciando a classe SetorDAO
    $this->cargoDAO = new CargoDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $cargo_nome = $_POST['txt_cargo'];
      $id_setor = $_POST['select_setor'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $cargo = new Cargo();

      // Guardando os dodos no objeto Setor
      $cargo->setCargo($cargo_nome);
      $cargo->setIdSetor($id_setor);
      $cargo->setStatus($status);

      // Insere o registro no BD
      $this->cargoDAO->insert($cargo);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->cargoDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $cargo_nome = $_POST['txt_cargo'];
      $id_setor = $_POST['select_setor'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $cargo = new Cargo();

      // Guardando os dodos no objeto Setor
      $cargo->setCargo($cargo_nome);
      $cargo->setIdSetor($id_setor);
      $cargo->setStatus($status);

      // Insere o registro no BD
      $this->cargoDAO->update($cargo, $id);

    }

  }

  public function listarRegistros()
  {

    return $this->cargoDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->cargoDAO->selectById($id);

  }

}

 ?>
