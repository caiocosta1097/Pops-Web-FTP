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

class Enquete
{

  // Atributos da classe
  private $id;
  private $titulo;
  private $data;
  private $status;
  private $resposta;
  private $id_opcao;

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

  public function getTitulo()
  {

    return $this->titulo;

  }

  public function setTitulo($titulo)
  {

    $this->titulo = $titulo;

  }

  public function getData()
  {

    return $this->data;

  }

  public function setData($data){
    if(strpos($data, "/")){
      $data = date("Y-m-d", strtotime(str_replace("/", "-", $data)));
    }elseif(strpos($data, "-")){
      $data = date("d/m/Y", strtotime(str_replace("-", "/", $data)));
    }

    $this->data = $data;

  }

  public function getStatus()
  {

    return $this->status;

  }

  public function setStatus($status)
  {

    $this->status = $status;

  }

  public function getResposta()
  {

    return $this->resposta;

  }

  public function setResposta($resposta)
  {

    $this->resposta = $resposta;

  }

  public function getId_opcao()
  {

    return $this->id_opcao;

  }

  public function setId_opcao($id_opcao)
  {

    $this->id_opcao = $id_opcao;

  }

}

?>
