<?php

    class PopsEscolaBusiness{

        private $path_local;
        private $conexao;

        public function __construct()
        {
            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/DAO/conexao.php";

            $this->conexao = new Conexao();
        }

        public function insertPopsEscola($nome, $telefone, $responsavel, $localidade, $cnpj, $motivo, $email)
        {
            $sql = "INSERT INTO tbl_escola(nome, telefone, responsavel, localidade, cnpj, motivo, email)
                    VALUES('$nome', '$telefone', '$responsavel', '$localidade', '$cnpj', '$motivo', '$email') ";

            $con = $this->conexao->connectDatabase();

            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro ao inserir',         
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Escola adicionado com sucesso',
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;

        }

    }

?>