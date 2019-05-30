<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Vitoria
  Data Criação: 14/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de História da marca

 */

class ControllerHistoriaMarca
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $historiaMarcaDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/historia_marca.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/historiaMarcaDAO.php";

    // Instânciando a classe SetorDAO
    $this->historiaMarcaDAO = new HistoriaMarcaDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $texto = $_POST['txt_texto'];
      $dt_versao = $_POST['txt_dt_versao'];
      $status = $_POST['select_status'];

      // Instânciando a classe HistoriaMarca
      $historia_marca = new HistoriaMarca();

      // Guardando os dodos no objeto HistoriaMarca
      $historia_marca->setTexto($texto);
      $historia_marca->setDtVersao($dt_versao);
      $historia_marca->setStatus($status);

      // Insere o registro no BD
      $this->historiaMarcaDAO->insert($historia_marca);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->historiaMarcaDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $texto = $_POST['txt_texto'];
      $dt_versao = $_POST['txt_dt_versao'];
      $status = $_POST['select_status'];

      // Instânciando a classe HistoriaMarca
      $historia_marca = new HistoriaMarca();

      // Guardando os dodos no objeto HistoriaMarca
      $historia_marca->setTexto($texto);
      $historia_marca->setDtVersao($dt_versao);
      $historia_marca->setStatus($status);

      // Insere o registro no BD
      $this->historiaMarcaDAO->update($historia_marca, $id);

    }

  }

  public function listarRegistros()
  {

    return $this->historiaMarcaDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->historiaMarcaDAO->selectById($id);

  }

}

 ?>
