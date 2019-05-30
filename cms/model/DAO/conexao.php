<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 24/03/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Criar conexão com o BD MySQL

*/

class Conexao
{

  // Atributos da classe
  private $server;
  private $user;
  private $password;
  private $database;

  // Construtor da classe
  function __construct(){

    $this->server = 'db_popsoda.mysql.dbaas.com.br';
    $this->user = 'db_popsoda';
    $this->password = 'techevo';
    $this->database = 'db_popsoda';


    //    $this->server = 'localhost';
    //    $this->user = 'root';
    //    $this->password = 'bcd127';
    //    $this->database = 'db_popsoda';

  }

  // Abre conexão com BD
  public function connectDatabase()
  {

    // Tenta abrir a conexão
    try {

      $conexao = new PDO('mysql:host='.$this->server.'; dbname='.$this->database, $this->user, $this->password);

      return $conexao;

      // Exibe um erro caso a conexão falhar
    } catch (PDOExeption $erro) {

      echo 'Erro ao tentar a conexão com o BD! <br> Linha: '.$erro->getLine().'<br> Mensagem: '.$erro->getMessage();

    }

  }

  // Fecha a conexão
  public function closeDatabase()
  {

    $conexao = null;

    unset($conexao);

  }

}

?>
