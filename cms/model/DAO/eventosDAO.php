<?php


  class EventoDAO{

    //Iniciando a varíavel em null para não haver erro
    private $path_local;

    //Atributo que será instânciado para fazer a conexão
    private $conexao;

    //Método construct é chamado assim que a classe é instânciada
    public function __construct(){
      //Variável que recebe a variável de sessão
      $path_local = $_SESSION['path_local'];

      //Importando a classe de conexao para fazer a instância
      require_once "$path_local/cms/model/DAO/conexao.php";

      //instanciando a classe de conexão
      $this->conexao = new Conexao();
    }

    //método que insere o evento no banco
    //passando como parametro uma variável do tipo Evento
    public function insertEvento(Eventos $eventos){

      //Inserindo no banco
      $insertSql = "INSERT INTO tbl_eventos (titulo, descricao, localidade, dt_evento, status)
      VALUES('".$eventos->getTitulo()."', '".$eventos->getDescricao()."','".$eventos->getLocalidade()."', '".$eventos->getDataEvento()."', '".$eventos->getStatus()."')";


      //Método que faz a conexão com o banco
      $conn = $this->conexao->connectDatabase();

      //executando o script de insert no banco
      if(!$conn->query($insertSql)){
        echo "Erro no script de insert";
      }

      //fechando a Conexao
      $this->conexao->closeDatabase();
    }


    //Função que deleta um evento do banco
    public function deleteEvento($idEvento){

      //script delete
      $deleteSql = "DELETE FROM tbl_eventos WHERE id_eventos=".$idEvento;

      //Recebendo a método que faz a conexão com o banco de dados
      $conn = $this->conexao->connectDatabase();

      //Executa o script de delete no banco
      if(!$conn->query($deleteSql)){
        echo "Erro no script de delete";

      }

      //fechando a conexao com o banco
      $this->conexao->closeDatabase();

    }


    //Função para atualizar um evento no banco
    public function updateEvento(Eventos $eventos, $idEventos){

      //script do update
      $updateSql = "UPDATE tbl_eventos
                    SET titulo = '".$eventos->getTitulo()."',
                    descricao = '".$eventos->getDescricao()."',
                    localidade = '".$eventos->getLocalidade()."',
                    dt_evento = '".$eventos->getDataEvento()."',
                    status = '".$eventos->getStatus()."'
                    WHERE id_eventos=".$idEventos;

      $conn = $this->conexao->connectDatabase();

      if(!$conn->query($updateSql)){
        echo "Erro no script de update";
      }

      $this->conexao->closeDatabase();

    }


      //listar todos os eventos do banco
      public function selectAllEventos(){

      //script dos selects
      $selectAllSql = "SELECT * FROM tbl_eventos WHERE status = 1 ORDER BY id_eventos DESC";

      //Método que faz a conexão com o banco
      $conn = $this->conexao->connectDatabase();

      //executando o select
      $select = $conn->query($selectAllSql);

      //Contador iniciando em 0
      $cont = 0;

      //Loop que coloca todo os eventos em um rs
      while($rsEventos = $select->fetch(PDO::FETCH_ASSOC)){
        //Array de dados do tipo Evento
        $eventos[] = new Eventos();

        //Setando os valores do obj
        $eventos[$cont]->setIdEventos($rsEventos['id_eventos']);
        $eventos[$cont]->setTitulo($rsEventos['titulo']);
        $eventos[$cont]->setDescricao($rsEventos['descricao']);
        $eventos[$cont]->setLocalidade($rsEventos['localidade']);
        $eventos[$cont]->setDataEvento($rsEventos['dt_evento']);
        $eventos[$cont]->setStatus($rsEventos['status']);

        //incrementando o cont
        $cont += 1;

      }

      //Fechando a conexão com o banco de dados
      $this->conexao->closeDatabase();

      //retornando o array
      return $eventos;
    }

    //Método que busca um evento através do ID
    public function selectByIdEvento($idEvento){

      //script para buscar um evento por ID
      $selectByIdEventoSql = "SELECT * FROM tbl_eventos WHERE id_eventos =".$idEvento;

      //método que faz a conexão com o banco
      $conn = $this->conexao->connectDatabase();

      //executando o script no banco
      $select = $conn->query($selectByIdEventoSql);

      //Verifica se o rs recebeu o registro
      if($rsEventos = $select->fetch(PDO::FETCH_ASSOC)){

        //Instância da classe eventos
        $eventos = new Eventos();

        //Setando os valores do obj
        $eventos->setIdEventos($rsEventos['id_eventos']);
        $eventos->setTitulo($rsEventos['titulo']);
        $eventos->setDescricao($rsEventos['descricao']);
        $eventos->setLocalidade($rsEventos['localidade']);
        $eventos->setDataEvento($rsEventos['dt_evento']);
        $eventos->setStatus($rsEventos['status']);
      }

      //fechando a conexao com o banco de dados
      $this->conexao->closeDatabase();

      //Retornando o obj
      return $eventos;

    }

}


?>
