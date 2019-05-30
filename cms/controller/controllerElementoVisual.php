<?php

class ControllerElementoVisual
{
    // Iniciando a variável em null para não haver erro
    private $path_local;

    // Atributo que será instânciado
    private $elementoVisualDAO;

    function __construct()
    {

    // Variável que recebe a variável de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/elementoVisual.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/elementoVisualDAO.php";

    // Instânciando a classe SetorDAO
    $this->elementoVisualDAO = new ElementoVisualDAO();

  }

  public function listar(){
      return $this->elementoVisualDAO->selectAll();
  }

} 

?>