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

  class Comentario
  {

    // Atributos da classe
    private $id;
    private $idUser;
    private $user;
    private $comentario_user;
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

    public function getUser()
    {

      return $this->user;

    }

    public function setUser($user)
    {

      $this->user = $user;

    }

    public function getIdUser()
    {

      return $this->idUser;

    }

    public function setIdUser($idUser)
    {

      $this->idUser = $idUser;

    }

    public function getComentario()
    {

      return $this->comentario_user;

    }

    public function setComentario($comentario_user){

      $this->comentario_user = $comentario_user;

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
