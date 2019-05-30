<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Caio
  Data Criação: 14/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Planeta Sustentável

 */

class ControllerSustentavel
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $sustentavelDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];
    $path_url = $_SESSION['path_url'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/sustentavel.php";

	  require_once "$path_local/cms/upload.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/sustentavelDAO.php";

    // Instânciando a classe SetorDAO
    $this->sustentavelDAO = new SustentavelDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		  $imagem = upload($_FILES['file_img']);
      $descricao = $_POST['txt_descricao'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $sustentavel = new Sustentavel();

      // Guardando os dodos no objeto Setor
      $sustentavel->setImagem($imagem);
      $sustentavel->setDescricao($descricao);
      $sustentavel->setStatus($status);

      // Insere o registro no BD
      $this->sustentavelDAO->insert($sustentavel);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->sustentavelDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $imagemBanco = $_SESSION['imagem'];

      $imagem = upload($_FILES['file_img']);

      if ($imagem == "")
        $imagem = $imagemBanco;

      $descricao = $_POST['txt_descricao'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $sustentavel = new Sustentavel();

      // Guardando os dodos no objeto Setor
      $sustentavel->setImagem($imagem);
      $sustentavel->setDescricao($descricao);
      $sustentavel->setStatus($status);

      // Insere o registro no BD
      $this->sustentavelDAO->update($sustentavel, $id);

    }

  }

  public function listarRegistros()
  {

    return $this->sustentavelDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->sustentavelDAO->selectById($id);

  }

}

 ?>
