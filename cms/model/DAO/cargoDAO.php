<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 25/03/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Cargos

*/

class CargoDAO
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
  public function insert(Cargo $cargo)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_cargo(nome, id_setor, status)  VALUES('".$cargo->getCargo()."', '".$cargo->getIdSetor()."', '".$cargo->getStatus()."')";

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
    $sql = "DELETE FROM tbl_cargo WHERE id_cargo=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Cargo $cargo, $id)
  {

    // Query de update
    $sql = "UPDATE tbl_cargo SET nome ='".$cargo->getCargo()."',
            id_setor = '".$cargo->getIdSetor()."', status = '".$cargo->getStatus()."' WHERE id_cargo=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de update';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função lista todos os registros do banco
  public function selectAll()
  {

    // Query de select
    $sql = "SELECT cargo.*, setor.nome AS setor_nome
    FROM tbl_cargo AS cargo
    INNER JOIN tbl_setor AS setor ON setor.id_setor = cargo.id_setor
    ORDER BY cargo.id_cargo DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsCargos = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Cargo
      $cargos[] = new Cargo();

      // Setando os valores do objeto
      $cargos[$cont]->setId($rsCargos['id_cargo']);
      $cargos[$cont]->setCargo($rsCargos['nome']);
      $cargos[$cont]->setIdSetor($rsCargos['id_setor']);
      $cargos[$cont]->setSetor($rsCargos['setor_nome']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $cargos;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_cargo WHERE id_cargo =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsCargo = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Cargo
      $cargo = new Cargo();

      // Setando os valores do objeto
      $cargo->setId($rsCargo['id_cargo']);
      $cargo->setCargo($rsCargo['nome']);
      $cargo->setIdSetor($rsCargo['id_setor']);
      $cargo->setStatus($rsCargo['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $cargo;

  }

}

?>
