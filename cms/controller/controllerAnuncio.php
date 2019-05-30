<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Arielle
  Data Criação: 22/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de comentarios

 */

class ControllerAnuncio{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $anuncioDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Enquete
    require_once "$path_local/cms/model/anuncio.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/anuncioDAO.php";

    // Instânciando a classe SetorDAO
    $this->anuncioDAO = new AnuncioDAO();

  }

  public function listarRegistros(){

    return $this->anuncioDAO->selectAll();

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->anuncioDAO->delete($id);

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->anuncioDAO->selectById($id);

  }

  public function status()
  {

    $id = $_GET['id'];

    $status = $_GET['status'];

    if($status == 0){
      return $this->anuncioDAO->update($id, 1);
    } else {
      return $this->anuncioDAO->update($id, 0);
    }
  }
}

?>
