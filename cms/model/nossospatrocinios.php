<?php

    class NossosPatrocinios{

        private $idPatrocinio;
        private $nome;
        private $imagem;
        private $status;

        public function getIdPatrocinio(){
            return $this->idPatrocinio;
          }
        
          public function setIdPatrocinio($idPatrocinio){
            $this->idPatrocinio = $idPatrocinio;
          }
        
          public function getNome(){
            return $this->nome;
          }
        
          public function setNome($nome){
            $this->nome = $nome;
          }
        
          public function getImagem(){
            return $this->imagem;
          }
        
          public function setImagem($imagem){
            $this->imagem = $imagem;
          }
        
          public function getStatus(){
            return $this->status;
          }
        
          public function setStatus($status){
            $this->status = $status;
          }
        
    }


?>