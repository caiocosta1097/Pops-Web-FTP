<?php
/*
Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 21/04/2019
Data Modificação:
Conteúdo Modificação:
Autor Modificação:
Objetivo da Classe: Classe do Sobre a pops
*/
class Sobre
{
  // Atributos da classe
  private $id;
  private $tituloSobre;
  private $descricao;
  private $status;
  private $imagem;

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

  public function getTituloSobre()
  {
    return $this->tituloSobre;
  }

  public function setTituloSobre($tituloSobre)
  {
    $this->tituloSobre = $tituloSobre;
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

  public function getImagem()
  {
    return $this->imagem;
  }
  
  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }
}
?>
