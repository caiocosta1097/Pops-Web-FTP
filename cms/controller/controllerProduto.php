<?php
/*
  Projeto: Pop'Soda Drink
  Autor: Caio
  Data Criação: 29/04/2019
  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:
  Objetivo da Classe: Controller de Produto
 */
class ControllerProduto
{
  // Iniciando a variável em null para não haver erro
  private $path_local;
  // Atributo que será instânciado
  private $produtoDAO;
  function __construct()
  {
    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];
    // Importando a classe do objeto
    require_once "$path_local/cms/model/produto.php";
    // Importando a classe objeto
    require_once "$path_local/cms/model/DAO/produtoDAO.php";
    // Importando o arquivo de upload
    require_once "$path_local/cms/upload.php";
    // Instânciando a classe DAO objeto
    $this->produtoDAO = new ProdutoDAO();
  }
  public function inserirRegistro()
  {
    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Instânciando a classe objeto
      $produto = new Produto();
      // Guardando os dodos no objeto
      $produto->setNome($_POST['txt_produto']);
      $produto->setUnidadeMedida($_POST['txt_unidade_medida']);
      $produto->setDescricao($_POST['txt_descricao']);
      $produto->setImagem(upload($_FILES['file_img']));
      $produto->setValorUnitario($_POST['txt_valor']);
      $produto->setQtdFardo($_POST['txt_qtd_fardo']);
      $produto->setQtdEstoque($_POST['txt_qtd_estoque']);
      $produto->setPeso($_POST['txt_peso']);
      $produto->setVolume($_POST['txt_volume']);
      $produto->setLocalizacao($_POST['txt_localizacao']);
      $produto->setIpi($_POST['txt_ipi']);
      $produto->setDemandaMensal($_POST['txt_demanda_mensal']);
      $produto->setTempoRessuprimento($_POST['txt_tempo_ressuprimento']);
      $produto->setIntervaloRessuprimento($_POST['txt_intervalo_ressuprimento']);
      $produto->setEstoqueSeguranca($_POST['txt_estoque_seguranca']);
      $produto->setPontoRessuprimento($_POST['txt_ponto_ressuprimento']);
      $produto->setLoteCompras($_POST['txt_lote_compras']);
      $produto->setEstoqueMaximo($_POST['txt_estoque_maximo']);
      $produto->setTipoProduto($_POST['select_tipo']);
      $produto->setValorEnergetico($_POST['txt_valor_energetico']);
      $produto->setCarboidratos($_POST['txt_carboidratos']);
      $produto->setProteinas($_POST['txt_proteina']);
      $produto->setGorduraTotais($_POST['txt_gordura_totais']);
      $produto->setGorduraSaturadas($_POST['txt_gordura_saturada']);
      $produto->setGorduraTrans($_POST['txt_gordura_trans']);
      $produto->setFibraAlimentar($_POST['txt_fibra_alimentar']);
      $produto->setSodio($_POST['txt_sodio']);
      $produto->setIdComponente($_POST['select_materia_prima']);
      $produto->setStatus($_POST['select_status']);
      $produto->setStatusHome($_POST['select_status_home']);
      // Insere o registro no BD
      $this->produtoDAO->insert($produto);
    }
  }
  public function excluirRegistro()
  {
    // Recupera o valor do id via GET
    $id = $_GET['id'];
    // Deleta o registro do BD
    $this->produtoDAO->delete($id);
  }
  public function atualizarRegistro()
  {
    // Recupera o valor do id via GET
    $id = $_GET['id'];
    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Instânciando a classe objeto
      $produto = new Produto();
      $id_nutricional = $_SESSION['id_nutricional'];
      $id_produto_componente = $_SESSION['id_produto_componente'];
      $imagemBanco = $_SESSION['imagem'];
      $imagem = upload($_FILES['file_img']);
      if ($imagem == "")
        $imagem = $imagemBanco;
      // Guardando os dodos no objeto
      $produto->setId($id);
      $produto->setIdComponente($_POST['select_materia_prima']);
      $produto->setIdNutricional($id_nutricional);
      $produto->setIdProdutoComponente($id_produto_componente);
      $produto->setNome($_POST['txt_produto']);
      $produto->setUnidadeMedida($_POST['txt_unidade_medida']);
      $produto->setDescricao($_POST['txt_descricao']);
      $produto->setImagem($imagem);
      $produto->setValorUnitario($_POST['txt_valor']);
      $produto->setQtdFardo($_POST['txt_qtd_fardo']);
      $produto->setQtdEstoque($_POST['txt_qtd_estoque']);
      $produto->setPeso($_POST['txt_peso']);
      $produto->setVolume($_POST['txt_volume']);
      $produto->setLocalizacao($_POST['txt_localizacao']);
      $produto->setIpi($_POST['txt_ipi']);
      $produto->setDemandaMensal($_POST['txt_demanda_mensal']);
      $produto->setTempoRessuprimento($_POST['txt_tempo_ressuprimento']);
      $produto->setIntervaloRessuprimento($_POST['txt_intervalo_ressuprimento']);
      $produto->setEstoqueSeguranca($_POST['txt_estoque_seguranca']);
      $produto->setPontoRessuprimento($_POST['txt_ponto_ressuprimento']);
      $produto->setLoteCompras($_POST['txt_lote_compras']);
      $produto->setEstoqueMaximo($_POST['txt_estoque_maximo']);
      $produto->setTipoProduto($_POST['select_tipo']);
      $produto->setValorEnergetico($_POST['txt_valor_energetico']);
      $produto->setCarboidratos($_POST['txt_carboidratos']);
      $produto->setProteinas($_POST['txt_proteina']);
      $produto->setGorduraTotais($_POST['txt_gordura_totais']);
      $produto->setGorduraSaturadas($_POST['txt_gordura_saturada']);
      $produto->setGorduraTrans($_POST['txt_gordura_trans']);
      $produto->setFibraAlimentar($_POST['txt_fibra_alimentar']);
      $produto->setSodio($_POST['txt_sodio']);
      $produto->setStatus($_POST['select_status']);
      $produto->setStatusHome($_POST['select_status_home']);
      // Atualiza o registro no BD
      $this->produtoDAO->update($produto, $id);
    }
  }
  public function listarRegistros()
  {
    // Retorna todos os registros
    return $this->produtoDAO->selectAll();
  }
  public function buscarRegistro()
  {
    // Recupera o valor do id via GET
    $id = $_GET['id'];
    // Retorna o registro através do id
    return $this->produtoDAO->selectById($id);
  }

  public function adicionarFardo($acao, $id){
    //verifica se o item já existe no carrinho
    if(array_key_exists($id, $_SESSION['carrinhoPJ'])){

      if($acao == 'mais'){
        echo $id;
        $_SESSION['carrinhoPJ'][$id]['quantidade'] += 1;
      } else if ($acao == 'menos'){
        $_SESSION['carrinhoPJ'][$id]['quantidade'] -= 1;
      }

      //se existe, retorna a mensagem
      $quantidade = $_SESSION['carrinhoPJ'][$id]['quantidade'];
      $listaBebida = $this->produtoDAO->selectById($id);
    } else {
      $produtoDAO - new ProdutoDAO();

      $listaBebida = $this->produtoDAO->selectById($id);
      $_SESSION['carrinhoPJ'][$id]['quantidade'] = 1;
      $quantidade = $_SESSION['carrinhoPJ'][$id]['quantidade'];
    }
      $subtotal = ($listaBebida->getValorUnitario() * $listaBebida->getQtdFardo()) * $_SESSION['carrinhoPJ'][$id]['quantidade'];
    	$_SESSION['carrinhoPJ'][$id] = array('id'=>$listaBebida->getId(), 'nome'=>$listaBebida->getNome(), 'qtd_fado'=>$listaBebida->getQtdFardo(), 'unidade_medida'=>$listaBebida->getUnidadeMedida(), 'valorUnitario'=>$listaBebida->getValorUnitario(), 'quantidade'=>$quantidade, 'subtotal'=>$subtotal, 'imagem'=>$listaBebida->getImagem());


      if($acao == 'mais'){
        $_SESSION['totalCarrinhoPJ'] += $listaBebida->getValorUnitario() * $listaBebida->getQtdFardo();
      } else if ($acao == 'menos') {
        $_SESSION['totalCarrinhoPJ'] -=  $listaBebida->getValorUnitario() * $listaBebida->getQtdFardo();
      }


      $total = count($_SESSION['carrinhoPJ']);

      return '$total';
  }
}
 ?>
