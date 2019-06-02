<?php
    class CompraBusiness {
        private $path_local;
        private $conexao;

        public function __construct()
        {
            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/DAO/conexao.php";

            $this->conexao = new Conexao();
        }

        public function addNewCompra(
            $cnpj, $valor_total, $peso_total, $volume_total, $status, $status_pedido, $logradouro
            , $bairro, $cidade, $uf, $dt_compra){

            $sql = "
            INSERT INTO tbl_compra_produto
            (
            `cnpj`,
            `valor_total`,
            `peso_total`,
            `volume_total`,
            `status`,
            `status_pedido`,
            `logradouro`,
            `bairro`,
            `cidade`,
            `uf`,
            `dt_compra`)
            VALUES
            (
            '$cnpj',
            '$valor_total',
            '$peso_total',
            '$volume_total',
             $status,
            '$status_pedido',
            '$logradouro',
            '$bairro',
            '$cidade',
            '$uf',
            '$dt_compra')";
            
            //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro ao realizar compra',  
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Compra realizada com sucesso',
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;
        }


        public function getCompras($cnpj){
            $sql = "SELECT * FROM tbl_compra_produto WHERE cnpj=$cnpj";

            //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                echo 'Erro no script de insert';

            $select = $con->query($sql);
            
            $cont = 0;
            while($rsCompra = $select->fetch(PDO::FETCH_ASSOC)){
            
                //criando vetor e atribuindo resultados no banco dentro dele
                $result[$cont] = array(
                        'success' => true,
                        'id_pedido' => $rsCompra['id_c_produto'],
                        'dt_compra' => $rsCompra['dt_compra'],
                        'valor_total' => $rsCompra['valor_total'],
                        'status_pedido' => $rsCompra['status_pedido']);
                $cont+=1;
            }

            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
        
            //retorna o objeto
            return $result;
        }
    }

?>