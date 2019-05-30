<?php
/*
    Essa classe modela os campos da table cores...
*/ 
class Cor
{
    //Atributos(Estado)
    private $id_cores;
    private $cod_hexadec;
		private $status;
		private $idElementoVisual;
		private $nomeElementoVisual;

    //comportamento da classe
    public function getIdCores(){
		return $this->id_cores;
	}

	public function setIdCores($id_cores){
		$this->id_cores = $id_cores;
	}

	public function getCodHexadec(){
		return $this->cod_hexadec;
	}

	public function setCodHexadec($cod_hexadec){
		$this->cod_hexadec = $cod_hexadec;
	}

	public function getStatus(){
		return $this->status;
    }
    
    public function setStatus($status){
		$this->status = $status;
	}

	public function getElementoVisual(){
		return $this->idElementoVisual;
    }
    
    public function setElementoVisual($idElementoVisual){
		$this->idElementoVisual = $idElementoVisual;
	}
	
	public function getNomeElementoVisual(){
		return $this->nomeElementoVisual;
    }
    
    public function setNomeElementoVisual($nomeElementoVisual){
		$this->nomeElementoVisual = $nomeElementoVisual;
	}
    
}
?>