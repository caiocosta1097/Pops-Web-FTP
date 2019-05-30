<?php

class VideoDAO
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $conexao;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importanto a classe de conexão com BD
    require_once "$path_local/cms/model/DAO/conexao.php";

    // Instânciando a classe de Conexão
    $this->conexao = new Conexao();

  }

  // Função que insere um registro no banco
  public function insert(Video $video)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_video(titulo, caminho, status)  VALUES('".$video->getTitulo()."', '".$video->getArquivo()."', '".$video->getStatus()."')";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de insert';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Video $video, $id)
  {
    // Query de update
    $sql = "UPDATE tbl_video
            SET titulo ='".$video->getTitulo()."',
                caminho ='".$video->getArquivo()."',
                status ='".$video->getStatus()."'
            WHERE id_video=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    if (!$con->query($sql))
    echo 'Erro no script de update';
    
    // Fechando a conexão com BD
    $this->conexao->closeDatabase();
  }

  // Função lista todos os registros do banco
  public function selectAll()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_video";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsVideos = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $videos[] = new Video();

      // Setando os valores do objeto
      $videos[$cont]->setId($rsVideos['id_video']);
      $videos[$cont]->setTitulo($rsVideos['titulo']);


      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $videos;

  }

  // Função deleta um registro no banco
  public function delete($id)
  {

    // Query de delete
    $sql = "DELETE FROM tbl_video WHERE id_video=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_video WHERE id_video =".$id;



    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsVideos = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $video = new Video();

      // Setando os valores do objeto
      $video->setId($rsVideos['id_video']);
      $video->setTitulo($rsVideos['titulo']);
      $video->setArquivo($rsVideos['caminho']);
      $video->setStatus($rsVideos['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $video;

  }
}

 ?>
