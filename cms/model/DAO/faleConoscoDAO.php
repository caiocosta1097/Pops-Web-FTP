<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 11/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Fale conosco

*/

class FaleConoscoDAO
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

  public function insert(FaleConosco $faleConosco){


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
    $sql = "DELETE FROM tbl_fale_conosco WHERE id_fale_conosco=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }


   // Função lista todos os registros do banco
   public function selectAll()
   {

     // Query de select
     $sql = "SELECT *  FROM tbl_fale_conosco ORDER BY id_fale_conosco DESC";

     // Recebendo a função que faz a conexão com BD
     $con = $this->conexao->connectDatabase();

     // Executando o select
     $select = $con->query($sql);

     // Contador
     $cont = 0;

     // Loop que coloca todos os registros em um result set
     while ($rsFaleConosco = $select->fetch(PDO::FETCH_ASSOC)) {

       // Array de dados do tipo Cargo
       $faleConosco[] = new FaleConosco();

       // Setando os valores do objeto
       $faleConosco[$cont]->setId($rsFaleConosco['id_fale_conosco']);
       $faleConosco[$cont]->setNome($rsFaleConosco['nome']);
       $faleConosco[$cont]->setEmail($rsFaleConosco['email']);
       $faleConosco[$cont]->setTelefone($rsFaleConosco['telefone']);
       $faleConosco[$cont]->setTipo($rsFaleConosco['tipo']);
       $faleConosco[$cont]->setDescricao($rsFaleConosco['descricao']);
       $faleConosco[$cont]->setCelular($rsFaleConosco['celular']);

       $cont += 1;

     }

     // Fechando a conexão com BD
     $this->conexao->closeDatabase();

     // Retorna o array
     return $faleConosco;

   }

   // Função busca um registro no banco atráve do id
   public function selectById($id)
   {

     // Query de select + id
     $sql = "SELECT * FROM tbl_fale_conosco WHERE id_fale_conosco =".$id;

     // Recebendo a função que faz a conexão com BD
     $con = $this->conexao->connectDatabase();

     // Executando o select
     $select = $con->query($sql);

     // Verifica se o result set recebeu o registro
     if ($rsFaleConosco = $select->fetch(PDO::FETCH_ASSOC)) {

       // Instância da classe Cargo
       $faleConosco = new FaleConosco();

       // Setando os valores do objeto
       $faleConosco->setId($rsFaleConosco['id_fale_conosco']);
       $faleConosco->setNome($rsFaleConosco['nome']);
       $faleConosco->setEmail($rsFaleConosco['email']);
       $faleConosco->setTelefone($rsFaleConosco['telefone']);
       $faleConosco->setTipo($rsFaleConosco['tipo']);
       $faleConosco->setDescricao($rsFaleConosco['descricao']);
       $faleConosco->setCelular($rsFaleConosco['celular']);

     }

     // Fechando a conexão com BD
     $this->conexao->closeDatabase();

     // Retornando o objeto
     return $faleConosco;

   }

}

?>
