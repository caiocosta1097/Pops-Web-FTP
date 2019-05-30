<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 14/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de HistoriaMarca

*/

class HistoriaMarcaDAO
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
  public function insert(HistoriaMarca $historia_marca)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_historia(dt_versao, descricao, status)
    VALUES('".$historia_marca->getDtVersao()."', '".$historia_marca->getTexto()."', '".$historia_marca->getStatus()."')";



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
    $sql = "DELETE FROM tbl_historia WHERE id_historia=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(HistoriaMarca $historia_marca, $id)
  {

    // Query de update
    $sql = "UPDATE tbl_historia SET dt_versao ='".$historia_marca->getDtVersao()."',
            descricao = '".$historia_marca->getTexto()."',
            status = '".$historia_marca->getStatus()."'
            WHERE id_historia=".$id;

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
    $sql = "SELECT *  FROM tbl_historia ORDER BY id_historia DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);


    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsHistoria = $select->fetch(PDO::FETCH_ASSOC)) {


      // Array de dados do tipo Cargo
      $historia_marca[] = new HistoriaMarca();

      // Setando os valores do objeto
      $historia_marca[$cont]->setId($rsHistoria['id_historia']);
      $historia_marca[$cont]->setTexto($rsHistoria['descricao']);
      $historia_marca[$cont]->setDtVersao($rsHistoria['dt_versao']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $historia_marca;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_historia WHERE id_historia =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsHistoria = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Cargo
      $historia_marca = new HistoriaMarca();

      // Setando os valores do objeto
      $historia_marca->setId($rsHistoria['id_historia']);
      $historia_marca->setTexto($rsHistoria['descricao']);
      $historia_marca->setDtVersao($rsHistoria['dt_versao']);
      $historia_marca->setStatus($rsHistoria['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $historia_marca;

  }

}

?>
