<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 22/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Componentes

*/

class ComponenteDAO
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
  public function insert(Componente $componente)
  {

    // Query de insert
    $sql = "INSERT INTO tbl_componente
            (
              nome, tipo, qtd, valor_unitario, localizacao,
              descricao, ipi, demanda_mensal, tempo_ressuprimento, intervalo_ressuprimento,
              estoque_seguranca, ponto_ressuprimento, lote_compras, estoque_maximo, status
            )
            VALUES
            (
              '".$componente->getNome()."',
              '".$componente->getTipo()."',
              '".$componente->getQtd()."',
              '".$componente->getValorUnitario()."',
              '".$componente->getLocalizacao()."',
              '".$componente->getDescricao()."',
              '".$componente->getIpi()."',
              '".$componente->getDemandaMensal()."',
              '".$componente->getTempoRessuprimento()."',
              '".$componente->getIntervaloRessuprimento()."',
              '".$componente->getEstoqueSeguranca()."',
              '".$componente->getPontoRessuprimento()."',
              '".$componente->getLoteCompras()."',
              '".$componente->getEstoqueMaximo()."',
              '".$componente->getStatus()."'
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
    $sql = "DELETE FROM tbl_componente WHERE id_componente=".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Componente $componente, $id)
  {

    // Query de update
    $sql = "UPDATE tbl_componente SET nome ='".$componente->getNome()."',
                                tipo = '".$componente->getTipo()."',
                                qtd = '".$componente->getQtd()."',
                                valor_unitario = '".$componente->getValorUnitario()."',
                                localizacao = '".$componente->getLocalizacao()."',
                                descricao = '".$componente->getDescricao()."',
                                ipi = '".$componente->getIpi()."',
                                demanda_mensal = '".$componente->getDemandaMensal()."',
                                tempo_ressuprimento = '".$componente->getTempoRessuprimento()."',
                                intervalo_ressuprimento = '".$componente->getIntervaloRessuprimento()."',
                                estoque_seguranca = '".$componente->getEstoqueSeguranca()."',
                                ponto_ressuprimento = '".$componente->getPontoRessuprimento()."',
                                lote_compras = '".$componente->getLoteCompras()."',
                                estoque_maximo = '".$componente->getEstoqueMaximo()."',
                                status = '".$componente->getStatus()."'
                                WHERE id_componente=".$id;

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
    $sql = "SELECT * FROM tbl_componente ORDER BY id_componente DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsComponentes = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Cargo
      $componentes[] = new Componente();

      // Setando os valores do objeto
      $componentes[$cont]->setId($rsComponentes['id_componente']);
      $componentes[$cont]->setNome($rsComponentes['nome']);
      $componentes[$cont]->setTipo($rsComponentes['tipo']);
      $componentes[$cont]->setQtd($rsComponentes['qtd']);
      $componentes[$cont]->setValorUnitario($rsComponentes['valor_unitario']);
      $componentes[$cont]->setLocalizacao($rsComponentes['localizacao']);
      $componentes[$cont]->setDescricao($rsComponentes['descricao']);
      $componentes[$cont]->setIpi($rsComponentes['ipi']);
      $componentes[$cont]->setDemandaMensal($rsComponentes['demanda_mensal']);
      $componentes[$cont]->setTempoRessuprimento($rsComponentes['tempo_ressuprimento']);
      $componentes[$cont]->setIntervaloRessuprimento($rsComponentes['intervalo_ressuprimento']);
      $componentes[$cont]->setEstoqueSeguranca($rsComponentes['estoque_seguranca']);
      $componentes[$cont]->setPontoRessuprimento($rsComponentes['ponto_ressuprimento']);
      $componentes[$cont]->setLoteCompras($rsComponentes['lote_compras']);
      $componentes[$cont]->setEstoqueMaximo($rsComponentes['estoque_maximo']);
      $componentes[$cont]->setStatus($rsComponentes['status']);

      $cont ++;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $componentes;

  }

  public function selectMateriaPrima()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_componente WHERE tipo = 'M' ORDER BY id_componente DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsComponentes = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Cargo
      $componentes[] = new Componente();

      // Setando os valores do objeto
      $componentes[$cont]->setId($rsComponentes['id_componente']);
      $componentes[$cont]->setNome($rsComponentes['nome']);

      $cont ++;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $componentes;

  }

  public function selectEmbalagem()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_componente WHERE tipo = 'E' ORDER BY id_componente DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsComponentes = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do tipo Cargo
      $componentes[] = new Componente();

      // Setando os valores do objeto
      $componentes[$cont]->setId($rsComponentes['id_componente']);
      $componentes[$cont]->setNome($rsComponentes['nome']);

      $cont ++;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $componentes;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT * FROM tbl_componente WHERE id_componente =".$id;

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsComponente = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Cargo
      $componente = new Componente();

      // Setando os valores do objeto
      $componente->setId($rsComponente['id_componente']);
      $componente->setNome($rsComponente['nome']);
      $componente->setTipo($rsComponente['tipo']);
      $componente->setQtd($rsComponente['qtd']);
      $componente->setValorUnitario($rsComponente['valor_unitario']);
      $componente->setLocalizacao($rsComponente['localizacao']);
      $componente->setDescricao($rsComponente['descricao']);
      $componente->setIpi($rsComponente['ipi']);
      $componente->setDemandaMensal($rsComponente['demanda_mensal']);
      $componente->setTempoRessuprimento($rsComponente['tempo_ressuprimento']);
      $componente->setIntervaloRessuprimento($rsComponente['intervalo_ressuprimento']);
      $componente->setEstoqueSeguranca($rsComponente['estoque_seguranca']);
      $componente->setPontoRessuprimento($rsComponente['ponto_ressuprimento']);
      $componente->setLoteCompras($rsComponente['lote_compras']);
      $componente->setEstoqueMaximo($rsComponente['estoque_maximo']);
      $componente->setStatus($rsComponente['status']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $componente;

  }

}

?>
