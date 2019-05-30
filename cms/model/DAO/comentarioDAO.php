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

class ComentarioDAO
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
    $sql = "SELECT comentario.*, pessoa_fisica.nome AS pessoa_nome
    FROM tbl_comentario AS comentario
    INNER JOIN tbl_pessoa_fisica AS pessoa_fisica ON pessoa_fisica.id_p_fisica = comentario.id_p_fisica;";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsComentarios = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $comentarios[] = new Comentario();

      // Setando os valores do objeto
      $comentarios[$cont]->setId($rsComentarios['id_comentario']);
      $comentarios[$cont]->setIdUser($rsComentarios['id_p_fisica']);
      $comentarios[$cont]->setUser($rsComentarios['pessoa_nome']);
      $comentarios[$cont]->setComentario($rsComentarios['descricao']);
      $comentarios[$cont]->setStatus($rsComentarios['status']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $comentarios;

  }

  // Função deleta um registro no banco
  public function delete($id)
  {

    // Query de delete
    $sql = "DELETE FROM tbl_comentario WHERE id_comentario=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  public function selectById($id){
    // Query de select + id
  $sql = "SELECT comentario.*, pessoa_fisica.nome AS pessoa_nome
          FROM tbl_comentario AS comentario
          INNER JOIN tbl_pessoa_fisica AS pessoa_fisica ON comentario.id_p_fisica = pessoa_fisica.id_p_fisica
          WHERE comentario.id_comentario = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    //retorna somente um contato
    if($rsComentarios = $select->fetch(PDO::FETCH_ASSOC)) {

        $comentarios = new Comentario();
        $comentarios->setId($rsComentarios['id_comentario']);
        $comentarios->setUser($rsComentarios['pessoa_nome']);
        $comentarios->setComentario($rsComentarios['descricao']);

    }
    //Fechar a conexão com o BD
    $this->conexao->closeDatabase();
    return $comentarios;

  }

  public function update($id, $status){
    $sql = "UPDATE tbl_comentario SET status = $status WHERE id_comentario = $id";


    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $con->query($sql);

    //Fechar a conexão com o BD
    $this->conexao->closeDatabase();

  }

}


?>
