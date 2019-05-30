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

class EscolaDAO
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

  // Função lista todos os registros do banco
  public function selectAll()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_escola ORDER BY id_escola DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsEscolas = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $escolas[] = new Escola();

      // Setando os valores do objeto
      $escolas[$cont]->setId($rsEscolas['id_escola']);
      $escolas[$cont]->setEscola($rsEscolas['nome']);
      $escolas[$cont]->setCNPJ($rsEscolas['cnpj']);

      $cont += 1;
    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $escolas;

  }

  // Função deleta um registro no banco
  public function delete($id)
  {

    // Query de delete
    $sql = "DELETE FROM tbl_escola WHERE id_escola=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id) {
    // Query de select + id
    $sql = "SELECT * FROM tbl_escola WHERE id_escola =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsEscolas = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $escola = new Escola();

      // Setando os valores do objeto
      $escola->setId($rsEscolas['id_escola']);
      $escola->setEscola($rsEscolas['nome']);
      $escola->setTelefone($rsEscolas['telefone']);
      $escola->setResponsavel($rsEscolas['responsavel']);
      $escola->setLocalidade($rsEscolas['localidade']);
      $escola->setCNPJ($rsEscolas['cnpj']);
      $escola->setMotivo($rsEscolas['motivo']);
      $escola->setEmail($rsEscolas['email']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $escola;

  }
}


?>
