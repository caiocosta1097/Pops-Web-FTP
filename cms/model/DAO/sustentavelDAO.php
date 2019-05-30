<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 14/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe do PLaneta Sustentável

*/

class SustentavelDAO
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
  public function insert(Sustentavel $sustentavel)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_sustentavel(imagem, descricao, status)
            VALUES(
            '".$sustentavel->getImagem()."',
            '".$sustentavel->getDescricao()."',
            '".$sustentavel->getStatus()."'
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
    $sql = "DELETE FROM tbl_sustentavel WHERE id_sustentavel=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Sustentavel $sustentavel, $id)
  {

    // Query de update
    $sql = "UPDATE tbl_sustentavel
            SET imagem ='".$sustentavel->getImagem()."',
                descricao ='".$sustentavel->getDescricao()."',
                status ='".$sustentavel->getStatus()."'
            WHERE id_sustentavel=".$id;

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
    $sql = "SELECT * FROM tbl_sustentavel ORDER BY id_sustentavel DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsSustentavel = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do Objeto
      $sustentavel[] = new Sustentavel();

      // Setando os valores do objeto
      $sustentavel[$cont]->setId($rsSustentavel['id_sustentavel']);
      $sustentavel[$cont]->setImagem($rsSustentavel['imagem']);
      $sustentavel[$cont]->setDescricao($rsSustentavel['descricao']);
      $sustentavel[$cont]->setStatus($rsSustentavel['status']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $sustentavel;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_sustentavel WHERE id_sustentavel =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsSustentavel = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $sustentavel = new Sustentavel();

      // Setando os valores do objeto
      $sustentavel->setId($rsSustentavel['id_sustentavel']);
      $sustentavel->setImagem($rsSustentavel['imagem']);
      $sustentavel->setDescricao($rsSustentavel['descricao']);
      $sustentavel->setStatus($rsSustentavel['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $sustentavel;

  }

}

?>
