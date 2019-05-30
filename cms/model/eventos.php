<?php

/*

Projeto: Pop'Soda Drink
Autor: Murilo
Data Criação: 09/03/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Classe de Setores

*/

// Classe eventos que contém os campos do banco
class Eventos{

  //Atributos da classe Eventos
  private $idEventos;
  private $titulo;
  private $descricao;
  private $localidade;
  private $dataEvento;
  private $status;

  //Métodos getters e setters da classe Eventos
  public function getIdEventos(){
				return $this->idEventos;
	}

	public function setIdEventos($idEventos){
			$this->idEventos = $idEventos;
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

	public function getLocalidade(){
			return $this->localidade;
	}

	public function setLocalidade($localidade){
			$this->localidade = $localidade;
	}

  public function getDataEvento()
  {

    return $this->dataEvento;

  }

  public function setDataEvento($dataEvento){
    if(strpos($dataEvento, "/")){
      $dataEvento = date("Y-m-d", strtotime(str_replace("/", "-", $dataEvento)));
    }elseif(strpos($dataEvento, "-")){
      $dataEvento = date("d/m/Y", strtotime(str_replace("-", "/", $dataEvento)));
    }

    $this->dataEvento = $dataEvento;

  }

	public function getStatus(){
			return $this->status;
	}

	public function setStatus($status){
			$this->status = $status;
	}

}





?>
