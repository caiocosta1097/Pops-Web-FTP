<?php

/*

  Projeto: Pop'Soda Drink
  Autor: Caio
  Data Criação: 23/04/2019

  Data Modificação:
  Conteúdo Modificação:
  Autor Modificação:

  Objetivo da Classe: Controller de Componente

 */

class ControllerComponente
{

  // Iniciando a variável em null para não haver erro
  private $path_local;

  // Atributo que será instânciado
  private $componenteDAO;

  function __construct()
  {

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    // Importando a classe Setor
    require_once "$path_local/cms/model/componente.php";

    // Importando a classe SetorDAO
    require_once "$path_local/cms/model/DAO/componenteDAO.php";

    // Instânciando a classe SetorDAO
    $this->componenteDAO = new ComponenteDAO();

  }

  public function inserirRegistro()
  {

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Instânciando a classe
      $componente = new Componente();

      // Guardando os dodos no objeto
      $componente->setNome($_POST['txt_componente']);
      $componente->setTipo($_POST['select_tipo']);
      $componente->setQtd($_POST['txt_qtd']);
      $componente->setValorUnitario($_POST['txt_valor']);
      $componente->setLocalizacao($_POST['txt_localizacao']);
      $componente->setDescricao($_POST['txt_descricao']);
      $componente->setIpi($_POST['txt_ipi']);
      $componente->setDemandaMensal($_POST['txt_demanda_mensal']);
      $componente->setTempoRessuprimento($_POST['txt_tempo_ressuprimento']);
      $componente->setIntervaloRessuprimento($_POST['txt_intervalo_ressuprimento']);
      $componente->setEstoqueSeguranca($_POST['txt_estoque_seguranca']);
      $componente->setPontoRessuprimento($_POST['txt_ponto_ressuprimento']);
      $componente->setLoteCompras($_POST['txt_lote_compras']);
      $componente->setEstoqueMaximo($_POST['txt_estoque_maximo']);
      $componente->setStatus($_POST['select_status']);

      // Insere o registro no BD
      $this->componenteDAO->insert($componente);

    }

  }

  public function excluirRegistro()
  {

    $id = $_GET['id'];

    $this->componenteDAO->delete($id);

  }

  public function atualizarRegistro()
  {

    $id = $_GET['id'];

    // Verifica qual método está sendo requisitado do formulário (POST ou GET)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Instânciando a classe
      $componente = new Componente();

      // Guardando os dodos no objeto
      $componente->setNome($_POST['txt_componente']);
      $componente->setTipo($_POST['select_tipo']);
      $componente->setQtd($_POST['txt_qtd']);
      $componente->setValorUnitario($_POST['txt_valor']);
      $componente->setLocalizacao($_POST['txt_localizacao']);
      $componente->setDescricao($_POST['txt_descricao']);
      $componente->setIpi($_POST['txt_ipi']);
      $componente->setDemandaMensal($_POST['txt_demanda_mensal']);
      $componente->setTempoRessuprimento($_POST['txt_tempo_ressuprimento']);
      $componente->setIntervaloRessuprimento($_POST['txt_intervalo_ressuprimento']);
      $componente->setEstoqueSeguranca($_POST['txt_estoque_seguranca']);
      $componente->setPontoRessuprimento($_POST['txt_ponto_ressuprimento']);
      $componente->setLoteCompras($_POST['txt_lote_compras']);
      $componente->setEstoqueMaximo($_POST['txt_estoque_maximo']);
      $componente->setStatus($_POST['select_status']);

      // Insere o registro no BD
      $this->componenteDAO->update($componente, $id);

    }

  }

  public function listarRegistros()
  {

    return $this->componenteDAO->selectAll();

  }

  public function listarMateriaPrima()
  {

    return $this->componenteDAO->selectMateriaPrima();

  }

  public function listarEmbalagem()
  {

    return $this->componenteDAO->selectEmbalagem();

  }

  public function buscarRegistro()
  {

    $id = $_GET['id'];

    return $this->componenteDAO->selectById($id);

  }

}

 ?>
