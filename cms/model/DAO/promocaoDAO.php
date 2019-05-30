<?php

    class PromocaoDAO{

        private $path_local;
        private $conexao;

        //método construct é chamado assim que a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/DAO/conexao.php";

            $this->conexao = new Conexao();
        }

        //método para inserir uma promocao
        public function insertPromocao(Promocao $promocoes){

            //sql para inserir no banco
            $insertSql = "INSERT INTO
                            tbl_promocao (titulo, descricao, status, img_promo, precisa_cadastro, status_home)
                         VALUES
                            ('".$promocoes->getTitulo()."', '".$promocoes->getDescricao()."',
                            '".$promocoes->getStatus()."', '".$promocoes->getImagem()."',
                            '".$promocoes->getPrecisaCadastro()."', '".$promocoes->getStatusHome()."')";

            $conn = $this->conexao->connectDatabase();
            

            //enviando pro banco
            if(!$conn->query($insertSql)){
                echo "Erro no script de insert";
            }

            //fechando  a conexão
            $this->conexao->closeDatabase();
        }

        //Método para deletar uma promocao
        public function deletePromocao($idPromocao){

            //sql para deletar do banco
            $deleteSql = "DELETE FROM tbl_promocao WHERE id_promocao=".$idPromocao;

            $conn = $this->conexao->connectDatabase();

            //enviando pro banco;
            if(!$conn->query($deleteSql)){
                echo "Erro no script";

            }

            //fechando a conexao
            $this->conexao->closeDatabase();
        }

        //Método para atualizar uma promocao
        public function updatePromocao(Promocao $promocoes, $idPromocoes){


            if($promocoes->getImagem() == null){
                //script para atualizar uma promocao
                $updateSql = "UPDATE tbl_promocao
                            SET titulo = '".$promocoes->getTitulo()."',
                            descricao = '".$promocoes->getDescricao()."',
                            status = '".$promocoes->getStatus()."',
                            precisa_cadastro = '".$promocoes->getPrecisaCadastro()."',
                            status_home = '".$promocoes->getStatusHome()."'
                            WHERE id_promocao=".$idPromocoes;

                $conn = $this->conexao->connectDatabase();

                //Envia o script para o banco
                if(!$conn->query($updateSql)){

                    echo "Erro no script de update";
                }

                //fechando a conexao
                $this->conexao->closeDatabase();
            }else{

                //script para atualizar uma notícia
                $updateSql = $updateSql = "UPDATE tbl_promocao
                            SET titulo = '".$promocoes->getTitulo()."',
                            descricao = '".$promocoes->getDescricao()."',
                            status = '".$promocoes->getStatus()."',
                            img_promo = '".$promocoes->getImagem()."',
                            precisa_cadastro = '".$promocoes->getPrecisaCadastro()."',
                            status_home = '".$promocoes->getStatusHome()."'

                            WHERE id_promocao=".$idPromocoes;

                $conn = $this->conexao->connectDatabase();

                //Envia o script para o banco
                if(!$conn->query($updateSql)){

                    echo "Erro no script de update";
                }
                //fechando a conexao
                $this->conexao->closeDatabase();
            }
        }


        //método para listar todos as promocoes
        public function selectAllPromocoes(){
            //script para atualizar o status no banco
            $selectAllSql = "SELECT * FROM tbl_promocao ORDER BY id_promocao DESC";

            //Método que faz a conexão com o banco
            $conn = $this->conexao->connectDatabase();

            //executando o select
            $select = $conn->query($selectAllSql);

            //Contador iniciando em 0
            $cont = 0;

            //Loop que coloca todo as promocoes em um rs
            while($rsPromocoes = $select->fetch(PDO::FETCH_ASSOC)){
                //Array de dados do tipo promocoes
                $promocoes[] = new Promocao();

                //Setando os valores do obj
                $promocoes[$cont]->setIdPromocao($rsPromocoes['id_promocao']);
                $promocoes[$cont]->setTitulo($rsPromocoes['titulo']);
                $promocoes[$cont]->setDescricao($rsPromocoes['descricao']);
                $promocoes[$cont]->setImagem($rsPromocoes['img_promo']);
                $promocoes[$cont]->setPrecisaCadastro($rsPromocoes['precisa_cadastro']);
                $promocoes[$cont]->setStatus($rsPromocoes['status']);
                $promocoes[$cont]->setStatusHome($rsPromocoes['status_home']);
                //incrementando o cont
                $cont += 1;

            }

            //Fechando a conexão com o banco de dados
            $this->conexao->closeDatabase();

            //retornando o array
            return $promocoes;

        }

        //Método que busca uma promocoes através do ID
        public function selectByIdPromocao($idPromocao){

          $selectAllPromocao = "SELECT * FROM tbl_promocao WHERE id_promocao=".$idPromocao;
          $conn = $this->conexao->connectDatabase();
          $select = $conn->query($selectAllPromocao);
          //retorna somente um contato
          if($rsPromocao = $select->fetch(PDO::FETCH_ASSOC)) {

              $promocao = new Promocao();
              $promocao->setIdPromocao($rsPromocao['id_promocao']);
              $promocao->setTitulo($rsPromocao['titulo']);
              $promocao->setDescricao($rsPromocao['descricao']);
              $promocao->setImagem($rsPromocao['img_promo']);
              $promocao->setPrecisaCadastro($rsPromocao['precisa_cadastro']);
              $promocao->setStatus($rsPromocao['status']);
              $promocao->setStatusHome($rsPromocao['status_home']);
          }
          //Fechar a conexão com o BD
          $this->conexao->closeDatabase();
          return $promocao;
        }

        //método para listar todos as promocoes
        public function filterPromocao($filter){
            $selectFilterPromocao = "SELECT * FROM tbl_promocao WHERE titulo LIKE '%$filter%'";
            $conn = $this->conexao->connectDatabase();
            $select = $conn->query($selectFilterPromocao);

            //retorna somente um contato
            if($rsPromocao = $select->fetch(PDO::FETCH_ASSOC)) {

                $promocao = new Promocao();
                $promocao->setIdPromocao($rsPromocao['id_promocao']);
                $promocao->setTitulo($rsPromocao['titulo']);
                $promocao->setDescricao($rsPromocao['descricao']);
                $promocao->setImagem($rsPromocao['img_promo']);
                $promocao->setPrecisaCadastro($rsPromocao['precisa_cadastro']);
                $promocao->setStatus($rsPromocao['status']);
                $promocao->setStatusHome($rsPromocao['status_home']);
            }

            //Fechar a conexão com o BD
            $this->conexao->closeDatabase();
            return $promocao;
        }

    }

?>
