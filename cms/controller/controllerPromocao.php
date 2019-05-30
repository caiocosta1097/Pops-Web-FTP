<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Murilo
  Data Criação: 23/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Promocao

*/

    class ControllerPromocoes{

        private $path_local;
        private $promocaoDAO;

        //método construct é chamado quando a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/promocao.php";
            require_once "$path_local/cms/model/DAO/promocaoDAO.php";
            require_once "$path_local/cms/upload.php";

            $this->promocaoDAO = new PromocaoDAO();
        }

        //Método para inserir uma promocao
        public function inserirPromocao(){

            //verifica qual método tá sendo requisitado do form (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //resgata os values dos inputs para fazer o insert
                $txtTituloPromocao = $_POST['txtTituloPromocao'];
                $txtDescricaoPromocao = $_POST['txtDescricaoPromocao'];
                $selectCadastroNecessario = $_POST['select_cadastro'];
                $selectStatus = $_POST['select_status'];
                $selectStatusHome = $_POST['select_home'];
                //var_dump($_FILES['flefoto']);
                $imagem = upload($_FILES['flefoto']);

                //Instânciando a classe Promocao
                $promocoes = new Promocao();

                //Guardando os dados fornecidos pelo usuário no obj Promocao
                $promocoes->setTitulo($txtTituloPromocao);
                $promocoes->setDescricao($txtDescricaoPromocao);
                $promocoes->setImagem($imagem);
                $promocoes->setPrecisaCadastro($selectCadastroNecessario);
                $promocoes->setStatus($selectStatus);               
                $promocoes->setStatusHome($selectStatusHome); 

                //Chamando o método de inserir no banco
                $this->promocaoDAO->insertPromocao($promocoes);

            }
        }

        //Método para excluir uma promocao
        public function excluirPromocao(){

            //resgatando o ID da promocao para fazer o delete
            $idPromocao = $_GET['id'];

            //deleta uma promocao do banco de dados
            $this->promocaoDAO->deletePromocao($idPromocao);

        }


        //método para atualizar uma promocao
        public function atualizarPromocao(){

            $idPromocao = $_GET['id'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //resgata os values dos inputs para fazer o insert
                $txtTituloPromocao = $_POST['txtTituloPromocao'];
                $txtDescricaoPromocao = $_POST['txtDescricaoPromocao'];
                $selectCadastroNecessario = $_POST['select_cadastro'];
                $selectStatus = $_POST['select_status'];
                $selectStatusHome = $_POST['select_home'];
                //var_dump($_FILES['flefoto']);
                $imagem = upload($_FILES['flefoto']);

                //Instânciando a classe Promocao
                $promocoes = new Promocao();

                //Guardando os dados fornecidos pelo usuário no obj Promocao
                $promocoes->setTitulo($txtTituloPromocao);
                $promocoes->setDescricao($txtDescricaoPromocao);
                $promocoes->setPrecisaCadastro($selectCadastroNecessario);
                $promocoes->setStatus($selectStatus);
                $promocoes->setStatusHome($selectStatusHome);
                $promocoes->setImagem($imagem);
                

                $this->promocaoDAO->updatePromocao($promocoes, $idPromocao);
            }
        }

        //listar todas promocoes do banco
        public function listarPromocoes(){

            return $this->promocaoDAO->selectAllPromocoes();

        }

        //buscar uma promocao do banco
        public function buscarPromocao(){

            $idPromocoes = $_GET['id'];

            return $this->promocaoDAO->selectByIdPromocao($idPromocoes);

        }

        public function filtrar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //resgata os values dos inputs para fazer o insert
                $txtFiltrar = $_POST['txtFiltrar'];
                //Instânciando a classe Promocao
                $promocoes = new Promocao();

                //Guardando os dados fornecidos pelo usuário no obj Promocao
                $promocoes->setTitulo($txtFiltrar);
                
                $this->promocaoDAO->filterPromocao($promocoes);
            }
        }
    }

?>
