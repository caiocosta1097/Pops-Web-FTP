<?php

    class Funcionario{

      private $matricula;
      private $nome;
      private $email;
      private $telefone;
      private $celular;
      private $dataAdmissao;
      private $usuario;
      private $senha;
      private $status;
      private $dataNascimento;
      private $idPerfil;
      private $perfil;
      private $idCargo;
      private $cargo;


      public function getMatricula(){
        return $this->matricula;
      }

      public function setMatricula($matricula){
        $this->matricula = $matricula;
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

      public function getCelular(){
        return $this->celular;
      }

      public function setCelular($celular){
        $this->celular = $celular;
      }

      public function getDataAdmissao(){
        return $this->dataAdmissao;
      }

      public function setDataAdmissao($dataAdmissao){
        if(strpos($dataAdmissao, "/")){
          $dataAdmissao = date("Y-m-d", strtotime(str_replace("/", "-", $dataAdmissao)));
        }elseif (strpos($dataAdmissao, "-")) {
          $dataAdmissao = date("d/m/Y", strtotime(str_replace("-", "/", $dataAdmissao)));
        }

        $this ->dataAdmissao = $dataAdmissao;
      }

      public function getUsuario(){
        return $this->usuario;
      }

      public function setUsuario($usuario){
        $this->usuario = $usuario;
      }

      public function getSenha(){
        return $this->senha;
      }

      public function setSenha($senha){
        $this->senha = $senha;
      }

      public function getStatus(){
        return $this->status;
      }

      public function setStatus($status){
        $this->status = $status;
      }

      public function getDataNascimento(){
        return $this->dataNascimento;
      }

      public function setDataNascimento($dataNascimento){
        if(strpos($dataNascimento, "/")){
          $dataNascimento = date("Y-m-d", strtotime(str_replace("/", "-", $dataNascimento)));
        }elseif (strpos($dataNascimento, "-")) {
          $dataNascimento = date("d/m/Y", strtotime(str_replace("-", "/", $dataNascimento)));
        }

        $this ->dataNascimento = $dataNascimento;
      }


      public function getIdCargo(){
        return $this->idCargo;
      }

      public function setIdCargo($idCargo){
        $this->idCargo = $idCargo;
      }

      public function getCargo(){
        return $this->cargo;
      }

      public function setCargo($cargo){
        $this->cargo = $cargo;
      }

      public function getIdPerfil(){
        return $this->idPerfil;
      }

      public function setIdPerfil($idPerfil){
        $this->perfil = $idPerfil;
      }

      public function getPerfil(){
        return $this->perfil;
      }

      public function setPerfil($perfil){
        $this->perfil = $perfil;
      }



    }

?>
