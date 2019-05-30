<?php

/*

Projeto: Pop'Soda Drink
Autor: Caio
Data Criação: 25/04/2019

Data Modificação:
Conteúdo Modificação:
Autor Modificação:

Objetivo da Classe: Controller de Brindes

*/

class ControllerBrinde
{



  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $brindeDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];
    $path_url = $_SESSION['path_url'];

    // Importando a classe do objeto
    require_once "$path_local/cms/model/brinde.php";

    // Importando a classe de upload
	  require_once "$path_local/cms/upload.php";

    // Importando a classe DAO do objeto
    require_once "$path_local/cms/model/DAO/brindeDAO.php";

    // Instânciando a classe do DAO do objeto
    $this->brindeDAO = new BrindeDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Instânciando a classe do objeto
      $brinde = new Brinde();

      // Guardando os dodos no objeto
      $brinde->setNome($_POST['txt_brinde']);
      $brinde->setValorUnitario($_POST['txt_valor_unitario']);
      $brinde->setDescricao($_POST['txt_descricao']);
      $brinde->setPeso($_POST['txt_peso']);
      $brinde->setVolume($_POST['txt_volume']);
      $brinde->setImagem(upload($_FILES['file_img']));
      $brinde->setStatus($_POST['select_status']);

      // Insere o registro no BD
      $this->brindeDAO->insert($brinde);

    }

  }

  public function excluirRegistro()
  {

    // Pega o id via GET
    $id = $_GET['id'];

    // Deleta o registro do BD
    $this->brindeDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    // Pega o id via GET
    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Instânciando a classe do objeto
      $brinde = new Brinde();

      $imagemBanco = $_SESSION['imagem'];

      $imagem = upload($_FILES['file_img']);

      if ($imagem == "")
        $imagem = $imagemBanco;

      // Guardando os dodos no objeto
      $brinde->setNome($_POST['txt_brinde']);
      $brinde->setValorUnitario($_POST['txt_valor_unitario']);
      $brinde->setDescricao($_POST['txt_descricao']);
      $brinde->setPeso($_POST['txt_peso']);
      $brinde->setVolume($_POST['txt_volume']);
      $brinde->setImagem($imagem);
      $brinde->setStatus($_POST['select_status']);

      // Atualiza o registro no BD
      $this->brindeDAO->update($brinde, $id);

    }

  }

  public function listarRegistros()
  {

    // Retorna todos os registros
    return $this->brindeDAO->selectAll();

  }

  public function buscarRegistro()
  {

    // Pega o id via GET
    $id = $_GET['id'];

    // Retorna o registro a partir do id
    return $this->brindeDAO->selectById($id);

  }

  public function adicionarCarrinho($acao, $id)
  {

    // Pega o id via GET
    // $id = $_GET['id'];

    //verifica se o item já existe no carrinho
    if(array_key_exists($id, $_SESSION['carrinho'])){



      if($acao == 'mais'){
        echo $id;
        $_SESSION['carrinho'][$id]['quantidade'] += 1;
      } else if ($acao == 'menos'){
        $_SESSION['carrinho'][$id]['quantidade'] -= 1;
      }

      //se existe, retorna a mensagem
      $quantidade = $_SESSION['carrinho'][$id]['quantidade'];
      $listaProduto = $this->brindeDAO->selectById($id);
    } else {
      //criando um novo produto
      $brindeDAO = new BrindeDAO();

      $listaProduto = $this->brindeDAO->selectById($id);
      $_SESSION['carrinho'][$id]['quantidade'] = 1;
      $quantidade = $_SESSION['carrinho'][$id]['quantidade'];
    }
    $subtotal = $listaProduto->getValorUnitario() *  $_SESSION['carrinho'][$id]['quantidade'] ;

    //se não, adiciona o item ao carrinho com as informações do produto
		$_SESSION['carrinho'][$id] = array('id'=>$listaProduto->getId(), 'nome'=>$listaProduto->getNome(), 'valorUnitario'=>$listaProduto->getValorUnitario(), 'quantidade'=>$quantidade, 'subtotal'=>$subtotal,'imagem'=>$listaProduto->getImagem());

    if($acao == 'mais'){
      $_SESSION['totalCarrinho'] += $listaProduto->getValorUnitario();
    } else if ($acao == 'menos') {
      $_SESSION['totalCarrinho'] -= $listaProduto->getValorUnitario();
    }

    $total = count($_SESSION['carrinho']);

    return '$total';

  }

}

?>
