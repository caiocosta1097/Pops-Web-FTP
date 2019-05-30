<?php

    class Promocao{

        private $idPromocao;
        private $titulo;
        private $descricao;
        private $status;
        private $imagem;
        private $precisaCadastro;
        private $statusHome;

        public function getIdPromocao(){
          return $this->idPromocao;
        }
      
        public function setIdPromocao($idPromocao){
          $this->idPromocao = $idPromocao;
        }
      
        public function getTitulo(){
          return $this->titulo;
        }
      
        public function setTitulo($titulo){
          $this->titulo = $titulo;
        }
      
        public function getDescricao(){
          return $this->descricao;
        }
      
        public function setDescricao($descricao){
          $this->descricao = $descricao;
        }
      
        public function getStatus(){
          return $this->status;
        }
      
        public function setStatus($status){
          $this->status = $status;
        }
      
        public function getImagem(){
          return $this->imagem;
        }
      
        public function setImagem($imagem){
          $this->imagem = $imagem;
        }
      
        public function getPrecisaCadastro(){
          return $this->precisaCadastro;
        }
      
        public function setPrecisaCadastro($precisaCadastro){
          $this->precisaCadastro = $precisaCadastro;
        }

        public function getStatusHome(){
          return $this->statusHome;
        }
      
        public function setStatusHome($statusHome){
          $this->statusHome = $statusHome;
        }

        
        
    }


?>