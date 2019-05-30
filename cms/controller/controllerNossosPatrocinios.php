<?php


    class ControllerNossosPatrocinios{

        private $path_local;
        private $patrocinioDAO;

        //método construct é chamado quando a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/nossospatrocinios.php";
            require_once "$path_local/cms/model/DAO/nossosPatrociniosDAO.php";
            require_once "$path_local/cms/upload.php";

            $this->patrocinioDAO = new NossosPatrociniosDAO();
        }

        //Inserir patrocínio
        public function inserirPatrocinio(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $txtNomePatrocinio = $_POST['txtNomePatrocinio'];
                $imagem = upload($_FILES['flefoto']);
                $selectStatus = $_POST['select_status'];

                $nossosPatrocinios = new NossosPatrocinios();

                $nossosPatrocinios->setNome($txtNomePatrocinio);
                $nossosPatrocinios->setImagem($imagem);
                $nossosPatrocinios->setStatus($selectStatus);

                $this->patrocinioDAO->insertPatrocinio($nossosPatrocinios);
            }
        }

        //excluir patrocínio
        public function excluirPatrocinio(){
            $idPatrocinio = $_GET['id'];

            $this->patrocinioDAO->deletePatrocinio($idPatrocinio);
        }

        //Método pra atualizar um patrocínio
        public function atualizarPatrocinio(){
            $idPatrocinio = $_GET['id'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $txtNomePatrocinio = $_POST['txtNomePatrocinio'];
                $imagem = upload($_FILES['flefoto']);
                $selectStatus = $_POST['select_status'];

                $nossosPatrocinios = new NossosPatrocinios();

                $nossosPatrocinios->setNome($txtNomePatrocinio);
                $nossosPatrocinios->setImagem($imagem);
                $nossosPatrocinios->setStatus($selectStatus);

                $this->patrocinioDAO->updatePatrocinio($nossosPatrocinios, $idPatrocinio);
            }
        }


        public function listarPatrocinios(){

            return $this->patrocinioDAO->selectAllPatrocinios();
        }

        public function buscarPatrocinio(){

            $idPatrocinio = $_GET['id'];

            return $this->patrocinioDAO->selectByIdPatrocinio($idPatrocinio);
        }




    }

?>
