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

class AnuncioDAO
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
    $sql = "SELECT anuncios.*, estabelecimento.nome_fantasia AS estabelecimento_nome
    FROM tbl_anuncio AS anuncios
    INNER JOIN tbl_pessoa_juridica AS estabelecimento ON anuncios.cnpj = estabelecimento.cnpj";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsAnuncio = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $anuncios[] = new Anuncio();

      // Setando os valores do objeto
      $anuncios[$cont]->setId($rsAnuncio['id_anuncio']);
      $anuncios[$cont]->setIdUser($rsAnuncio['cnpj']);
      $anuncios[$cont]->setEstabelecimento($rsAnuncio['estabelecimento_nome']);
      $anuncios[$cont]->setAnuncio($rsAnuncio['descricao']);
      $anuncios[$cont]->setStatus($rsAnuncio['status']);


      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $anuncios;

  }


    public function selectById($id){
      // Query de select + id
      $sql = "SELECT anuncios.*, estabelecimento.nome_fantasia AS estabelecimento_nome
      FROM tbl_anuncio AS anuncios
      INNER JOIN tbl_pessoa_juridica AS estabelecimento ON anuncios.cnpj = estabelecimento.cnpj AND id_anuncio= ".$id;


      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executando o select
      $select = $con->query($sql);

      //retorna somente um contato
      if($rsAnuncio = $select->fetch(PDO::FETCH_ASSOC)) {

          $anuncio = new Anuncio();
          $anuncio->setId($rsAnuncio['id_anuncio']);
          $anuncio->setEstabelecimento($rsAnuncio['estabelecimento_nome']);
          $anuncio->setImagem($rsAnuncio['img_anuncio']);
          $anuncio->setAnuncio($rsAnuncio['descricao']);
      }

      $this->conexao->closeDatabase();
      return $anuncio;

  }

  // Função deleta um registro no banco
  public function delete($id)
  {

    // Query de delete
    $sql = "DELETE FROM tbl_anuncio WHERE id_anuncio=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  public function update($id, $status){
    $sql = "UPDATE tbl_anuncio SET status = $status WHERE id_anuncio = $id";


    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $con->query($sql);

    //Fechar a conexão com o BD
    $this->conexao->closeDatabase();

  }
}
