<?php

class PessoaFisicaBusiness{
 
    // Iniciando a variável em null para não haver erro
    private $path_local;

    // Atributo que será instânciado
    private $conexao;
  
     //construtor
    public function __construct()
    {
       
       // Variável que recebe a variável de sessão
        $path_local = $_SESSION['path_local'];

        // Importanto a classe de conexão com BD
        require_once "$path_local/cms/model/DAO/conexao.php";
         
        // Instânciando a classe de Conexão
        $this->conexao = new Conexao();
    }

    public function loginPessoaFisica($cpf, $password){
        $sql = "SELECT * FROM tbl_pessoa_fisica WHERE cpf = '$cpf' AND senha = '$password'";

        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de insert';

        $select = $con->query($sql);

        if($rsPF = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
            $result = array(
                'success' => true,
                'id_p_fisica' => $rsPF['id_p_fisica'],
            );
        }

        else {
            $result = array(
                'success' => false,
                'message' => 'Não foi possível realizar o Login'
            );
        }
        // Fechando a conexão com BD
        $this->conexao->closeDatabase();
       
        //retorna o objeto
        return $result;
    }

    public function selectByIdPessoaFisica($idPessoaFisica){
        
        $sql = "SELECT 
                pf.*, e.*
            FROM 
                tbl_pessoa_fisica AS pf
            INNER JOIN 
                tbl_p_fisica_endereco AS pfe ON pfe.id_p_fisica = pfe.id_p_fisica
            INNER JOIN 
                tbl_endereco AS e ON pfe.id_endereco = e.id_endereco 
            WHERE 
                pf.id_p_fisica = $idPessoaFisica";

        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de insert';

        $select = $con->query($sql);

        if($rsPF = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
            $result = array(
                'success' => true,
                'id_p_fisica' => $rsPF['id_p_fisica'],
                'nome' => $rsPF['nome'],
                'cpf' => $rsPF['cpf'],
                'foto' => $rsPF['foto'],
                'email' => $rsPF['email'],
                'telefone' => $rsPF['telefone'],
                'celular' => $rsPF['celular'],
                'usuario' => $rsPF['usuario'],
                'senha' => $rsPF['senha'],
                'data_nascimento' => $rsPF['data_nascimento'],
                'status' => utf8_encode($rsPF['status']),
                'logradouro' => $rsPF['logradouro'],
                'bairro' => utf8_encode($rsPF['bairro']),
                'cidade' => utf8_encode($rsPF['cidade']),
                'uf' => utf8_encode($rsPF['uf']),
                'num' => $rsPF['numero'],
                'cep' => $rsPF['cep'],
            );
        }

        else {
            $result = array(
                'success' => false,
                'message' => 'Não foi possível resgatar os dados'
            );
        }
        // Fechando a conexão com BD
        $this->conexao->closeDatabase();
       
        //retorna o objeto
        return $result;
    }

    
   
    public function insertComentario($id_p_fisica, $descricao, $status){
        $sql = "INSERT INTO tbl_comentario(id_p_fisica, descricao, status)
            VALUES('$id_p_fisica', '$descricao', '$status')";

            //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro ao inserir um novo comnetário',         
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Comentario adicionado com sucesso',
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;
    }
    
}
?>