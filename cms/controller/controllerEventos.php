<?php


/*

  Projeto: Pop'Soda Drink
  Autor: Murilo
  Data Criação: 10/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Eventos

*/

class ControllerEventos{

  //Iniciando a variavel em null para não haver erro
  private $path_local;

  //Atributo que será instânciado
  private $eventosDAO;


  //Método construct é chamado assim que a classe for instânciada
  public function __construct(){

    //variável que recebe a varíavel de sessão do path_local
    $path_local = $_SESSION['path_local'];

    //Importando a classe Eventos
    require_once "$path_local/cms/model/eventos.php";

    //importando a classe EventosDAO para fazer a instância
    require_once "$path_local/cms/model/DAO/eventosDAO.php";

    //instânciando a classe eventosDAO;
    $this->eventosDAO = new EventoDAO();
  }

  //método para inserir um evento
  public function inserirEvento(){

    //verifica qual método tá sendo requisitado do form (POST ou GET)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      //Resgatando os values dos inputs para fazer o insert
      $txtTituloEvento = $_POST['txtTituloEvento'];
      $txtLocalidadeEvento = $_POST['txtLocalidadeEvento'];
      $txtDescricaoEvento = $_POST['txtDescricaoEvento'];
      $txtDataEvento = $_POST['txtDataEvento'];
      $status = $_POST['select_status'];


      //Instânciando a classe evento
      $eventos = new Eventos();

      //Guardando os dados no objeto Eventos
      $eventos->setTitulo($txtTituloEvento);
      $eventos->setDescricao($txtDescricaoEvento);
      $eventos->setLocalidade($txtLocalidadeEvento);
      $eventos->setDataEvento($txtDataEvento);
      $eventos->setStatus($status);

      //Insere o evento no banco de dados
      $this->eventosDAO->insertEvento($eventos);
    }

  }

  //método para excluir um evento
  public function excluirEvento(){

    //Resgatando o ID via GET
    $idEvento = $_GET['id'];

    //deleta um evento do banco de dados
    $this->eventosDAO->deleteEvento($idEvento);
  }

  //método para atualizar um evento
  public function atualizarEvento(){

    //Resgata o ID via GET do evento para atualizar
    $idEvento = $_GET['id'];

    ////verifica qual método tá sendo requisitado do form (POST ou GET)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $txtTituloEvento = $_POST['txtTituloEvento'];
      $txtDescricaoEvento = $_POST['txtDescricaoEvento'];
      $txtLocalidadeEvento = $_POST['txtLocalidadeEvento'];
      $txtDataEvento = $_POST['txtDataEvento'];
      $status = $_POST['select_status'];

      $eventos = new Eventos();

      //Guardando os dados no objeto Eventos
      $eventos->setTitulo($txtTituloEvento);
      $eventos->setDescricao($txtDescricaoEvento);
      $eventos->setLocalidade($txtLocalidadeEvento);
      $eventos->setDataEvento($txtDataEvento);
      $eventos->setStatus($status);

      //atualiza o registro no banco de dados
      $this->eventosDAO->updateEvento($eventos, $idEvento);
    }

  }


  public function listarEventos(){

    return $this->eventosDAO->selectAllEventos();

  }

  public function buscarEvento(){

    $idEventos = $_GET['id'];

    return $this->eventosDAO->selectByIdEvento($idEventos);

  }


}


?>
