<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Murilo
  Data Criação: 12/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Noticia

*/

    class ControllerNoticias{

        private $path_local;
        private $noticiaDAO;

        //método construct é chamado quando a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/noticia.php";
            require_once "$path_local/cms/model/DAO/noticiaDAO.php";
            require_once "$path_local/cms/upload.php";

            $this->noticiaDAO = new NoticiaDAO();
        }

        //Método para inserir uma noticia
        public function inserirNoticia(){

            //verifica qual método tá sendo requisitado do form (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //resgata os values dos inputs para fazer o insert
                $txtTituloNoticia = $_POST['txtTituloNoticia'];
                //var_dump($_FILES['flefoto']);
                $imagem = upload($_FILES['flefoto']);

                $txtDataNoticia = $_POST['txtDataNoticia'];
                $txtDescricaoNoticia = $_POST['txtDescricaoNoticia'];
                $selectStatus = $_POST['select_status'];
                $selectStatusHome = $_POST['select_status_home'];


                //Instânciando a classe noticia
                $noticias = new Noticia();

                //Guardando os dados fornecidos pelo usuário no obj Noticia
                $noticias->setTitulo($txtTituloNoticia);
                $noticias->setImagem($imagem);
                $noticias->setDataNoticia($txtDataNoticia);
                $noticias->setDescricao($txtDescricaoNoticia);
                $noticias->setStatus($selectStatus);
                $noticias->setStatusHome($selectStatusHome);

                //Chamando o método de inserir no banco
                $this->noticiaDAO->insertNoticia($noticias);

            }
        }

        //Método para excluir uma notícia
        public function excluirNoticia(){

            //resgatando o ID da notícia para fazer o delete
            $idNoticia = $_GET['id'];

            //deleta uma noticia do banco de dados
            $this->noticiaDAO->deleteNoticia($idNoticia);

        }


        //método para atualizar um noticia
        public function atualizarNoticia(){

            //Resgata o ID via GET de noticias para atualizar
            $idNoticia = $_GET['id'];

            ////verifica qual método tá sendo requisitado do form (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //resgata os values dos inputs para fazer o insert
            $txtTituloNoticia = $_POST['txtTituloNoticia'];

            $imagem = upload($_FILES['flefoto']);
            $txtDataNoticia = $_POST['txtDataNoticia'];
            $txtDescricaoNoticia = $_POST['txtDescricaoNoticia'];
            $selectStatus = $_POST['select_status'];
            $selectStatusHome = $_POST['select_status_home'];

            //Instânciando a classe noticia
            $noticias = new Noticia();

            //Guardando os dados fornecidos pelo usuário no obj Noticia
            $noticias->setTitulo($txtTituloNoticia);
            $noticias->setImagem($imagem);
            $noticias->setDataNoticia($txtDataNoticia);
            $noticias->setDescricao($txtDescricaoNoticia);
            $noticias->setStatus($selectStatus);
            $noticias->setStatusHome($selectStatusHome);

            //Chamando o método de inserir no banco
            $this->noticiaDAO->updateNoticia($noticias, $idNoticia);
            }
        }

        //listar todos notícias do banco
        public function listarNoticias(){

            return $this->noticiaDAO->selectAllNoticias();

        }

        //buscar uma noticia do banco
        public function buscarNoticia(){

            $idNoticias = $_GET['id'];

            return $this->noticiaDAO->selectByIdNoticia($idNoticias);

        }

    }



?>
