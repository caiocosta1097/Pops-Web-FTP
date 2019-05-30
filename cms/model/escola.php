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

class Escola{

  // Atributos da classe
  private $id;
  private $escola;
  private $telefone;
  private $responsavel;
  private $localidade;
  private $cnpj;
  private $motivo;
  private $email;


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

  public function getEscola()
  {

    return $this->escola;

  }

  public function setEscola($escola)
  {

    $this->escola = $escola;

  }

  public function getTelefone()
  {

    return $this->telefone;

  }

  public function setTelefone($telefone)
  {

    $this->telefone = $telefone;

  }

  public function getResponsavel()
  {

    return $this->responsavel;

  }

  public function setResponsavel($responsavel)
  {

    $this->responsavel = $responsavel;

  }

  public function getLocalidade()
  {

    return $this->localidade;

  }

  public function setLocalidade($localidade)
  {

    $this->localidade = $localidade;

  }

  public function getCNPJ()
  {

    return $this->cnpj;

  }

  public function setCNPJ($cnpj)
  {

    $this->cnpj = $cnpj;

  }

  public function getMotivo()
  {

    return $this->motivo;

  }

  public function setMotivo($motivo)
  {

    $this->motivo = $motivo;

  }

  public function getEmail()
  {

    return $this->email;

  }

  public function setEmail($email)
  {

    $this->email = $email;

  }
}

?>
