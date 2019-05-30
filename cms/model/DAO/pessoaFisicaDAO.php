<?php

/*

Projeto: Pop'Soda Drink
Autor: Vitoria
Data Criação: 25/04/2019

Objetivo da Classe: CRUD da classe da  pessoa fisica

*/

class PessoaFisicaDAO
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $conexao;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local' ];

    // Importanto a classe de conexão com BD
    require_once "$path_local/cms/model/DAO/conexao.php";

    // Instânciando a classe de Conexão
    $this->conexao = new Conexao();

  }

  public function insert(PessoaFisica $pessoaFisica){
    $nome = $pessoaFisica->getNome();
    $cpf = $pessoaFisica->getCpf();
    $imagem= $pessoaFisica->getImagem();
    $email= $pessoaFisica->getEmail();
    $telefone = $pessoaFisica->getTelefone();
    $celular= $pessoaFisica->getCelular();
    $usuario= $pessoaFisica->getUsuario();
    $senha= $pessoaFisica->getSenha();
    $dtNasc = $pessoaFisica ->getDtNasc();
    $status = $pessoaFisica->getStatus();
    $logradouro= $pessoaFisica->getLogradouro();
    $bairro= $pessoaFisica->getBairro();
    $cidade= $pessoaFisica->getCidade();
    $uf= $pessoaFisica->getUf();
    $numero= $pessoaFisica->getNumero();
    $cep = $pessoaFisica->getCep();


    // Query de insert
    $sql = "CALL sp_pf
    (
      '$nome',
      '$cpf',
      '$imagem',
      '$email',
      '$telefone',
      '$celular',
      '$usuario',
      '$senha',
      '$dtNasc',
      '$status',
      '$logradouro',
      '$bairro',
      '$cidade',
      '$uf',
      '$numero',
      '$cep'

      )";

      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executa o script no BD
      if (!$con->query($sql))
      echo 'Erro no script de insert';
      else
      echo "<script> alert('Cadastro efetuado com sucesso');</script>";

      // Fechando a conexão com BD
      $this->conexao->closeDatabase();

    }



  // Função lista todos os registros do banco
  public function selectAll()
  {

    // Query de select
    $sql = "SELECT * FROM tbl_pessoa_fisica ORDER BY id_p_fisica DESC";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Contador
    $cont = 0;

    // Loop que coloca todos os registros em um result set
    while ($rsPessoaFisica = $select->fetch(PDO::FETCH_ASSOC)) {

      // Array de dados do Objeto
      $pessoaFisica[] = new PessoaFisica();

      // Setando os valores do objeto
      $pessoaFisica[$cont]->setId($rsPessoaFisica['id_p_fisica']);
      $pessoaFisica[$cont]->setNome($rsPessoaFisica['nome']);
      $pessoaFisica[$cont]->setEmail($rsPessoaFisica['email']);

      $cont += 1;

    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retorna o array
    return $pessoaFisica;

  }

  // Função busca um registro no banco atráve do id
  public function selectById($id)
  {

    // Query de select + id
    $sql = "SELECT pf.*, e.*
            FROM tbl_pessoa_fisica AS pf
            INNER JOIN tbl_p_fisica_endereco AS pfe ON pfe.id_p_fisica = pfe.id_p_fisica
            INNER JOIN tbl_endereco AS e ON pfe.id_endereco = e.id_endereco WHERE pf.id_p_fisica = $id";

    // Recebendo a função que faz a conexão com BD
    $con = $this->conexao->connectDatabase();

    // Executando o select
    $select = $con->query($sql);

    // Verifica se o result set recebeu o registro
    if ($rsPessoaFisica = $select->fetch(PDO::FETCH_ASSOC)) {

      // Instância da classe Setor
      $pessoaFisica = new PessoaFisica();

      // Setando os valores do objeto
      $pessoaFisica->setId($rsPessoaFisica['id_p_fisica']);
      $pessoaFisica->setNome($rsPessoaFisica['nome']);
      $pessoaFisica->setCpf($rsPessoaFisica['cpf']);
      $pessoaFisica->setImagem($rsPessoaFisica['foto']);
      $pessoaFisica->setEmail($rsPessoaFisica['email']);
      $pessoaFisica->setCelular($rsPessoaFisica['celular']);
      $pessoaFisica->setStatus($rsPessoaFisica['status']);
      $pessoaFisica->setLogradouro($rsPessoaFisica['logradouro']);
      $pessoaFisica->setBairro($rsPessoaFisica['bairro']);
      $pessoaFisica->setCidade($rsPessoaFisica['cidade']);
      $pessoaFisica->setUf($rsPessoaFisica['uf']);
    }

    // Fechando a conexão com BD
    $this->conexao->closeDatabase();

    // Retornando o objeto
    return $pessoaFisica;

  }

}

?>
