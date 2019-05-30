<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Caio
  Data Criação: 26/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Nível de Perfil

 */

class ControllerNivelPerfil
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $nivel_perfilDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/nivel_perfil.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/nivel_perfilDAO.php";

    // Instânciando a classe SetorDAO
    $this->nivel_perfilDAO = new NivelPerfilDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $perfil = $_POST['txt_perfil'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $nivel_perfil = new NivelPerfil();

      // Guardando os dodos no objeto Setor
      $nivel_perfil->setPerfil($perfil);
      $nivel_perfil->setStatus($status);

      // Insere o registro no BD
      $this->nivel_perfilDAO->insert($nivel_perfil);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->nivel_perfilDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $perfil = $_POST['txt_perfil'];
      $status = $_POST['select_status'];

      // Instânciando a classe Setor
      $nivel_perfil = new NivelPerfil();

      // Guardando os dodos no objeto Setor
      $nivel_perfil->setPerfil($perfil);
      $nivel_perfil->setStatus($status);

      // Insere o registro no BD
      $this->nivel_perfilDAO->update($nivel_perfil, $id);

    }

  }

  public function listarRegistros()
  {

    return $this->nivel_perfilDAO->selectAll();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->nivel_perfilDAO->selectById($id);

  }

}

?>