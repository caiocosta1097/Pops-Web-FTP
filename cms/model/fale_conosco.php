<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 11/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe do Fale Conosco

*/

class FaleConosco
{

  // Atributos da classe
  private $id;
  private $nome;
  private $email;
  private $telefone;
  private $tipo;
  private $descricao;
  private $celular;

  function __construct()
  {
    // code...
  }

  // Métodos getters e setters da classe
  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getTelefone(){
    return $this->telefone;
  }

  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }

  public function getTipo(){
    return $this->tipo;
  }

  public function setTipo($tipo){
    $this->tipo = $tipo;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function getCelular(){
    return $this->celular;
  }

  public function setCelular($celular){
    $this->celular = $celular;
  }
}

?>
