<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 22/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Componentes

*/

class Componente
{

  // Atributos da classe
  private $id;
  private $nome;
  private $tipo;
  private $qtd;
  private $valor_unitario;
  private $localizacao;
  private $descricao;
  private $ipi;
  private $demanda_mensal;
  private $tempo_ressuprimento;
  private $intervalo_ressuprimento;
  private $estoque_seguranca;
  private $ponto_ressuprimento;
  private $lote_compras;
  private $estoque_maximo;
  private $status;

  // Métodos Getters e Setters da classe
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

  public function getTipo()
  {
    return $this->tipo;
  }

  public function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }

  public function getQtd()
  {
    return $this->qtd;
  }

  public function setQtd($qtd)
  {
    $this->qtd = $qtd;
  }

  public function getValorUnitario()
  {
    return $this->valor_unitario;
  }

  public function setValorUnitario($valor_unitario)
  {
    $this->valor_unitario = $valor_unitario;
  }

  public function getLocalizacao()
  {
    return $this->localizacao;
  }

  public function setLocalizacao($localizacao)
  {
    $this->localizacao = $localizacao;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
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

  public function getEstoqueSeguranca()
  {
    return $this->estoque_seguranca;
  }

  public function setEstoqueSeguranca($estoque_seguranca)
  {
    $this->estoque_seguranca = $estoque_seguranca;
  }

  public function getPontoRessuprimento()
  {
    return $this->ponto_ressuprimento;
  }

  public function setPontoRessuprimento($ponto_ressuprimento)
  {
    $this->ponto_ressuprimento = $ponto_ressuprimento;
  }

  public function getLoteCompras()
  {
    return $this->lote_compras;
  }

  public function setLoteCompras($lote_compras)
  {
    $this->lote_compras = $lote_compras;
  }

  public function getEstoqueMaximo()
  {
    return $this->estoque_maximo;
  }

  public function setEstoqueMaximo($estoque_maximo)
  {
    $this->estoque_maximo = $estoque_maximo;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

}

?>
