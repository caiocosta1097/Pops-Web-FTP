<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 14/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe do Planeta Sustevável

*/

class Sustentavel
{

  // Atributos da classe
  private $id;
  private $imagem;
  private $descricao;
  private $status;

  function __construct()
  {
    // code...
  }

  // Métodos getters e setters da classe
  public function getId()
  {

    return $this->id;

  }

  public function setId($id)
  {

    $this->id = $id;

  }

  public function getImagem()
  {

    return $this->imagem;

  }

  public function setImagem($imagem)
  {

    $this->imagem = $imagem;

  }

  public function getDescricao()
  {

    return $this->descricao;

  }

  public function setDescricao($descricao)
  {

    $this->descricao = $descricao;

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
