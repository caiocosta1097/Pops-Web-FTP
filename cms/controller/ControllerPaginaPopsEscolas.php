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

class ControllerPaginaPopsEscolas{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $paginaEscolaDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Enquete
    require_once "$path_local/cms/model/paginaEscola.php";

    require_once "$path_local/cms/upload.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/paginaEscolaDAO.php";

    // Instânciando a classe SetorDAO
    $this->paginaEscolaDAO = new PaginaEscolaDAO();

  }

  public function inserirRegistro(){

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $descricao = $_POST['txtDescricao'];
      $imagem1 = upload($_FILES['file_img1']);
        $imagem2 = upload($_FILES['file_img2']);
          $imagem3 = upload($_FILES['file_img3']);
            $imagem4 = upload($_FILES['file_img4']);


      // Instânciando a classe Setor
      $paginaEscola = new PaginaEscola();

      // Guardando os dodos no objeto Setor
      $paginaEscola->setDescricao($descricao);
      $paginaEscola->setImagem1($imagem1);
      $paginaEscola->setImagem2($imagem2);
      $paginaEscola->setImagem3($imagem3);
      $paginaEscola->setImagem4($imagem4);

      // Insere o registro no BD
      $this->paginaEscolaDAO->insert($paginaEscola);

    }

  }

  public function atualizarRegistro(){

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $descricao = $_POST['txtDescricao'];

      // Instânciando a classe Setor
      $paginaEscola = new PaginaEscola();

      // Guardando os dodos no objeto Enquete
      $paginaEscola->setDescricao($descricao);


      // Insere o registro no BD
      $this->paginaEscolaDAO->update($paginaEscola, $id);

    }
  }


  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->paginaEscolaDAO->delete($id);

  }

  public function listarRegistros()
  {

    return $this->paginaEscolaDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->paginaEscolaDAO->selectById($id);

  }

}
  ?>
