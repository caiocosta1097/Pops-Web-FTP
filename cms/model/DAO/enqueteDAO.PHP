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

class EnqueteDAO
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
  public function insert(Enquete $enquete)
  {

    $respostas = explode(",", $enquete->getResposta());

    // Query de insert
    $sql = "CALL sp_enquete (
      '".$enquete->getTitulo()."',
      '".$enquete->getData()."',
      '".$enquete->getStatus()."',
      '".$respostas[0]."',
      '".$respostas[1]."',
      '".$respostas[2]."',
      '".$respostas[3]."'
    )";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de insert <br>';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }


  // Função deleta um registro no banco
  public function delete($id){

    // Query de delete
    $sql = "DELETE FROM tbl_enquete WHERE id_enquete=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }


    // Função atualiza um registro no banco
    public function update(Enquete $enquete, $id)
    {

      $respostas = explode(",", $enquete->getResposta());
      $id_opcoes = explode(",", $enquete->getId_opcao());

      // Query de update
      $sql = "CALL sp_enquete_update (
        '".$id."',
        '".$enquete->getTitulo()."',
        '".$enquete->getData()."',
        '".$enquete->getStatus()."',
        '".$respostas[0]."',
        '".$respostas[1]."',
        '".$respostas[2]."',
        '".$respostas[3]."',
        '".$id_opcoes[0]."',
        '".$id_opcoes[1]."',
        '".$id_opcoes[2]."',
        '".$id_opcoes[3]."'
      )";

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
    $sql = "SELECT * FROM tbl_enquete ORDER BY id_enquete DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsEnquetes = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $enquetes[] = new Enquete();

      // Setando os valores do objeto
      $enquetes[$cont]->setId($rsEnquetes['id_enquete']);
      $enquetes[$cont]->setTitulo($rsEnquetes['enunciado_enquete']);
      $enquetes[$cont]->setData($rsEnquetes['dt_enquete']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $enquetes;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id) {

    // Query de select + id
    $sql = "SELECT enquete.*, GROUP_CONCAT(opcoes.text_opcao) AS _resposta, GROUP_CONCAT(opcoes.id_opcoes) AS _id
            FROM tbl_enquete AS enquete
            INNER JOIN tbl_opcoes AS opcoes ON opcoes.id_enquete = enquete.id_enquete
            WHERE enquete.id_enquete =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsEnquetes = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $enquete = new Enquete();

      // Setando os valores do objeto
      $enquete->setId($rsEnquetes['id_enquete']);
      $enquete->setTitulo($rsEnquetes['enunciado_enquete']);
      $enquete->setData($rsEnquetes['dt_enquete']);
      $enquete->setResposta($rsEnquetes['_resposta']);
      $enquete->setId_opcao($rsEnquetes['_id']);
      $enquete->setStatus($rsEnquetes['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $enquete;

  }

  public function selectOptionsByEnqId($id){
       // Query de select + id
      $sql = "SELECT ops.text_opcao AS opts FROM tbl_enquete enq INNER JOIN tbl_opcoes ops 
      WHERE enq.id_enquete = ops.id_enquete AND enq.id_enquete=".$id;

      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executando o select
      $select = $con->query($sql);

      // Contador
      $cont = 0;
      // Verifica se o result set recebeu o registro
      while($rsEnquetes = $select->fetch(PDO::FETCH_ASSOC)) {
        // Instância da classe Setor
        $enquete[] = new Enquete();

        // Setando os valores do objeto
        $enquete[$cont]->setResposta($rsEnquetes['opts']);

        $cont+=1;
      }
      // Fechando a conexão com BD
      $this->conexao->closeDatabase();

      // Retornando o objeto
      return $enquete;

  }

 
}


?>
