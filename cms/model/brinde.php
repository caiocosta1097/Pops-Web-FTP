<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 25/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Brindes

*/

class Brinde
{

  // Atributos da classe
  private $id;
  private $nome;
  private $valor_unitario;
  private $descricao;
  private $peso;
  private $volume;
  private $imagem;
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

  public function getValorUnitario()
  {
    return $this->valor_unitario;
  }

  public function setValorUnitario($valor_unitario)
  {
    $this->valor_unitario = $valor_unitario;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
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

  public function getImagem()
  {
    return $this->imagem;
  }

  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
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
