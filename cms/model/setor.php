<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 24/03/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Setores

*/

class Setor
{

  // Atributos da classe
  private $id;
  private $setor;
  private $status;

  // Métodos getters e setters da classe
  public function getId()
  {

    return $this->id;

  }

  public function setId($id)
  {

    $this->id = $id;

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
