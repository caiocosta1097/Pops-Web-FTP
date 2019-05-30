<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 26/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe dos Níveis do Perfil

 */

class NivelPerfil
{

  // Atributos da classe
  private $id;
  private $perfil;
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

  public function getPerfil()
  {
    return $this->perfil;
  }
  
  public function setPerfil($perfil)
  {
    $this->perfil = $perfil;
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