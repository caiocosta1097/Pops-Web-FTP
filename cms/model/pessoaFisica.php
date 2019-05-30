<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 25/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe da pessoa fisica

*/

class PessoaFisica
{

  // Atributos da classe
  private $id;
  private $nome;
  private $cpf;
  private $imagem;
  private $email;
  private $telefone;
  private $celular;
  private $usuario;
  private $senha;
  private $dtNasc;
  private $status;
  private $logradouro;
  private $bairro;
  private $cidade;
  private $uf;
  private $numero;
  private $cep;


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

  public function getNome()
  {

    return $this->nome;

  }

  public function setNome($nome)
  {

    $this->nome = $nome;

  }

  public function getCpf()
  {

    return $this->cpf;

  }

  public function setCpf($cpf)
  {

    $this->cpf = $cpf;

  }

  public function getImagem()
  {

    return $this->imagem;

  }

  public function setImagem($imagem)
  {

    $this->imagem = $imagem;

  }

  public function getEmail()
  {

    return $this->email;

  }

  public function setEmail($email)
  {

    $this->email = $email;

  }

  public function getTelefone()
  {

    return $this->telefone;

  }

  public function setTelefone($telefone)
  {

    $this->telefone = $telefone;

  }

  public function getCelular()
  {

    return $this->celular;

  }

  public function setCelular($celular)
  {

    $this->celular = $celular;

  }

  public function getUsuario()
  {

    return $this->usuario;

  }

  public function setUsuario($usuario)
  {

    $this->usuario = $usuario;

  }

  public function getSenha()
  {

    return $this->senha;

  }

  public function setSenha($senha)
  {

    $this->senha = $senha;

  }

  public function getDtNasc()
  {

    return $this->dtNasc;

  }

  public function setDtNasc($dtNasc)
  {

    if(strpos($dtNasc, "/")){
      //Tratamento da data para enviar para o banco
      $this->dtNasc = date("Y-m-d", strtotime($dtNasc));
    }else if(strpos($dtNasc, "-")){
        $this->dtNasc = date("d/m/Y", strtotime($dtNasc));
    }
  }


  public function getStatus()
  {

    return $this->status;

  }

  public function setStatus($status)
  {

    $this->status = $status;

  }

  public function getLogradouro()
  {

    return $this->logradouro;

  }

  public function setLogradouro($logradouro)
  {

    $this->logradouro = $logradouro;

  }

  public function getBairro()
  {

    return $this->bairro;

  }

  public function setBairro($bairro)
  {

    $this->bairro = $bairro;

  }

  public function getCidade()
  {

    return $this->cidade;

  }

  public function setCidade($cidade)
  {

    $this->cidade = $cidade;

  }

  public function getUf()
  {

    return $this->uf;

  }

  public function setUf($uf)
  {

    $this->uf = $uf;

  }

  public function getNumero()
  {

    return $this->numero;

  }

  public function setNumero($numero)
  {

    $this->numero = $numero;

  }

  public function getCep()
  {

    return $this->cep;

  }

  public function setCep($cep)
  {

    $this->cep = $cep;

  }

}

?>
