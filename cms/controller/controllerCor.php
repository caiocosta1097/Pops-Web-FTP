<?php

class ControllerCor
{
    // Iniciando a variável em null para não haver erro
    private $path_local;

    // Atributo que será instânciado
    private $corDAO;

    function __construct()
    {

    // Variável que recebe a variável de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/cor.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/corDAO.php";

    // Instânciando a classe SetorDAO
    $this->corDAO = new CorDAO();

  }

  public function inserir(){
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
          $cod_cor = $_POST['ipt_hexadec'];
         
          $elemento = $_POST['slt_elementos'];

         
          //instancia a classe para passar setar os valores
          $cor = new Cor();

          $cor->setCodHexadec($cod_cor);
          $cor->setStatus(0);
          $cor->setElementoVisual($elemento);
        
          //realiza o insert dentro do DB
          $this->corDAO->insert($cor);  
      }
  }

  public function listar(){
      return $this->corDAO->selectAll();
  }

  public function excluir()
  {

    $id = $_GET['id'];
    $this->corDAO->delete($id);

  }

  public function updateStatus(){
      $idCor = $_GET['id'];
      $idElement = $_GET['status'];

      echo "<script>console.log('Ok 2 mano');</script>";
      echo "<script>console.log($idCor);</script>";
      echo "<script>console.log($idElement);</script>";

      $this->corDAO->updateStatus($idCor, $idElement);

  }

} 

?>