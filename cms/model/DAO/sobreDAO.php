<?php
/*
Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 21/04/2019
Data Modificação:
Conteúdo Modificação:
Autor Modificação:
Objetivo da Classe: CRUD da classe do Sobre a Pops
*/
class SobreDAO
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
  public function insert(Sobre $sobre)
  {
    // Query de insert
    $sql = "INSERT INTO tbl_quem_somos(titulo, descricao, status, imagem)
            VALUES(
            '".$sobre->getTituloSobre()."',
            '".$sobre->getDescricao()."',
            '".$sobre->getStatus()."',
            '".$sobre->getImagem()."'
            )";
    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();
    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de insert';
    // Fechando a conexão com BD
    $this->conexao->closeDatabase();
  }
  // Função deleta um registro no banco
  public function delete($id)
  {
    // Query de delete
    $sql = "DELETE FROM tbl_quem_somos WHERE id_quem_somos=".$id;
    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();
    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';
    // Fechando a conexão com BD
    $this->conexao->closeDatabase();
  }
  // Função atualiza um registro no banco
  public function update(Sobre $sobre, $id)
  {
    // Query de update
    $sql = "UPDATE tbl_quem_somos
            SET titulo ='".$sobre->getTituloSobre()."',
                descricao ='".$sobre->getDescricao()."',
                status ='".$sobre->getStatus()."',
                imagem ='".$sobre->getImagem()."'
            WHERE id_quem_somos=".$id;
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
    $sql = "SELECT * FROM tbl_quem_somos";
    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();
    // Executando o select
    $select = $con->query($sql);
    // Contador
    $cont = 0;
    // Loop que coloca todos os registros em um result set
    while ($rsSobre = $select->fetch(PDO::FETCH_ASSOC)) {
      // Array de dados do Objeto
      $sobre[] = new Sobre();
      // Setando os valores do objeto
      $sobre[$cont]->setId($rsSobre['id_quem_somos']);
      $sobre[$cont]->setTituloSobre($rsSobre['titulo']);
      $sobre[$cont]->setDescricao($rsSobre['descricao']);
      $sobre[$cont]->setStatus($rsSobre['status']);
      $sobre[$cont]->setImagem($rsSobre['imagem']);

      $cont ++;
    }
    // Fechando a conexão com BD
    $this->conexao->closeDatabase();
    // Retorna o array
    return $sobre;
  }
  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {
    // Query de select + id
    $sql = "SELECT * FROM tbl_quem_somos WHERE id_quem_somos =".$id;
    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();
    // Executando o select
    $select = $con->query($sql);
    // Verifica se o result set recebeu o registro
    if ($rsSobre = $select->fetch(PDO::FETCH_ASSOC)) {
      // Instância da classe Setor
      $sobre = new Sobre();
      // Setando os valores do objeto
      $sobre->setId($rsSobre['id_quem_somos']);
      $sobre->setTituloSobre($rsSobre['titulo']);
      $sobre->setDescricao($rsSobre['descricao']);
      $sobre->setStatus($rsSobre['status']);
      $sobre->setImagem($rsSobre['imagem']);
    }
    // Fechando a conexão com BD
    $this->conexao->closeDatabase();
    // Retornando o objeto
    return $sobre;
  }
}
?>
