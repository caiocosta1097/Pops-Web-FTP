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

class ControllerComentario{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $comentarioDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Enquete
    require_once "$path_local/cms/model/comentario.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/comentarioDAO.php";

    // Instânciando a classe SetorDAO
    $this->comentarioDAO = new ComentarioDAO();

  }


  public function excluirRegistro(){
    $id = $_GET['id'];

    $this->comentarioDAO->delete($id);
  }

  public function listarRegistros(){

    return $this->comentarioDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->comentarioDAO->selectById($id);

  }


  public function status()
  {

    $id = $_GET['id'];

    $status = $_GET['status'];

    if($status == 0){
      return $this->comentarioDAO->update($id, 1);
    } else {
      return $this->comentarioDAO->update($id, 0);
    }
  }
}

?>
