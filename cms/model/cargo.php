<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 25/03/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Cargos

*/

class Cargo
{

  // Atributos da classe
  private $id;
  private $cargo;
  private $idSetor;
  private $setor;
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

  public function getCargo()
  {

    return $this->cargo;

  }

  public function setCargo($cargo)
  {

    $this->cargo = $cargo;

  }

  public function getIdSetor()
  {

    return $this->idSetor;

  }

  public function setIdSetor($idSetor)
  {

    $this->idSetor = $idSetor;

  }

  public function getSetor()
  {

    return $this->setor;

  }

  public function setSetor($setor)
  {

    $this->setor = $setor;

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
