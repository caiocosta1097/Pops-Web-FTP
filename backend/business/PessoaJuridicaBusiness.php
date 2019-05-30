<?php
class PessoaJuridicaBusiness{
 
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
    public function login($cnpj, $password){
        $sql = "SELECT * FROM tbl_pessoa_juridica WHERE cnpj = '$cnpj' AND senha = '$password'";
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de insert';
        $select = $con->query($sql);
        if($rsPJ = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
            $result = array(
                'success' => true,
                'cnpj' => $rsPJ['cnpj'],
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
    public function selectAdById($id){
        
        $sql = "SELECT * FROM tbl_anuncio WHERE id_anuncio = $id";
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de select';
        $select = $con->query($sql);
        if($rsAnuncio = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
             //criando vetor e atribuindo resultados no banco dentro dele
             $result = array(
                'success' => true,
                'cnpj' => $rsAnuncio['cnpj'],
                'foto' => $rsAnuncio['img_anuncio'],
                'id_anuncio' => $rsAnuncio['id_anuncio'],
                'descricao' => utf8_encode($rsAnuncio['descricao']),
                'status' => $rsAnuncio['status'],
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
    public function selectPerfilById($id){
        
        $sql = "SELECT * FROM tbl_perfil_juridico WHERE id_perfil_juridico = $id";
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de select';
        $select = $con->query($sql);
        if($rsPerfil = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
             //criando vetor e atribuindo resultados no banco dentro dele
             $result = array(
                'success' => true,
                'cnpj' => $rsPerfil['cnpj'],
                'status' => $rsPerfil['status'],
                'foto' => $rsPerfil['foto'],
                'email' => $rsPerfil['email'],
                'responsavel' => $rsPerfil['responsavel'],
                'telefone' => $rsPerfil['telefone'],
                'celular' => $rsPerfil['celular'],
                'usuario' => $rsPerfil['usuario'],
                'senha' => $rsPerfil['senha'],
              
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
    public function selectByCnpj($cnpj){
        
        $sql = "SELECT pj.*, en.* FROM tbl_pessoa_juridica pj
        INNER JOIN tbl_endereco en 
        WHERE pj.cnpj = '$cnpj' AND en.id_endereco = pj.id_endereco";
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de insert';
        $select = $con->query($sql);
        if($rsPJ = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
            $result = array(
                'success' => true,
                'cnpj' => $rsPJ['cnpj'],
                'razao_social' => $rsPJ['razao_social'],
                'foto' => $rsPJ['foto'],
                'email' => $rsPJ['email'],
                'responsavel' => $rsPJ['responsavel'],
                'telefone' => $rsPJ['telefone'],
                'celular' => $rsPJ['celular'],
                'usuario' => $rsPJ['usuario'],
                'senha' => $rsPJ['senha'],
                'status' => $rsPJ['status'],
                'nome_fantasia' => utf8_encode($rsPJ['nome_fantasia']),
                'id_endereco' => $rsPJ['id_endereco'],
                'logradouro' => utf8_encode($rsPJ['logradouro']),
                'bairro' => utf8_encode($rsPJ['bairro']),
                'cidade' => utf8_encode($rsPJ['cidade']),
                'uf' => $rsPJ['uf'],
                'numero' => $rsPJ['numero'],
                'cep' => $rsPJ['cep'],
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
    
    public function selectPerfis($cnpj){
        
        $sql = "SELECT * FROM tbl_perfil_juridico WHERE cnpj = '$cnpj'";
        
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de select';
        $select = $con->query($sql);
        $cont = 0;
        while($rsPerfil = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
            $result[$cont] = array(
                'success' => true,
                'id_perfil_juridico' => $rsPerfil['id_perfil_juridico'],
                'cnpj' => $rsPerfil['cnpj'],
                'foto' => $rsPerfil['foto'],
                'email' => $rsPerfil['email'],
                'responsavel' => $rsPerfil['responsavel'],
                'telefone' => $rsPerfil['telefone'],
                'celular' => $rsPerfil['celular'],
                'usuario' => $rsPerfil['usuario'],
                'senha' => $rsPerfil['senha'],
                'status' => $rsPerfil['status'],
            );
            $cont += 1;
        }
       
        // Fechando a conexão com BD
        $this->conexao->closeDatabase();
       
        //retorna o objeto
        return $result;
    }
    public function selectAnuncios($cnpj){ 
    
        $sql = "SELECT * FROM tbl_anuncio WHERE cnpj = '$cnpj'";
        
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de select';
        $select = $con->query($sql);
        $cont = 0;
        while($rsAnuncio = $select->fetch(PDO::FETCH_ASSOC)){
           
            //criando vetor e atribuindo resultados no banco dentro dele
            $result[$cont] = array(
                'success' => true,
                'cnpj' => $rsAnuncio['cnpj'],
                'foto' => $rsAnuncio['img_anuncio'],
                'id_anuncio' => $rsAnuncio['id_anuncio'],
                'descricao' => utf8_encode($rsAnuncio['descricao']),
                'status' => $rsAnuncio['status'],
            );
            $cont += 1;
        }
       
        // Fechando a conexão com BD
        $this->conexao->closeDatabase();
       
        //retorna o objeto
        return $result;
    }
    public function getPerfisAdicionados($cnpj){
        $sql = "SELECT COUNT(id_perfil_juridico) AS num_rows FROM  tbl_perfil_juridico WHERE cnpj = '$cnpj'";
        //Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();
        // Executa o script no BD
        if (!$con->query($sql))
            echo 'Erro no script de insert';
        $select = $con->query($sql);
        if($rsPerfisAdicionados = $select->fetch(PDO::FETCH_ASSOC)){
             //criando vetor e atribuindo resultados no banco dentro dele
             $result = array(
                'success' => true,
                'numRows' => $rsPerfisAdicionados['num_rows']);
        }
        else {
            $result = array(
                'success' => false,
                'message' => 'Não foi possível resgatar os dados',
                'numRows' => -1,
            );
        }
         // Fechando a conexão com BD
         $this->conexao->closeDatabase();
       
         //retorna o objeto
         return $result['numRows'];
    }
    public function insertNewProfile($responsavel,
        $email,
        $cel,
        $tel,
        $user,
        $senha,
        $status,
        $foto,
        $cnpj){
        
      
        $sql = "INSERT INTO tbl_perfil_juridico
            (
            responsavel,
            email,
            celular,
            usuario,
            senha,
            foto,
            status,
            telefone,
            cnpj)
            VALUES
            (
            '$responsavel',
            '$email',
            '$cel',
            '$user',
            '$senha',
            '$foto',
            '$status',
            '$tel',
            '$cnpj')";
        
            //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro em inserir novo perfil',
                    
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Adicionado com Sucesso',
                
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;
    }
    public function insertNewAd($foto, $desc,$status,$cnpj){
        $sql = "INSERT INTO tbl_anuncio(descricao, img_anuncio, status, cnpj)
            VALUES('$desc', '$foto', $status, '$cnpj')";
            //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro em inserir novo anúncio',
                    
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Adicionado com Sucesso',
                
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;
    }
    public function updateAd($foto=null, $desc,$status,$id){
        if($foto!=null){
            $sql = "UPDATE tbl_anuncio SET descricao = '$desc', status = $status, img_anuncio = '$foto' 
            WHERE id_anuncio = $id";
        } else {
            $sql = "UPDATE tbl_anuncio SET descricao = '$desc', status = $status 
            WHERE id_anuncio = $id";
        }
        //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro em atualizar anuncio',
                    
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Atualizado com Sucesso',
                
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;
    }
    public function updatePerfil( $responsavel,
    $email,
    $cel,
    $tel,
    $user,
    $senha,
    $status,
    $foto=null,
   $id){
        if($foto!=null){
            $sql = "UPDATE tbl_perfil_juridico SET responsavel = '$responsavel', email = '$email',
            celular = '$cel',  telefone = '$tel', usuario = '$user', senha = '$senha',
            status = $status, foto = '$foto' 
            WHERE id_perfil_juridico = $id";
        } else {
            $sql = "UPDATE tbl_perfil_juridico SET responsavel = '$responsavel', email = '$email',
            celular = '$cel',  telefone = '$tel', usuario = '$user', senha = '$senha',
            status = $status
            WHERE id_perfil_juridico = $id";
        }
        //Recebendo a função que faz a conexão com BD
            $con = $this->conexao->connectDatabase();
            // Executa o script no BD
            if (!$con->query($sql))
                $result = array(
                    'success' => false,
                    'message' => 'Erro em atualizar perfil',
                    
                );
            else
                $result = array(
                    'success' => true,
                    'message' => 'Atualizado com Sucesso',
                
                );
            // Fechando a conexão com BD
            $this->conexao->closeDatabase();
            
            //retorna o objeto
            return $result;
    }
}
?>