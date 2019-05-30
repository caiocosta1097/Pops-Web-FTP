<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 24/03/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Setores

*/

class SetorDAO
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
  public function insert(Setor $setor)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_setor(nome, status)  VALUES('".$setor->getSetor()."', '".$setor->getStatus()."')";

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
    $sql = "DELETE FROM tbl_setor WHERE id_setor=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Setor $setor, $id)
  {

    // Query de update
    $sql = "UPDATE tbl_setor SET nome ='".$setor->getSetor()."', status = '".$setor->getStatus()."' WHERE id_setor=".$id;

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
    $sql = "SELECT * FROM tbl_setor ORDER BY id_setor DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsSetores = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $setores[] = new Setor();

      // Setando os valores do objeto
      $setores[$cont]->setId($rsSetores['id_setor']);
      $setores[$cont]->setSetor($rsSetores['nome']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $setores;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_setor WHERE id_setor =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsSetores = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $setor = new Setor();

      // Setando os valores do objeto
      $setor->setId($rsSetores['id_setor']);
      $setor->setSetor($rsSetores['nome']);
      $setor->setStatus($rsSetores['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $setor;

  }

}

?>
