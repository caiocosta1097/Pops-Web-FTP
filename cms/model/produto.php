<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 28/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Produtos

*/

class Produto
{

  // Atributos da classe
  private $id;
  private $nome;
  private $unidade_medida;
  private $descricao;
  private $imagem;
  private $valor_unitario;
  private $qtd_fardo;
  private $qtd_estoque;
  private $peso;
  private $volume;
  private $localizacao;
  private $ipi;
  private $demanda_mensal;
  private $tempo_ressuprimento;
  private $intervalo_ressuprimento;
  private $ponto_ressuprimento;
  private $estoque_seguranca;
  private $estoque_maximo;
  private $lote_compras;
  private $tipo_produto;
  private $id_nutricional;
  private $valor_energetico;
  private $carboidratos;
  private $proteinas;
  private $gordura_totais;
  private $gordura_saturadas;
  private $gordura_trans;
  private $fibra_alimentar;
  private $sodio;
  private $id_componente;
  private $id_produto_componente;
  private $status;
  private $status_home;

  // Métodos getters e setters da classe
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getUnidadeMedida()
  {
    return $this->unidade_medida;
  }

  public function setUnidadeMedida($unidade_medida)
  {
    $this->unidade_medida = $unidade_medida;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function getImagem()
  {
    return $this->imagem;
  }

  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }

  public function getValorUnitario()
  {
    return $this->valor_unitario;
  }

  public function setValorUnitario($valor_unitario)
  {
    $this->valor_unitario = $valor_unitario;
  }

  public function getQtdFardo()
  {
    return $this->qtd_fardo;
  }

  public function setQtdFardo($qtd_fardo)
  {
    $this->qtd_fardo = $qtd_fardo;
  }

  public function getQtdEstoque()
  {
    return $this->qtd_estoque;
  }

  public function setQtdEstoque($qtd_estoque)
  {
    $this->qtd_estoque = $qtd_estoque;
  }

  public function getPeso()
  {
    return $this->peso;
  }

  public function setPeso($peso)
  {
    $this->peso = $peso;
  }

  public function getVolume()
  {
    return $this->volume;
  }

  public function setVolume($volume)
  {
    $this->volume = $volume;
  }

  public function getLocalizacao()
  {
    return $this->localizacao;
  }

  public function setLocalizacao($localizacao)
  {
    $this->localizacao = $localizacao;
  }

  public function getIpi()
  {
    return $this->ipi;
  }

  public function setIpi($ipi)
  {
    $this->ipi = $ipi;
  }

  public function getDemandaMensal()
  {
    return $this->demanda_mensal;
  }

  public function setDemandaMensal($demanda_mensal)
  {
    $this->demanda_mensal = $demanda_mensal;
  }

  public function getTempoRessuprimento()
  {
    return $this->tempo_ressuprimento;
  }

  public function setTempoRessuprimento($tempo_ressuprimento)
  {
    $this->tempo_ressuprimento = $tempo_ressuprimento;
  }

  public function getIntervaloRessuprimento()
  {
    return $this->intervalo_ressuprimento;
  }

  public function setIntervaloRessuprimento($intervalo_ressuprimento)
  {
    $this->intervalo_ressuprimento = $intervalo_ressuprimento;
  }

  public function getPontoRessuprimento()
  {
    return $this->ponto_ressuprimento;
  }

  public function setPontoRessuprimento($ponto_ressuprimento)
  {
    $this->ponto_ressuprimento = $ponto_ressuprimento;
  }

  public function getEstoqueSeguranca()
  {
    return $this->estoque_seguranca;
  }

  public function setEstoqueSeguranca($estoque_seguranca)
  {
    $this->estoque_seguranca = $estoque_seguranca;
  }

  public function getEstoqueMaximo()
  {
    return $this->estoque_maximo;
  }

  public function setEstoqueMaximo($estoque_maximo)
  {
    $this->estoque_maximo = $estoque_maximo;
  }

  public function getLoteCompras()
  {
    return $this->lote_compras;
  }

  public function setLoteCompras($lote_compras)
  {
    $this->lote_compras = $lote_compras;
  }

  public function getTipoProduto()
  {
    return $this->tipo_produto;
  }

  public function setTipoProduto($tipo_produto)
  {
    $this->tipo_produto = $tipo_produto;
  }

  public function getIdNutricional()
  {
    return $this->id_nutricional;
  }

  public function setIdNutricional($id_nutricional)
  {
    $this->id_nutricional = $id_nutricional;
  }

  public function getValorEnergetico()
  {
    return $this->valor_energetico;
  }

  public function setValorEnergetico($valor_energetico)
  {
    $this->valor_energetico = $valor_energetico;
  }

  public function getCarboidratos()
  {
    return $this->carboidratos;
  }

  public function setCarboidratos($carboidratos)
  {
    $this->carboidratos = $carboidratos;
  }

  public function getProteinas()
  {
    return $this->proteinas;
  }

  public function setProteinas($proteinas)
  {
    $this->proteinas = $proteinas;
  }

  public function getGorduraTotais()
  {
    return $this->gordura_totais;
  }

  public function setGorduraTotais($gordura_totais)
  {
    $this->gordura_totais = $gordura_totais;
  }

  public function getGorduraSaturadas()
  {
    return $this->gordura_saturadas;
  }

  public function setGorduraSaturadas($gordura_saturadas)
  {
    $this->gordura_saturadas = $gordura_saturadas;
  }

  public function getGorduraTrans()
  {
    return $this->gordura_trans;
  }

  public function setGorduraTrans($gordura_trans)
  {
    $this->gordura_trans = $gordura_trans;
  }

  public function getFibraAlimentar()
  {
    return $this->fibra_alimentar;
  }

  public function setFibraAlimentar($fibra_alimentar)
  {
    $this->fibra_alimentar = $fibra_alimentar;
  }

  public function getSodio()
  {
    return $this->sodio;
  }

  public function setSodio($sodio)
  {
    $this->sodio = $sodio;
  }

  public function getIdComponente()
  {
    return $this->id_componente;
  }

  public function setIdComponente($id_componente)
  {
    $this->id_componente = $id_componente;
  }

  public function getIdProdutoComponente()
  {
      return $this->id_produto_componente;
  }

  public function setIdProdutoComponente($id_produto_componente)
  {
      $this->id_produto_componente = $id_produto_componente;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatusHome()
  {
    return $this->status_home;
  }

  public function setStatusHome($status_home)
  {
    $this->status_home = $status_home;
  }

}

?>
