<?php
  class PaginaEscolaDAO{

    // Iniciando a variável em null para não haver erro
    private $path_local;

    // Atributo que será instânciado
    private $conexao;

    function __construct()
    {

      // Variável que recebe a variáveil de sessão
      $path_local = $_SESSION['path_local'];

      // Importanto a classe de conexão com BD
      require_once "$path_local/cms/model/DAO/conexao.php";

      // Instânciando a classe de Conexão
      $this->conexao = new Conexao();

    }

    public function insert(PaginaEscola $paginaEscola)
    {

      // Query de insert
      $sql = "INSERT INTO tbl_pops_nas_escolas(descricao, img_1, img_2, img_3, img_4 ) VALUES ('".$paginaEscola->getDescricao()."', '".$paginaEscola->getImagem1()."', '".$paginaEscola->getImagem2()."', '".$paginaEscola->getImagem3()."', '".$paginaEscola->getImagem4()."')";
      echo $sql;
      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executa o script no BD
      if (!$con->query($sql))
      echo 'Erro no script de insert';

      // Fechando a conexão com BD
      $this->conexao->closeDatabase();

    }

    public function update(PaginaEscola $paginaEscola, $id)
    {

      // Query de update
      $sql = "UPDATE tbl_pops_nas_escolas SET descricao ='".$paginaEscola->getDescricao()."' WHERE id_p_escola=".$id;

      // Recebendo a função que faz a conexão com BD
      $con = $this->conexao->connectDatabase();

      // Executa o script no BD
      if (!$con->query($sql))
      echo 'Erro no script de update';

      // Fechando a conexão com BD
      $this->conexao->closeDatabase();

    }

    // Função lista todos os registros do banco
      public function selectAll()
      {

        // Query de select
        $sql = "SELECT * FROM tbl_pops_nas_escolas ORDER BY id_p_escola DESC";

        // Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();

        // Executando o select
        $select = $con->query($sql);

        // Contador
        $cont = 0;

        // Loop que coloca todos os registros em um result set
        while ($rsConteudo = $select->fetch(PDO::FETCH_ASSOC)) {

          // Array de dados do tipo Setor
          $paginaEscolas[] = new paginaEscola();

          // Setando os valores do objeto
          $paginaEscolas[$cont]->setId($rsConteudo['id_p_escola']);
          $paginaEscolas[$cont]->setDescricao($rsConteudo['descricao']);


          $cont += 1;
        }

        // Fechando a conexão com BD
        $this->conexao->closeDatabase();

        // Retorna o array
        return $paginaEscolas;

      }

      // Função deleta um registro no banco
      public function delete($id)
      {

        // Query de delete
        $sql = "DELETE FROM tbl_pops_nas_escolas WHERE id_p_escola=".$id;

        // Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();

        // Executa o script no BD
        if (!$con->query($sql))
        echo 'Erro no script de delete';

        // Fechando a conexão com BD
        $this->conexao->closeDatabase();

      }

      // Função busca um registro no banco atráve do id
      public function selectById($id) {

        // Query de select + id
        $sql = "SELECT * FROM tbl_pops_nas_escolas WHERE id_p_escola =".$id;

        // Recebendo a função que faz a conexão com BD
        $con = $this->conexao->connectDatabase();

        // Executando o select
        $select = $con->query($sql);

        // Verifica se o result set recebeu o registro
        if ($rsConteudo = $select->fetch(PDO::FETCH_ASSOC)) {

          // Instância da classe Setor
          $paginaEscola = new PaginaEscola();

          // Setando os valores do objeto
          $paginaEscola->setId($rsConteudo['id_p_escola']);

          $paginaEscola->setDescricao($rsConteudo['descricao']);

          $paginaEscola->setImagem1($rsConteudo['img_1']);


        }

        // Fechando a conexão com BD
        $this->conexao->closeDatabase();

        // Retornando o objeto
        return $paginaEscola;

      }


  }

 ?>
