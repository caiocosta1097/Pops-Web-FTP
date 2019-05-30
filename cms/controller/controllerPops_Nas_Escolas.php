<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Arielle
  Data Criação: 09/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de enquetes

 */

class ControllerEscolas{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $escolaDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Enquete
    require_once "$path_local/cms/model/escola.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/escolaDAO.php";

    // Instânciando a classe SetorDAO
    $this->escolaDAO = new EscolaDAO();

  }

  public function excluirRegistro(){
    $id = $_GET['id'];

    $this->escolaDAO->delete($id);
  }


  public function listarRegistros(){

    return $this->escolaDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->escolaDAO->selectById($id);

  }

  
}
  ?>
