<?php
/*
  Projeto: Pop'Soda Drink
  Autor: Vitoria
  Data Criação: 21/04/2019
  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:
  Objetivo da Classe: Controller de Sobre a Pops
 */
class ControllerSobre
{
  // Iniciando a variável em null para não haver erro
  private $path_local;
  // Atributo que será instânciado
  private $sobreDAO;
  function __construct()
  {
    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];
    $path_url = $_SESSION['path_url'];
    // Importando a classe Setor
    require_once "$path_local/cms/model/sobre.php";
	  require_once "$path_local/cms/upload.php";
    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/sobreDAO.php";
    // Instânciando a classe SetorDAO
    $this->sobreDAO = new SobreDAO();
  }
  public function inserirRegistro()
  {
    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $tituloSobre = $_POST['txt_titulo'];
      $descricao = $_POST['txt_descricao'];
      $status = $_POST['select_status'];
		  $imagem = upload($_FILES['file_img']);
      // Instânciando a classe Setor
      $sobre = new Sobre();
      // Guardando os dodos no objeto Setor
      $sobre->setTituloSobre($tituloSobre);
      $sobre->setDescricao($descricao);
      $sobre->setStatus($status);
      $sobre->setImagem($imagem);
      // Insere o registro no BD
      $this->sobreDAO->insert($sobre);
    }
  }
  public function excluirRegistro()
  {
    $id = $_GET['id'];
    $this->sobreDAO->delete($id);
  }
  public function atualizarRegistro()
  {

    $id = $_GET['id'];
    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



      $tituloSobre = $_POST['txt_titulo'];
      $descricao = $_POST['txt_descricao'];
      $status = $_POST['select_status'];
      
      $imagemBanco = $_SESSION['imagem'];

      $imagem = upload($_FILES['file_img']);

      if ($imagem == "")
        $imagem = $imagemBanco;
      // Instânciando a classe Setor
      $sobre = new Sobre();
      // Guardando os dodos no objeto Setor
      $sobre->setTituloSobre($tituloSobre);
      $sobre->setDescricao($descricao);
      $sobre->setStatus($status);
      $sobre->setImagem($imagem);
      // Insere o registro no BD
      $this->sobreDAO->update($sobre, $id);
    }
  }
  public function listarRegistros()
  {
    return $this->sobreDAO->selectAll();
  }
  public function buscarRegistro()
  {
    $id = $_GET['id'];
    return $this->sobreDAO->selectById($id);
  }
}
 ?>
