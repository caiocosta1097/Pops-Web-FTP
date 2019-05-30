<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 28/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: CRUD da classe de Produtos

*/

class ProdutoDAO
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
  public function insert(Produto $produto)
  {

    // Trazendo os valores do objeto para variáveis locais
    $nome = $produto->getNome();
    $unidade_medida = $produto->getUnidadeMedida();
    $descricao = $produto->getDescricao();
    $imagem = $produto->getImagem();
    $valor_unitario = $produto->getValorUnitario();
    $qtd_fardo = $produto->getQtdFardo();
    $qtd_estoque = $produto->getQtdEstoque();
    $peso = $produto->getPeso();
    $volume = $produto->getVolume();
    $localizacao = $produto->getLocalizacao();
    $ipi = $produto->getIpi();
    $demanda_mensal = $produto->getDemandaMensal();
    $tempo_ressuprimento = $produto->getTempoRessuprimento();
    $intervalo_ressuprimento = $produto->getIntervaloRessuprimento();
    $estoque_seguranca = $produto->getEstoqueSeguranca();
    $ponto_ressuprimento = $produto->getPontoRessuprimento();
    $lote_compras = $produto->getLoteCompras();
    $estoque_maximo = $produto->getEstoqueMaximo();
    $tipo_produto = $produto->getTipoProduto();
    $valor_energetico = $produto->getValorEnergetico();
    $carboidratos = $produto->getCarboidratos();
    $proteinas = $produto->getProteinas();
    $gordura_totais = $produto->getGorduraTotais();
    $gordura_saturadas = $produto->getGorduraSaturadas();
    $gordura_trans = $produto->getGorduraTrans();
    $fibra_alimentar = $produto->getFibraAlimentar();
    $sodio = $produto->getSodio();
    $id_componente = $produto->getIdComponente();
    $status = $produto->getStatus();
    $status_home = $produto->getStatusHome();

    // Query de insert
    $sql = "CALL sp_produto
    (
      '$nome',
      '$unidade_medida',
      '$descricao',
      '$imagem',
      '$valor_unitario',
      '$qtd_fardo',
      '$qtd_estoque',
      '$peso',
      '$volume',
      '$localizacao',
      '$ipi',
      '$demanda_mensal',
      '$tempo_ressuprimento',
      '$intervalo_ressuprimento',
      '$estoque_seguranca',
      '$ponto_ressuprimento',
      '$lote_compras',
      '$estoque_maximo',
      '$tipo_produto',
      '$valor_energetico',
      '$carboidratos',
      '$proteinas',
      '$gordura_totais',
      '$gordura_saturadas',
      '$gordura_trans',
      '$fibra_alimentar',
      '$sodio',
      '$id_componente',
      '$status',
      '$status_home'
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
    $sql = "DELETE FROM tbl_produto WHERE id_produto = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executa o script no BD
    if (!$con->query($sql))
    echo 'Erro no script de delete';

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

  }

  // Função atualiza um registro no banco
  public function update(Produto $produto, $id)
  {

    // Trazendo os valores do objeto para variáveis locais
    $id = $produto->getId();
    $id_componente = $produto->getIdComponente();
    $id_nutricional = $produto->getIdNutricional();
    $id_produto_componente = $produto->getIdProdutoComponente();
    $nome = $produto->getNome();
    $unidade_medida = $produto->getUnidadeMedida();
    $descricao = $produto->getDescricao();
    $imagem = $produto->getImagem();
    $valor_unitario = $produto->getValorUnitario();
    $qtd_fardo = $produto->getQtdFardo();
    $qtd_estoque = $produto->getQtdEstoque();
    $peso = $produto->getPeso();
    $volume = $produto->getVolume();
    $localizacao = $produto->getLocalizacao();
    $ipi = $produto->getIpi();
    $demanda_mensal = $produto->getDemandaMensal();
    $tempo_ressuprimento = $produto->getTempoRessuprimento();
    $intervalo_ressuprimento = $produto->getIntervaloRessuprimento();
    $estoque_seguranca = $produto->getEstoqueSeguranca();
    $ponto_ressuprimento = $produto->getPontoRessuprimento();
    $lote_compras = $produto->getLoteCompras();
    $estoque_maximo = $produto->getEstoqueMaximo();
    $tipo_produto = $produto->getTipoProduto();
    $valor_energetico = $produto->getValorEnergetico();
    $carboidratos = $produto->getCarboidratos();
    $proteinas = $produto->getProteinas();
    $gordura_totais = $produto->getGorduraTotais();
    $gordura_saturadas = $produto->getGorduraSaturadas();
    $gordura_trans = $produto->getGorduraTrans();
    $fibra_alimentar = $produto->getFibraAlimentar();
    $sodio = $produto->getSodio();
    $status = $produto->getStatus();
    $status_home = $produto->getStatusHome();


    // Query de update
    $sql = "CALL sp_produto_update
    (
      '$id',
      '$id_componente',
      '$id_nutricional',
      '$id_produto_componente',
      '$nome',
      '$unidade_medida',
      '$descricao',
      '$imagem',
      '$valor_unitario',
      '$qtd_fardo',
      '$qtd_estoque',
      '$peso',
      '$volume',
      '$localizacao',
      '$ipi',
      '$demanda_mensal',
      '$tempo_ressuprimento',
      '$intervalo_ressuprimento',
      '$estoque_seguranca',
      '$ponto_ressuprimento',
      '$lote_compras',
      '$estoque_maximo',
      '$tipo_produto',
      '$valor_energetico',
      '$carboidratos',
      '$proteinas',
      '$gordura_totais',
      '$gordura_saturadas',
      '$gordura_trans',
      '$fibra_alimentar',
      '$sodio',
      '$status',
      '$status_home'

    )";

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
    $sql = "SELECT * FROM tbl_produto ORDER BY id_produto DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsProdutos = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do objeto
      $produtos[] = new Produto();

      // Setando os valores do objeto
      $produtos[$cont]->setId($rsProdutos['id_produto']);
      $produtos[$cont]->setNome($rsProdutos['nome']);
      $produtos[$cont]->setUnidadeMedida($rsProdutos['unidade_medida']);
      $produtos[$cont]->setDescricao($rsProdutos['descricao']);
      $produtos[$cont]->setImagem($rsProdutos['imagem']);
      $produtos[$cont]->setValorUnitario($rsProdutos['valor_unitario']);
      $produtos[$cont]->setQtdFardo($rsProdutos['qtd_fardo']);
      $produtos[$cont]->setQtdEstoque($rsProdutos['qtd_estoque']);
      $produtos[$cont]->SetPeso($rsProdutos['peso']);
      $produtos[$cont]->SetVolume($rsProdutos['volume']);
      $produtos[$cont]->setStatus($rsProdutos['status']);
      $produtos[$cont]->setLocalizacao($rsProdutos['localizacao']);
      $produtos[$cont]->setIpi($rsProdutos['ipi']);
      $produtos[$cont]->setDemandaMensal($rsProdutos['demanda_mensal']);
      $produtos[$cont]->setTempoRessuprimento($rsProdutos['tempo_ressuprimento']);
      $produtos[$cont]->setIntervaloRessuprimento($rsProdutos['intervalo_ressuprimento']);
      $produtos[$cont]->setEstoqueSeguranca($rsProdutos['estoque_seguranca']);
      $produtos[$cont]->setPontoRessuprimento($rsProdutos['ponto_ressuprimento']);
      $produtos[$cont]->setLoteCompras($rsProdutos['lote_compras']);
      $produtos[$cont]->setEstoqueMaximo($rsProdutos['estoque_maximo']);
      $produtos[$cont]->setTipoProduto($rsProdutos['tipo_produto']);

      $cont ++;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $produtos;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT produto.*, nutricional.*, componente.id_componente, produto_componente.id_p_componente
            FROM tbl_produto AS produto
            INNER JOIN tbl_nutricional AS nutricional ON nutricional.id_produto = produto.id_produto
            INNER JOIN tbl_produto_componente AS produto_componente ON produto_componente.id_produto = produto.id_produto
            INNER JOIN tbl_componente AS componente ON componente.id_componente = produto_componente.id_componente
            WHERE produto.id_produto = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsProduto = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe do objeto
      $produto = new Produto();

      // Setando os valores do objeto
      $produto->setId($rsProduto['id_produto']);
      $produto->setNome($rsProduto['nome']);
      $produto->setUnidadeMedida($rsProduto['unidade_medida']);
      $produto->setDescricao($rsProduto['descricao']);
      $produto->setImagem($rsProduto['imagem']);
      $produto->setValorUnitario($rsProduto['valor_unitario']);
      $produto->setQtdFardo($rsProduto['qtd_fardo']);
      $produto->setQtdEstoque($rsProduto['qtd_estoque']);
      $produto->SetPeso($rsProduto['peso']);
      $produto->SetVolume($rsProduto['volume']);
      $produto->setStatus($rsProduto['status']);
      $produto->setLocalizacao($rsProduto['localizacao']);
      $produto->setIpi($rsProduto['ipi']);
      $produto->setDemandaMensal($rsProduto['demanda_mensal']);
      $produto->setTempoRessuprimento($rsProduto['tempo_ressuprimento']);
      $produto->setIntervaloRessuprimento($rsProduto['intervalo_ressuprimento']);
      $produto->setEstoqueSeguranca($rsProduto['estoque_seguranca']);
      $produto->setPontoRessuprimento($rsProduto['ponto_ressuprimento']);
      $produto->setLoteCompras($rsProduto['lote_compras']);
      $produto->setEstoqueMaximo($rsProduto['estoque_maximo']);
      $produto->setTipoProduto($rsProduto['tipo_produto']);
      $produto->setIdNutricional($rsProduto['id_nutricional']);
      $produto->setValorEnergetico($rsProduto['valor_energetico']);
      $produto->setCarboidratos($rsProduto['carboidratos']);
      $produto->setProteinas($rsProduto['proteinas']);
      $produto->setGorduraTotais($rsProduto['gordura_totais']);
      $produto->setGorduraSaturadas($rsProduto['gordura_saturadas']);
      $produto->setGorduraTrans($rsProduto['gordura_trans']);
      $produto->setFibraAlimentar($rsProduto['fibra_alimentar']);
      $produto->setSodio($rsProduto['sodio']);
      $produto->setIdComponente($rsProduto['id_componente']);
      $produto->setIdProdutoComponente($rsProduto['id_p_componente']);
      $produto->setStatusHome($rsProduto['status_home']);

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $produto;

  }
}


?>
