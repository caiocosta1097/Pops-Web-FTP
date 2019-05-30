<?php
class Video
{

  // Atributos da classe
  private $id;
  private $titulo;
  private $arquivo;
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

  // Métodos getters e setters da classe
  public function getTitulo()
  {

    return $this->titulo;

  }

  public function setTitulo($titulo)
  {

    $this->titulo = $titulo;

  }

  // Métodos getters e setters da classe
  public function getArquivo()
  {

    return $this->arquivo;

  }

  public function setArquivo($arquivo)
  {

    $this->arquivo = $arquivo;

  }

  // Métodos getters e setters da classe
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
