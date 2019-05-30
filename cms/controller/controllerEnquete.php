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

class ControllerEnquete{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $enqueteDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Enquete
    require_once "$path_local/cms/model/enquete.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/enqueteDAO.php";

    // Instânciando a classe SetorDAO
    $this->enqueteDAO = new EnqueteDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $titulo = $_POST['txt_titulo'];
      $data = $_POST['txt_data'];
      $select_status = $_POST['select_status'];
      $resp1 = $_POST['txt_opcao1'];
      $resp2 = $_POST['txt_opcao2'];
      $resp3 = $_POST['txt_opcao3'];
      $resp4 = $_POST['txt_opcao4'];


      // Instânciando a classe Setor
      $enquete = new Enquete();

      // Guardando os dodos no objeto Setor
      $enquete->setTitulo($titulo);
      $enquete->setData($data);
      $enquete->setStatus($select_status);
      $enquete->setResposta("$resp1,$resp2,$resp3,$resp4");

      // Insere o registro no BD
      $this->enqueteDAO->insert($enquete);

    }
  }

  public function atualizarRegistro(){

    $id = $_GET['id'];

    $id_opcoes = explode(",", $_SESSION['id_opcoes']);

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $titulo = $_POST['txt_titulo'];
      $data = $_POST['txt_data'];
      $select_status = $_POST['select_status'];
      $resp1 = $_POST['txt_opcao1'];
      $resp2 = $_POST['txt_opcao2'];
      $resp3 = $_POST['txt_opcao3'];
      $resp4 = $_POST['txt_opcao4'];


      // Instânciando a classe Setor
      $enquete = new Enquete();

      // Guardando os dodos no objeto Setor
      $enquete->setTitulo($titulo);
      $enquete->setData($data);
      $enquete->setStatus($select_status);
      $enquete->setResposta("$resp1,$resp2,$resp3,$resp4");
      $enquete->setId_opcao("$id_opcoes[0],$id_opcoes[1],$id_opcoes[2],$id_opcoes[3]");

      // Insere o registro no BD
      $this->enqueteDAO->update($enquete, $id);

    }
  }

  public function excluirRegistro(){
    $id = $_GET['id'];

    $this->enqueteDAO->delete($id);
  }

  public function listarRegistros(){

    return $this->enqueteDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->enqueteDAO->selectById($id);

  }

  public function listarOpcoes($id)
  {
    return $this->enqueteDAO->selectById($id);
  }

  

}
  ?>
