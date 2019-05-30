<?php

    class NoticiaDAO{

        private $path_local;
        private $conexao;

        //método construct é chamado assim que a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/DAO/conexao.php";

            $this->conexao = new Conexao();
        }

        //método para inserir uma notícia
        public function insertNoticia(Noticia $noticias){

            //sql para inserir no banco
            $insertSql = "INSERT INTO
                            tbl_noticia (titulo, imagem, dt_noticia, descricao, status, status_home)
                         VALUES
                            ('".$noticias->getTitulo()."', '".$noticias->getImagem()."', '".$noticias->getDataNoticia()."', '".$noticias->getDescricao()."',
                             '".$noticias->getStatus()."', '".$noticias->getStatusHome()."')";

            $conn = $this->conexao->connectDatabase();

            //enviando pro banco
            if(!$conn->query($insertSql)){
                echo "Erro no script de insert";
            }

            //fechando  a conexão
            $this->conexao->closeDatabase();
        }

        //Método para deletar uma notícia
        public function deleteNoticia($idNoticia){

            //sql para deletar do banco
            $deleteSql = "DELETE FROM tbl_noticia WHERE id_noticia=".$idNoticia;

            $conn = $this->conexao->connectDatabase();

            //enviando pro banco;
            if(!$conn->query($deleteSql)){
                echo "Erro no script";

            }

            //fechando a conexao
            $this->conexao->closeDatabase();
        }

        //Método para atualizar uma notícia
        public function updateNoticia(Noticia $noticias, $idNoticias){

            
            if($noticias->getImagem() == null){
                //script para atualizar uma notícia
                $updateSql = "UPDATE tbl_noticia
                            SET titulo = '".$noticias->getTitulo()."',
                            dt_noticia = '".$noticias->getDataNoticia()."',
                            descricao = '".$noticias->getDescricao()."',
                            status = '".$noticias->getStatus()."',
                            status_home = '".$noticias->getStatusHome()."'
                            WHERE id_noticia=".$idNoticias;

                $conn = $this->conexao->connectDatabase();

                //Envia o script para o banco
                if(!$conn->query($updateSql)){

                    echo "Erro no script de update";
                }

                //fechando a conexao
                $this->conexao->closeDatabase();
            }else{

                //script para atualizar uma notícia
                $updateSql = "UPDATE tbl_noticia
                            SET titulo = '".$noticias->getTitulo()."',
                            imagem = '".$noticias->getImagem()."',
                            dt_noticia = '".$noticias->getDataNoticia()."',
                            descricao = '".$noticias->getDescricao()."',
                            status = '".$noticias->getStatus()."',
                            status_home = '".$noticias->getStatusHome()."'
                            WHERE id_noticia=".$idNoticias;

                $conn = $this->conexao->connectDatabase();

                //Envia o script para o banco
                if(!$conn->query($updateSql)){

                    echo "Erro no script de update";
                }
                //fechando a conexao
                $this->conexao->closeDatabase();
            }        
        }


        //método para listar todos as notícias
        public function selectAllNoticias(){
            //script para atualizar o status no banco
            $selectAllSql = "SELECT * FROM tbl_noticia ORDER BY id_noticia DESC";

            //Método que faz a conexão com o banco
            $conn = $this->conexao->connectDatabase();

            //executando o select
            $select = $conn->query($selectAllSql);

            //Contador iniciando em 0
            $cont = 0;

            //Loop que coloca todo as noticias em um rs
            while($rsNoticias = $select->fetch(PDO::FETCH_ASSOC)){
                //Array de dados do tipo noticia         
                $noticias[] = new Noticia();
                
                //Setando os valores do obj
                $noticias[$cont]->setIdNoticia($rsNoticias['id_noticia']);
                $noticias[$cont]->setTitulo($rsNoticias['titulo']);
                $noticias[$cont]->setImagem($rsNoticias['imagem']);
                $noticias[$cont]->setDataNoticia($rsNoticias['dt_noticia']);
                $noticias[$cont]->setDescricao($rsNoticias['descricao']);
                $noticias[$cont]->setStatus($rsNoticias['status']);


                //incrementando o cont
                $cont += 1;

            }

            //Fechando a conexão com o banco de dados
            $this->conexao->closeDatabase();

            //retornando o array
            return $noticias;

        }

        //Método que busca uma noticia através do ID
        public function selectByIdNoticia($idNoticia){

          $selectAllNoticia = "SELECT * FROM tbl_noticia WHERE id_noticia=".$idNoticia;
          $conn = $this->conexao->connectDatabase();
          $select = $conn->query($selectAllNoticia);
          //retorna somente um contato
          if($rsNoticia = $select->fetch(PDO::FETCH_ASSOC)) {

              $noticia = new Noticia();
              $noticia->setIdNoticia($rsNoticia['id_noticia']);
              $noticia->setTitulo($rsNoticia['titulo']);
              $noticia->setImagem($rsNoticia['imagem']);
              $noticia->setDataNoticia($rsNoticia['dt_noticia']);
              $noticia->setDescricao($rsNoticia['descricao']);
              $noticia->setStatus($rsNoticia['status']);
              $noticia->setStatusHome($rsNoticia['status_home']);

          }
          //Fechar a conexão com o BD
          $this->conexao->closeDatabase();
          return $noticia;

        }

    }

?>
