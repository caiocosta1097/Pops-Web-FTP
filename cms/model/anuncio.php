<?php
  class Anuncio{
    // Atributos da classe
    private $id;
    private $idUser;
    private $estabelecimento;
    private $anuncio_descricao;
    private $imagem;
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
    public function getIdUser()
    {

      return $this->idUser;

    }

    public function setIdUser($idUser)
    {

      $this->idUser = $idUser;

    }

    public function getEstabelecimento()
    {

      return $this->estabelecimento;

    }

    public function setEstabelecimento($estabelecimento){

      $this->estabelecimento = $estabelecimento;

    }


    public function getImagem()
    {

      return $this->imagem;

    }

    public function setImagem($imagem){

      $this->imagem = $imagem;

    }


    public function getAnuncio()
    {

      return $this->anuncio_descricao;

    }

    public function setAnuncio($anuncio_descricao){

      $this->anuncio_descricao = $anuncio_descricao;

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
