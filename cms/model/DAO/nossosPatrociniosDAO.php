<?php


    class NossosPatrociniosDAO{

        private $path_local;
        private $conexao;


        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/DAO/conexao.php";

            $this->conexao = new Conexao();

        }

        //método para inserir um patrocinio
        public function insertPatrocinio(NossosPatrocinios $patrocinios){

            //sql para inserir no banco
            $insertSql = "INSERT INTO
                            tbl_patrocinio (logo, nome, status)
                         VALUES
                            ('".$patrocinios->getImagem()."','".$patrocinios->getNome()."', '".$patrocinios->getStatus()."')";

            $conn = $this->conexao->connectDatabase();

            //enviando pro banco
            if(!$conn->query($insertSql)){
                echo "Erro no script de insert";
            }

            //fechando  a conexão
            $this->conexao->closeDatabase();
        }

        //Método para deletar um patrocinio
        public function deletePatrocinio($idPatrocinio){

            //sql para deletar do banco
            $deleteSql = "DELETE FROM tbl_patrocinio WHERE id_patrocinio=".$idPatrocinio;

            $conn = $this->conexao->connectDatabase();

            //enviando pro banco;
            if(!$conn->query($deleteSql)){
                echo "Erro no script";

            }

            //fechando a conexao
            $this->conexao->closeDatabase();
        }

        //Método para atualizar um patrocinio
        public function updatePatrocinio(NossosPatrocinios $patrocinios, $idPatrocinios){

            
            if($patrocinios->getImagem() == null){
                //script para atualizar um patrocinio
                $updateSql = "UPDATE tbl_patrocinio
                            SET nome = '".$patrocinios->getNome()."',
                            SET status = '".$patrocinios->getStatus()."'
                            WHERE id_patrocinio=".$idPatrocinios;

                $conn = $this->conexao->connectDatabase();

                //Envia o script para o banco
                if(!$conn->query($updateSql)){

                    echo "Erro no script de update";
                }

                //fechando a conexao
                $this->conexao->closeDatabase();
            }else{

                //script para atualizar um patrocinio
                $updateSql = "UPDATE tbl_patrocinio
                            SET logo = '".$patrocinios->getImagem()."',
                                nome = '".$patrocinios->getNome()."',
                                status = '".$patrocinios->getStatus()."'  
                                     
                            WHERE id_patrocinio=".$idPatrocinios;

                $conn = $this->conexao->connectDatabase();

                //Envia o script para o banco
                if(!$conn->query($updateSql)){

                    echo "Erro no script de update";
                }

                //fechando a conexao
                $this->conexao->closeDatabase();
            }        
        }

        //Método para listar os patrocinios
        public function selectAllPatrocinios(){

            $selectAllSql = "SELECT * FROM tbl_patrocinio ORDER BY id_patrocinio DESC";

            //Método que faz a conexão com o banco
            $conn = $this->conexao->connectDatabase();

            //executando o select
            $select = $conn->query($selectAllSql);

            //Contador iniciando em 0
            $cont = 0;

            while($rsPatrocinios = $select->fetch(PDO::FETCH_ASSOC)){

                //criando um obj para listar todos os patrocinios
                $patrocinios[] = new NossosPatrocinios;
                
                //Setando os valores
                $patrocinios[$cont]->setIdPatrocinio($rsPatrocinios['id_patrocinio']);
                $patrocinios[$cont]->setImagem($rsPatrocinios['logo']);
                $patrocinios[$cont]->setNome($rsPatrocinios['nome']);
                $patrocinios[$cont]->setStatus($rsPatrocinios)['status'];

                $cont += 1;
            }

            $this->conexao->closeDatabase();

            return $patrocinios;
        }

        //buscar um patrocinio por id
        public function selectByIdPatrocinio($idPatrocinio){

            $selectAllPatrocinio = "SELECT * FROM  tbl_patrocinio WHERE id_patrocinio=".$idPatrocinio;
            $conn = $this->conexao->connectDatabase();
            $select = $conn->query($selectAllPatrocinio);

                //retorna somente um contato
            if($rsPatrocinio = $select->fetch(PDO::FETCH_ASSOC)) {

                $patrocinio = new NossosPatrocinios();
                $patrocinio->setIdPatrocinio($rsPatrocinio['id_patrocinio']);
                $patrocinio->setImagem($rsPatrocinio['logo']);
                $patrocinio->setNome($rsPatrocinio['nome']);
                $patrocinio->setStatus($rsPatrocinio['status']);
                

            }
            //Fechar a conexão com o BD
            $this->conexao->closeDatabase();
            return $patrocinio;

        }












    }

?>