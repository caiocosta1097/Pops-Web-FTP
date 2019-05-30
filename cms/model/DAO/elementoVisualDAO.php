<?php 

class ElementoVisualDAO {
  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $conexao;

  //construtor
  public function __construct()
  {
    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importanto a classe de conexão com BD
    require_once "$path_local/cms/model/DAO/conexao.php";

    // Instânciando a classe de Conexão
    $this->conexao = new Conexao();
  }

  

  public function selectAll(){
    $sql = "SELECT * FROM tbl_elementos_visuais";

    $con=$this->conexao->connectDatabase();

    if(!$con->query($sql))
      echo "Erro na consulta";


    $select = $con->query($sql);

    $cont = 0;

    while($rsElementoVisual = $select->fetch(PDO::FETCH_ASSOC)){

      //objeto para listar as cores
      $elementoVisuais[] = new ElementoVisual;

      $elementoVisuais[$cont]->setIdElementoVisual($rsElementoVisual['id_e_visuais']);
      $elementoVisuais[$cont]->setNomeElemento($rsElementoVisual['nome_elemento']);
     

      $cont+=1;
    }
    
    $this->conexao->closeDatabase();
    return $elementoVisuais;
  } 

  //


}

?>