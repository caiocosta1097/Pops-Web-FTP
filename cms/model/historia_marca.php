<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 14/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Historia da marca

*/

  class HistoriaMarca
  {

    // Atributos da classe
    private $id;
    private $texto;
    private $dt_versao;
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

    public function getTexto()
    {

      return $this->texto;

    }

    public function setTexto($texto)
    {

      $this->texto = $texto;

    }

    public function getDtVersao()
    {

      return $this->dt_versao;

    }

    public function setDtVersao($dt_versao)
    {
      if(strpos($dt_versao, "/")){
        $dt_versao = date("Y-m-d", strtotime(str_replace("/", "-", $dt_versao)));
      }elseif(strpos($dt_versao, "-")){
        $dt_versao = date("d/m/Y", strtotime(str_replace("-", "/", $dt_versao)));
      }

      $this->dt_versao = $dt_versao;

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
