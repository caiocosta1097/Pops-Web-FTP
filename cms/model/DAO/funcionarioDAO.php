<?php

    class FuncionarioDAO{

        private $path_local;
        private $conexao;

        //método construct é chamado assim que a classe é instânciada
        public function __construct(){

            $path_local = $_SESSION['path_local'];

            require_once "$path_local/cms/model/DAO/conexao.php";

            $this->conexao = new Conexao();
        }

        //método para inserir uma notícia
        public function insertFuncionario(Funcionario $funcionarios){

            //sql para inserir no banco
            $insertSql = "INSERT INTO tbl_funcionario
                        (id_cargo, nome, email, telefone, celular, dt_admissao, usuario, senha, status, data_nascimento, id_perfil)
                        VALUES(
                            '".$funcionarios->getIdCargo()."',
                            '".$funcionarios->getNome()."',
                            '".$funcionarios->getEmail()."',
                            '".$funcionarios->getTelefone()."',
                            '".$funcionarios->getCelular()."',
                            '".$funcionarios->getDataAdmissao()."',
                            '".$funcionarios->getUsuario()."',
                            '".$funcionarios->getSenha()."',
                            '".$funcionarios->getStatus()."',
                            '".$funcionarios->getDataNascimento()."',
                            '".$funcionarios->getPerfil()."')";
                            
                            
            
            $conn = $this->conexao->connectDatabase();
            //echo $insertSql;
            //enviando pro banco
            if(!$conn->query($insertSql)){
                echo "Erro no script de insert";
            }

            //fechando  a conexão
            $this->conexao->closeDatabase();
        }

        //Método para deletar uma notícia
        public function deleteFuncionario($idFuncionario){

            //sql para deletar do banco
            $deleteSql = "DELETE FROM tbl_funcionario WHERE matricula=".$idFuncionario;

            $conn = $this->conexao->connectDatabase();

            //enviando pro banco;
            if(!$conn->query($deleteSql)){
                echo "Erro no script";

            }

            //fechando a conexao
            $this->conexao->closeDatabase();
        }

        //Método para atualizar um funcionário
        public function updateFuncionario(Funcionario $funcionarios, $idFuncionarios){


            $sqlUpdate = "UPDATE tbl_funcionario SET
                    id_cargo ='".$funcionarios->getIdCargo()."',
                    nome = '".$funcionarios->getNome()."',
                    email = '".$funcionarios->getEmail()."',
                    telefone = '".$funcionarios->getTelefone()."',
                    celular = '".$funcionarios->getCelular()."',
                    dt_admissao = '".$funcionarios->getDataAdmissao()."',
                    usuario = '".$funcionarios->getUsuario()."',
                    senha = '".$funcionarios->getSenha()."',
                    status = '".$funcionarios->getStatus()."',
                    data_nascimento = '".$funcionarios->getDataNascimento()."',
                    id_perfil = '".$funcionarios->getIdPerfil()."' WHERE matricula = ".$idFuncionarios;

            // Recebendo a função que faz a conexão com BD
            $conn = $this->conexao->connectDatabase();

            // Executa o script no BD
            if (!$conn->query($sqlUpdate))
            echo 'Erro no script de update';

            // Fechando a conexão com BD
            $this->conexao->closeDatabase();

        }


        //método para listar todos os funcionarios
        public function selectAllFuncionarios(){

            // Query de select
            $sqlAllFuncionarios = "SELECT
                                        funcionario.*, perfil.perfil AS perfil_nome, cargo.nome AS cargo_nome
                                   FROM
                                        tbl_funcionario as funcionario
                                   INNER JOIN
                                        tbl_perfil as perfil ON perfil.id_perfil = funcionario.id_perfil
                                   INNER JOIN
                                        tbl_cargo AS cargo ON cargo.id_cargo = funcionario.id_cargo";

            // Recebendo a função que faz a conexão com BD
            $conn = $this->conexao->connectDatabase();

            // Executando o select
            $select = $conn->query($sqlAllFuncionarios);

            // Contador
            $cont = 0;

            // Loop que coloca todos os registros em um result set
            while ($rsFuncionarios = $select->fetch(PDO::FETCH_ASSOC)) {

                // Array de dados do tipo Cargo
                $funcionarios[] = new Funcionario();

                // Setando os valores do objeto
                $funcionarios[$cont]->setMatricula($rsFuncionarios['matricula']);
                $funcionarios[$cont]->setNome($rsFuncionarios['nome']);
                $funcionarios[$cont]->setEmail($rsFuncionarios['email']);
                $funcionarios[$cont]->setTelefone($rsFuncionarios['telefone']);
                $funcionarios[$cont]->setCelular($rsFuncionarios['celular']);
                $funcionarios[$cont]->setDataAdmissao($rsFuncionarios['dt_admissao']);
                $funcionarios[$cont]->setUsuario($rsFuncionarios['usuario']);
                $funcionarios[$cont]->setSenha($rsFuncionarios['senha']);
                $funcionarios[$cont]->setDataNascimento($rsFuncionarios['data_nascimento']);
                $funcionarios[$cont]->setIdPerfil($rsFuncionarios['id_perfil']);
                $funcionarios[$cont]->setPerfil($rsFuncionarios['perfil_nome']);
                $funcionarios[$cont]->setIdCargo($rsFuncionarios['id_cargo']);
                $funcionarios[$cont]->setCargo($rsFuncionarios['cargo_nome']);


                $cont += 1;
            }

            // Fechando a conexão com BD
            $this->conexao->closeDatabase();

            // Retorna o array
            return $funcionarios;

        }

        //Método que busca um funcionario através do ID
        public function selectByIdFuncionario($idFuncionario){

          $selectAllFuncionario = "SELECT * FROM tbl_funcionario WHERE matricula = $idFuncionario;";

          $conn = $this->conexao->connectDatabase();
          $select = $conn->query($selectAllFuncionario);
          //retorna somente um contato
          if($rsFuncionario = $select->fetch(PDO::FETCH_ASSOC)) {

              $funcionario = new Funcionario();
              $funcionario->setMatricula($rsFuncionario['matricula']);
              $funcionario->setNome($rsFuncionario['nome']);
              $funcionario->setEmail($rsFuncionario['email']);
              $funcionario->setTelefone($rsFuncionario['telefone']);
              $funcionario->setCelular($rsFuncionario['celular']);
              $funcionario->setDataAdmissao($rsFuncionario['dt_admissao']);
              $funcionario->setUsuario($rsFuncionario['usuario']);
              $funcionario->setSenha($rsFuncionario['senha']);
              $funcionario->setDataNascimento($rsFuncionario['data_nascimento']);
              $funcionario->setIdPerfil($rsFuncionario['id_perfil']);
              $funcionario->setIdCargo($rsFuncionario['id_cargo']);
              $funcionario->setStatus($rsFuncionario['status']);
          }
          //Fechar a conexão com o BD
          $this->conexao->closeDatabase();
          return $funcionario;

        }

    }

?>
