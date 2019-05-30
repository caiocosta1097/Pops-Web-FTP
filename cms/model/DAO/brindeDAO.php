<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 25/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Brindes

*/

class BrindeDAO
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
  public function insert(Brinde $brinde)
  {

    $nome = $brinde->getNome();
    $valor_unitario = $brinde->getValorUnitario();
    $descricao = $brinde->getDescricao();
    $peso = $brinde->getPeso();
    $volume = $brinde->getVolume();
    $imagem = $brinde->getimagem();
    $status = $brinde->getStatus();

    // Query de insert
    $sql = "INSERT INTO tbl_brinde(nome, valor_unitario, descricao, peso, volume, imagem, status)
            VALUES
            (
              '$nome',
              '$valor_unitario',
              '$descricao',
              '$peso',
              '$volume',
              '$imagem',
              '$status'
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
    $sql = "DELETE FROM tbl_brinde WHERE id_brinde = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Brinde $brinde, $id)
  {

    $nome = $brinde->getNome();
    $valor_unitario = $brinde->getValorUnitario();
    $descricao = $brinde->getDescricao();
    $peso = $brinde->getPeso();
    $volume = $brinde->getVolume();
    $imagem = $brinde->getimagem();
    $status = $brinde->getStatus();

    // Query de update
    $sql = "UPDATE tbl_brinde SET
            nome = '$nome',
            valor_unitario = '$valor_unitario',
            descricao = '$descricao',
            peso = '$peso',
            volume = '$volume',
            imagem = '$imagem',
            status = '$status'
            WHERE id_brinde = $id";

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
    $sql = "SELECT * FROM tbl_brinde ORDER BY id_brinde DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsBrindes = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do objeto
      $brindes[] = new Brinde();

      // Setando os valores do objeto
      $brindes[$cont]->setId($rsBrindes['id_brinde']);
      $brindes[$cont]->setNome($rsBrindes['nome']);
      $brindes[$cont]->setValorUnitario($rsBrindes['valor_unitario']);
      $brindes[$cont]->setDescricao($rsBrindes['descricao']);
      $brindes[$cont]->setPeso($rsBrindes['peso']);
      $brindes[$cont]->setImagem($rsBrindes['imagem']);
      $brindes[$cont]->setStatus($rsBrindes['status']);

      $cont ++;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $brindes;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_brinde WHERE id_brinde = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsBrinde = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância do objeto
      $brinde = new Brinde();

      // Setando os valores do objeto
      $brinde->setId($rsBrinde['id_brinde']);
      $brinde->setNome($rsBrinde['nome']);
      $brinde->setValorUnitario($rsBrinde['valor_unitario']);
      $brinde->setDescricao($rsBrinde['descricao']);
      $brinde->setPeso($rsBrinde['peso']);
      $brinde->setVolume($rsBrinde['volume']);
      $brinde->setImagem($rsBrinde['imagem']);
      $brinde->setStatus($rsBrinde['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $brinde;

  }

}

?>
