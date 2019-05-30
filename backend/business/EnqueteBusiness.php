<?php

class EnqueteBusiness {


    // Atributo que será instânciado
    private $conexao;
    
    //construtor
    public function __construct()
    {
        // Variável que recebe a variável de sessão
        $path_local = $_SESSION['path_local'];
    
        // Importanto a classe de conexão com BD
        require_once "$path_local/cms/model/DAO/conexao.php";
        
        // Instânciando a classe de Conexão
        $this->conexao = new Conexao();    
    }

    public function answer($idResposta, $idEnquete){
        $sql = "INSERT INTO `db_popsoda`.`tbl_resposta_enquete`
        (
        `id_enquete`,
        `id_opcoes`)
        VALUES
        (
        $idEnquete,
        $idResposta)";

        $msg="";
        // Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
    
        // Executa o script no BD
        if (!$con->query($sql))
            $msg="Não foi possível inserir um novo registro";
        
        $msg="Ok, respondido!";
        // Fechando a conexão com BD
        $this->conexao->closeDatabase();
    
        return $msg;
      }
}

?>