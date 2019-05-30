<?php 
class CorDAO {
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

  //insere um novo registro
  public function insert(Cor $cor){
    //query p/ insert
    $sql = "INSERT INTO tbl_cores(cod_hexadec, status, id_e_visuais) VALUES('".$cor->getCodHexadec()."',
    '".$cor->getStatus()."','".$cor->getElementoVisual()."')";
    //echo($sql);
    //Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
        echo 'Erro no script de insert';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();
  }

  public function selectAll(){
    $sql = "SELECT id_cor, cod_hexadec, status, nome_elemento, tc.id_e_visuais FROM tbl_cores tc
    INNER JOIN tbl_elementos_visuais tev WHERE tc.id_e_visuais = tev.id_e_visuais";

    $con=$this->conexao->connectDatabase();

    if(!$con->query($sql))
      echo "Erro na consulta";


    $select = $con->query($sql);

    $cont = 0;

    while($rsCor = $select->fetch(PDO::FETCH_ASSOC)){

      //objeto para listar as cores
      $cores[] = new Cor;

      $cores[$cont]->setIdCores($rsCor['id_cor']);
      $cores[$cont]->setCodHexadec($rsCor['cod_hexadec']);
      $cores[$cont]->setStatus($rsCor['status']);
      $cores[$cont]->setNomeElementoVisual($rsCor['nome_elemento']);
      $cores[$cont]->setElementoVisual($rsCor['id_e_visuais']);
      $cont+=1;
    }
    
    $this->conexao->closeDatabase();
    return $cores;
  }
  
  // Função deleta um registro no banco
  public function delete($id)
  {

    // Query de delete
    $sql = "DELETE FROM tbl_cores WHERE id_cor=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  public function updateStatus($idCor, $idElemento)
  {
      //call procedure
      $sql = "CALL sp_status($idElemento, $idCor)";

      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executa o script no BD
      if (!$con->query($sql))
        echo 'Erro no script de atualizar status';
      
      // Fechando a conexão com BD
      $this->conexao->closeDatabase();
  }
}

?>