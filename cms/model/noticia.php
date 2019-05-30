<?php

    class Noticia{

        private $idNoticia;
        private $titulo;
        private $imagem;
        private $dataNoticia;
        private $descricao;
        private $status;
        private $status_home;


        public function getIdNoticia(){
            return $this->idNoticia;
          }

          public function setIdNoticia($idNoticia){
            $this->idNoticia = $idNoticia;
          }

          public function getTitulo(){
            return $this->titulo;
          }

          public function setTitulo($titulo){
            $this->titulo = $titulo;
          }

          public function getImagem(){
            return $this->imagem;
          }

          public function setImagem($imagem){
            $this->imagem = $imagem;
          }

          public function getDataNoticia(){
            return $this->dataNoticia;
          }

          public function setDataNoticia($dataNoticia){

            if(strpos($dataNoticia, "/")){
              $dataNoticia = date("Y-m-d", strtotime(str_replace("/", "-", $dataNoticia)));
            }elseif(strpos($dataNoticia, "-")){
              $dataNoticia = date("d/m/Y", strtotime(str_replace("-", "/", $dataNoticia)));
            }

              $this->dataNoticia = $dataNoticia;

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

          public function getStatusHome(){
            return $this->status_home;
          }

          public function setStatusHome($status_home){
            $this->status_home = $status_home;
          }

    }

?>
