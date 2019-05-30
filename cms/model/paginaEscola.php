<?php
  class paginaEscola{
    private $id;
    private $descricao;
    private $imagem1;
      private $imagem2;
        private $imagem3;
          private $imagem4;



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
    public function getDescricao()
    {

      return $this->descricao;

    }

    public function setDescricao($descricao)
    {

      $this->descricao = $descricao;

    }

    // Métodos getters e setters da classe
    public function getImagem1()
    {

      return $this->imagem1;

    }

    public function setImagem1($imagem1){
        $this->imagem1 = $imagem1;
    }

    // Métodos getters e setters da classe
    public function getImagem2()
    {

      return $this->imagem2;

    }

    public function setImagem2($imagem2){
        $this->imagem2 = $imagem2;
    }

    // Métodos getters e setters da classe
    public function getImagem3()
    {

      return $this->imagem3;

    }

    public function setImagem3($imagem3){
        $this->imagem3 = $imagem3;
    }

    // Métodos getters e setters da classe
    public function getImagem4()
    {

      return $this->imagem4;

    }

    public function setImagem4($imagem4){
        $this->imagem4 = $imagem4;
    }
  }

 ?>
