<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Murilo
  Data Criação: 24/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Funcionario

*/

    class ControllerFuncionarios{

        private $path_local;
        private $funcionarioDAO;

        //método construct é chamado quando a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/funcionario.php";
            require_once "$path_local/cms/model/DAO/funcionarioDAO.php";

            $this->funcionarioDAO = new FuncionarioDAO();
        }

        //Método para inserir um funcionario
        public function inserirFuncionario(){

            //verifica qual método tá sendo requisitado do form (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //resgata os values dos inputs para fazer o insert
                $txtNomeFuncionario = $_POST['txtNomeFuncionario'];
                $txtDataAdmissao = $_POST['txtDataAdmissao'];
                $txtEmailFuncionario = $_POST['txtEmailFuncionario'];
                $txtUsuario = $_POST['txtUsuario'];
                $txtTelefone = $_POST['txtTelefone'];
                $txtSenha = $_POST['txtSenha'];
                $txtCelular = $_POST['txtCelular'];
                $txtDataNascimento = $_POST['txtDataNascimento'];
                $idCargo = $_POST['select_cargo'];
                $idPerfil = $_POST['select_perfil'];
                $status = $_POST['select_status'];


                //Instânciando a classe funcionario
                $funcionarios = new Funcionario();

                //Guardando os dados fornecidos pelo usuário no obj funcionario
                $funcionarios->setNome($txtNomeFuncionario);
                $funcionarios->setDataAdmissao($txtDataAdmissao);
                $funcionarios->setEmail($txtEmailFuncionario);
                $funcionarios->setUsuario($txtUsuario);
                $funcionarios->setTelefone($txtTelefone);
                $funcionarios->setSenha($txtSenha);
                $funcionarios->setCelular($txtCelular);
                $funcionarios->setDataNascimento($txtDataNascimento);
                $funcionarios->setIdCargo($idCargo);
                $funcionarios->setIdPerfil($idPerfil);
                $funcionarios->setStatus($status);

                //Chamando o método de inserir no banco
                $this->funcionarioDAO->insertFuncionario($funcionarios);

            }
        }

        //Método para excluir um funcionario
        public function excluirFuncionario(){

            //resgatando o ID do funcionario para fazer o delete
            $idFuncionario = $_GET['id'];

            //deleta um funcionario do banco de dados
            $this->funcionarioDAO->deleteFuncionario($idFuncionario);

        }


        //método para atualizar um funcionario
        public function atualizarFuncionario(){ 

            //Resgata o ID via GET de funcionarios para atualizar
            $idFuncionario = $_GET['id'];

            //verifica qual método tá sendo requisitado do form (POST ou GET)
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //resgata os values dos inputs para fazer o update
                $txtNomeFuncionario = $_POST['txtNomeFuncionario'];
                $txtDataAdmissao = $_POST['txtDataAdmissao'];
                $txtEmailFuncionario = $_POST['txtEmailFuncionario'];
                $txtUsuario = $_POST['txtUsuario'];
                $txtTelefone = $_POST['txtTelefone'];
                $txtSenha = $_POST['txtSenha'];
                $txtCelular = $_POST['txtCelular'];
                $txtDataNascimento = $_POST['txtDataNascimento'];
                $idCargo = $_POST['select_cargo'];
                $idPerfil = $_POST['select_perfil'];
                $status = $_POST['select_status'];

                //Instânciando a classe funcionario
                $funcionarios = new Funcionario();

                //Guardando os dados fornecidos pelo usuário no obj funcionario
                $funcionarios->setNome($txtNomeFuncionario);
                $funcionarios->setDataAdmissao($txtDataAdmissao);
                $funcionarios->setEmail($txtEmailFuncionario);
                $funcionarios->setUsuario($txtUsuario);
                $funcionarios->setTelefone($txtTelefone);
                $funcionarios->setSenha($txtSenha);
                $funcionarios->setCelular($txtCelular);
                $funcionarios->setDataNascimento($txtDataNascimento);
                $funcionarios->setIdCargo($idCargo);
                $funcionarios->setIdPerfil($idPerfil);
                $funcionarios->setStatus($status);

                //Chamando o método de inserir no banco
                $this->funcionarioDAO->updateFuncionario($funcionarios, $idFuncionario);

            }
        }

        //listar todos funcionario do banco
        public function listarFuncionarios(){

            return $this->funcionarioDAO->selectAllFuncionarios();

        }

        //buscar um funcionario do banco
        public function buscarFuncionario(){

            $idFuncionarios = $_GET['id'];

            return $this->funcionarioDAO->selectByIdFuncionario($idFuncionarios);

        }

    }



?>
