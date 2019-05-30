<?php
/*
    Essa classe modela os campos da table elementos visuais...
*/ 
class ElementoVisual
{
    //Atributos(Estado)
    private $id_e_visual;
    private $nome_elemento;
    

    //comportamento da classe
    public function getIdElementoVisual(){
		return $this->id_e_visual;
	}

	public function setIdElementoVisual($idElementoVisual){
		$this->id_e_visual = $idElementoVisual;
	}

	public function getNomeElemento(){
		return $this->nome_elemento;
	}

	public function setNomeElemento($nomeElemento){
		$this->nome_elemento = $nomeElemento;
	}
}
?>