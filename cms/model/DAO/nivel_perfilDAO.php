<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 26/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe dos níveis de Perfil

*/

class NivelPerfilDAO
{

  // Atributos que serão instânciados
  private $path_local;
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
  public function insert(NivelPerfil $nivel_perfil)
  {

    $perfil = $nivel_perfil->getPerfil();
    $status = $nivel_perfil->getStatus();

    // Query de insert
    $sql = "INSERT INTO tbl_perfil(perfil, status)  VALUES('$perfil', '$status')";

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
    $sql = "DELETE FROM tbl_perfil WHERE id_perfil = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(NivelPerfil $nivel_perfil, $id)
  {

    $perfil = $nivel_perfil->getPerfil();
    $status = $nivel_perfil->getStatus();

    // Query de update
    $sql = "UPDATE tbl_perfil SET perfil = '$perfil', status = '$status' WHERE id_perfil = $id";

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
    $sql = "SELECT * FROM tbl_perfil ORDER BY id_perfil DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsNiveisPerfil = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Setor
      $niveis_perfil[] = new NivelPerfil();

      // Setando os valores do objeto
      $niveis_perfil[$cont]->setId($rsNiveisPerfil['id_perfil']);
      $niveis_perfil[$cont]->setPerfil($rsNiveisPerfil['perfil']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $niveis_perfil;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_perfil WHERE id_perfil = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsNivelPerfil = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $nivel_perfil = new NivelPerfil();

      // Setando os valores do objeto
      $nivel_perfil->setId($rsNivelPerfil['id_perfil']);
      $nivel_perfil->setPerfil($rsNivelPerfil['perfil']);
      $nivel_perfil->setStatus($rsNivelPerfil['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $nivel_perfil;

  }

}

?>