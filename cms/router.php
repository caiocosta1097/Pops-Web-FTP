<?php

// Iniciando uma sessão
session_start();

// Variáveis locais para o controller e o modo
$controller = null;
$modo = null;

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se a variável 'controller' existe
if (isset($_GET['controller'])) {

  // Pegando os valores via GET e setando em variáveis locais com caixa alta
  $controller = strtoupper($_GET['controller']);
  $modo = strtoupper($_GET['modo']);

  // Verifica qual é o controller
  switch ($controller) {

    case 'SETOR':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerSetor.php";

    // Instância da Controller do Setor
    $controllerSetor = new ControllerSetor();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerSetor->inserirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>setor();</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerSetor->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>setor();</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerSetor->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>setor();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $setor = $controllerSetor->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/setor/formulario.php";

      break;

    }

    break;

    case 'ENQUETE':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerEnquete.php";

    // Instância da Controller do Setor
    $controllerEnquete = new ControllerEnquete();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerEnquete->inserirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>enquetes();</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerEnquete->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de enquete
      echo "<script>enquetes();</script>";

      break;


      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerEnquete->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>enquetes();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $enquete = $controllerEnquete->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/enquetes/formulario.php";

      break;
    }

    break;

    case 'ESCOLA':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerPops_Nas_Escolas.php";

    // Instância da Controller do Setor
    $controllerEscola = new ControllerEscolas();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {
      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerEscola->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>pops_nas_escolas();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $escola = $controllerEscola->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/pops_nas_escolas/modal.php";

      break;
    }

    break;

    case 'CARGO':

    // Importando a classe Controller do Cargo
    require_once "$path_local/cms/controller/controllerCargo.php";

    // Instância da Controller do Setor
    $controllerCargo = new ControllerCargo();

    // Verifica qual é o modo do controller de cargo
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerCargo->inserirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>adm_cms('cargo');</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerCargo->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>adm_cms('cargo');</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerCargo->excluirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>adm_cms('cargo');</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $cargo = $controllerCargo->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/cargo/formulario.php";

      break;

    }

    break;

    case 'VIDEOS':

    // Importando a classe Controller do Cargo
    require_once "$path_local/cms/controller/controllerVideos.php";

    // Instância da Controller do Setor
    $controllerVideo = new ControllerVideo();

    switch ($modo) {
      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerVideo->inserirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>videos();</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de inserir um novo registro
      $controllerVideo->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>videos();</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de inserir um novo registro
      $controllerVideo->excluirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>videos();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de inserir um novo registro
      $video = $controllerVideo->buscarRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      require_once "$path_local/cms/view/videos/formulario.php";

      break;

    }

    break;

    case 'FALECONOSCO':

    // Importando a classe Controller do Cargo
    require_once "$path_local/cms/controller/controllerFaleConosco.php";

    // Instância da Controller do Setor
    $controllerFaleConosco = new ControllerFaleConosco();

    // Verifica qual é o modo do controller de cargo
    switch ($modo) {


      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerFaleConosco->excluirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>fale_conosco();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $fale_conosco = $controllerFaleConosco->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/faleConosco/formulario.php";

      break;

    }

    break;

    case 'HISTORIA_MARCA':

    // Importando a classe Controller do Cargo
    require_once "$path_local/cms/controller/controllerHistoriaMarca.php";

    // Instância da Controller do Setor
    $controllerHistoriaMarca = new ControllerHistoriaMarca();

    // Verifica qual é o modo do controller de cargo
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerHistoriaMarca->inserirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>historia_marca();</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerHistoriaMarca->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>historia_marca();</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerHistoriaMarca->excluirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>historia_marca();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $historia_marca = $controllerHistoriaMarca->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/historia_marca/formulario.php";

      break;

    }

    break;

    case 'SOBRE':

    // Importando a classe Controller do Cargo
    require_once "$path_local/cms/controller/controllerSobre.php";

    // Instância da Controller do Setor
    $controllerSobre = new ControllerSobre();

    // Verifica qual é o modo do controller de cargo
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerSobre->inserirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>sobre();</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerSobre->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>sobre();</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerSobre->excluirRegistro();

      // Chamando a função que preenche a página com a lista de cargos
      echo "<script>sobre();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $sobre = $controllerSobre->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/sobre/formulario.php";

      break;

    }

    break;

    case 'EVENTOS':

    // Importando a classe Controller do eventos
    require_once "$path_local/cms/controller/controllerEventos.php";

    // Instância da Controller do eventos
    $controllerEventos= new ControllerEventos();

    // Verifica qual é o modo do controller de eventos
    switch ($modo) {

      case 'INSERIR':

        // Chamando o método de inserir um novo eventos
        $controllerEventos->inserirEvento();

        // // Chamando a função que preenche a página com a lista de eventos
         echo "<script>eventos();</script>";

      break;

      case 'ATUALIZAR':

        // Chamando o método de atualizar um registro
        $controllerEventos->atualizarEvento();

        // Chamando a função que preenche a página com a lista de eventos
        echo "<script>eventos();</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um eventos
      $controllerEventos->excluirEvento();

      // Chamando a função que preenche a página com a lista de eventos
      echo "<script>eventos();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um evento
      $eventos = $controllerEventos->buscarEvento();

      // Importando o formulário
      require_once "$path_local/cms/view/eventos/formulario.php";

      break;

    }

    break;

    case 'NOSSOSPATROCINIOS':

    // Importando a classe Controller do patrocinios
    require_once "$path_local/cms/controller/controllerNossosPatrocinios.php";

    // Instância da Controller do patrocinios
    $controllerNossosPatrocinios = new ControllerNossosPatrocinios();

    // Verifica qual é o modo do controller de patrocinios
    switch ($modo) {

      case 'INSERIR':

        // Chamando o método de inserir um novo patrocinios
        $controllerNossosPatrocinios->inserirPatrocinio();

        // Chamando a função que preenche a página com a lista de patrocinios
        echo "<script>nossos_patrocinios();</script>";


      break;

      case 'ATUALIZAR':

        // Chamando o método de atualizar um registro
        $controllerNossosPatrocinios->atualizarPatrocinio();

        // Chamando a função que preenche a página com a lista de patrocinios
        echo "<script>nossos_patrocinios();</script>";

      break;

      case 'EXCLUIR':

        // Chamando o método de excluir um patrocinios
        $controllerNossosPatrocinios->excluirPatrocinio();

        // Chamando a função que preenche a página com a lista de patrocinios
        echo "<script>nossos_patrocinios();</script>";

      break;

      case 'BUSCAR':

        // Chamando o método de buscar um patrocinios
        $patrocinios = $controllerNossosPatrocinios->buscarPatrocinio();

        // Importando o formulário
        require_once "$path_local/cms/view/nossos_patrocinios/formulario.php";

      break;

    }

    break;

    case 'NOTICIA':

    // Importando a classe Controller de noticia
    require_once "$path_local/cms/controller/controllerNoticia.php";

    // Instância da Controller de noticia
    $controllerNoticias= new ControllerNoticias();

    // Verifica qual é o modo do controller de noticia
    switch ($modo) {

      case 'INSERIR':

        // Chamando o método de inserir uma nova noticia
        $controllerNoticias->inserirNoticia();

        // Chamando a função que preenche a página com a lista de noticias
        echo "<script>noticia();</script>";


      break;

      case 'ATUALIZAR':

        // Chamando o método de atualizar um registro
        $controllerNoticias->atualizarNoticia();

        // Chamando a função que preenche a página com a lista de noticias
        echo "<script>noticia();</script>";

      break;

      case 'EXCLUIR':

        // Chamando o método de excluir uma noticia
        $controllerNoticias->excluirNoticia();

        // Chamando a função que preenche a página com a lista de noticias
        echo "<script>noticia();</script>";

      break;

      case 'BUSCAR':

        // Chamando o método de buscar um evento
        $noticias = $controllerNoticias->buscarNoticia();

        // Importando o formulário
        require_once "$path_local/cms/view/noticia/formulario.php";

      break;

    }

    break;

    case 'SUSTENTAVEL':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerSustentavel.php";

    // Instância da Controller do Setor
    $controllerSustentavel = new ControllerSustentavel();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {

      case 'INSERIR':

      echo("<script>console.log('uhull')</script>");

      // Chamando o método de inserir um novo registro
      $controllerSustentavel->inserirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>planeta_sustentavel();</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerSustentavel->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>planeta_sustentavel();</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerSustentavel->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>planeta_sustentavel();</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $sustentavel = $controllerSustentavel->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/planeta_sustentavel/formulario.php";

      break;

    }

    break;

    case 'COMPONENTE':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerComponente.php";

    // Instância da Controller do Setor
    $controllerComponente = new ControllerComponente();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerComponente->inserirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('componente');</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerComponente->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('componente');</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerComponente->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('componente');</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $componente = $controllerComponente->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/componente/formulario.php";

      break;

    }

    break;

    case 'BRINDE':

    // Importando a classe Controller
    require_once "$path_local/cms/controller/controllerBrinde.php";

    // Instância da Controller
    $controllerBrinde = new ControllerBrinde();

    // Verifica qual é o modo do controller
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerBrinde->inserirRegistro();

      // Chamando a função que preenche a página com a lista de registros
      echo "<script>adm_cms('brinde');</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerBrinde->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de registros
      echo "<script>adm_cms('brinde');</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerBrinde->excluirRegistro();

      // Chamando a função que preenche a página com a lista de registros
      echo "<script>adm_cms('brinde');</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $brinde = $controllerBrinde->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/brinde/formulario.php";

       break;
    }

    break;

    case 'COMENTARIO':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerComentario.php";

    // Instância da Controller do Setor
    $controllerComentario = new ControllerComentario();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {
      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerComentario->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>comentarios();</script>";

      break;

      case 'STATUS':

      // Chamando o método de excluir um registro
      $controllerComentario->status();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>comentarios();</script>";

      break;
    }

    break;

    case 'COR':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerCor.php";

    //instancia do DAO
    $controllerCor = new ControllerCor();

    //verificação do modo, a ação que o user deseja
    switch($modo){
      case 'INSERIR':
        $controllerCor->inserir();
        // Chamando a função que preenche a página com a lista de setores
        echo "<script>adm_cms('cor');</script>";
        break;

      case 'EXCLUIR':
        $controllerCor->excluir();
        echo "<script>adm_cms('cor');</script>";
        break;

      case 'STATUS':
        echo "<script>console.log('OK');</script>";
        $controllerCor->updateStatus();
        echo "<script>adm_cms('cor');</script>";
        break;
    }

    break;

    //PROMOCAO
    case 'PROMOCAO':

    // Importando a classe Controller da promocao
    require_once "$path_local/cms/controller/controllerPromocao.php";

    // Instância da Controller da promocao
    $controllerPromocao = new ControllerPromocoes();

    // Verifica qual é o modo do controller da promocao
    switch ($modo) {

      case 'INSERIR':

        // Chamando o método de inserir uma nova promocao
        $controllerPromocao->inserirPromocao();

        // Chamando a função que preenche a página com a lista de promocoes
        echo "<script>promocao();</script>";


      break;

      case 'ATUALIZAR':

        // Chamando o método de atualizar um registro
        $controllerPromocao->atualizarPromocao();

        // Chamando a função que preenche a página com a lista de promocoes
        echo "<script>promocao();</script>";

      break;

      case 'EXCLUIR':

        // Chamando o método de excluir uma promocao
        $controllerPromocao->excluirPromocao();

        // Chamando a função que preenche a página com a lista de promocoes
        echo "<script>promocao();</script>";

      break;

      case 'BUSCAR':

        // Chamando o método de buscar uma promocao
        $promocoes = $controllerPromocao->buscarPromocao();

        // Importando o formulário
        require_once "$path_local/cms/view/promocao/formulario.php";

      break;

    }

    break;

    //FUNCIONARIOS
    case 'FUNCIONARIO':

    // Importando a classe Controller de funcionario
    require_once "$path_local/cms/controller/controllerFuncionario.php";

    // Instância da Controller de funcionario
    $controllerFuncionario = new ControllerFuncionarios();

    // Verifica qual é o modo do controller de funcionario
    switch ($modo) {

      case 'INSERIR':

        // Chamando o método de inserir um novo funcionario
        $controllerFuncionario->inserirFuncionario();

        // Chamando a função que preenche a página com a lista de funcionarios
        echo "<script>funcionario();</script>";


        break;

      case 'ATUALIZAR':

        // Chamando o método de atualizar um registro
        $controllerFuncionario->atualizarFuncionario();

        // Chamando a função que preenche a página com a lista de funcionarios
        echo "<script>funcionario();</script>";

      break;

      case 'EXCLUIR':

        // Chamando o método de excluir um funcionario
        $controllerFuncionario->excluirFuncionario();

        // Chamando a função que preenche a página com a lista de funcionarios
        echo "<script>funcionario();</script>";

      break;

      case 'BUSCAR':

        // Chamando o método de buscar um funcionario
        $funcionarios = $controllerFuncionario->buscarFuncionario();

        // Importando o formulário
        require_once "$path_local/cms/view/funcionario/formulario.php";

      break;

    }

     break;

    case 'NIVEL_PERFIL':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerNivelPerfil.php";

    // Instância da Controller do Setor
    $controllerNivelPerfil = new ControllerNivelPerfil();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerNivelPerfil->inserirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('nivel_perfil');</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerNivelPerfil->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('nivel_perfil');</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerNivelPerfil->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('nivel_perfil');</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $nivel_perfil = $controllerNivelPerfil->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/nivel_perfil/formulario.php";

      break;

    }

    break;

    case 'PRODUTO':

    // Importando a classe Controller do obejto
    require_once "$path_local/cms/controller/controllerProduto.php";

    // Instância da Controller do objeto
    $controllerProduto = new ControllerProduto();

    // Verifica qual é o modo do controller
    switch ($modo) {

      case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerProduto->inserirRegistro();

      // Chamando a função que preenche a página com a lista de registros

      // echo "<script>adm_cms('produto');</script>";

      echo "<script>adm_cms('produto');</script>";

      break;

      case 'ATUALIZAR':

      // Chamando o método de atualizar um registro
      $controllerProduto->atualizarRegistro();

      // Chamando a função que preenche a página com a lista de registros
      echo "<script>adm_cms('produto');</script>";

      break;

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerProduto->excluirRegistro();

      // Chamando a função que preenche a página com a lista de registros
      echo "<script>adm_cms('produto');</script>";

      break;

      case 'BUSCAR':

      // Chamando o método de buscar um registro
      $produto = $controllerProduto->buscarRegistro();

      // Importando o formulário
      require_once "$path_local/cms/view/produto/formulario.php";

      break;

    }

    break;

    case 'PESSOAFISICA':

  // Importando a classe Controller da pessoa fisica
  require_once "$path_local/cms/controller/controllerPessoaFisica.php";

  // Instância da Controller do Setor
  $controllerPessoaFisica = new ControllerPessoaFisica();

  // Verifica qual é o modo do controller de setor
  switch ($modo) {

    case 'INSERIR':

      // Chamando o método de inserir um novo registro
      $controllerPessoaFisica->inserirRegistro();

    // Chamando a função que preenche a página com a lista de setores
    echo "<script>adm_cms('pessoaFisica');</script>";

    break;

    case 'ATUALIZAR':

    // Chamando o método de atualizar um registro
    $controllerPessoaFisica->atualizarRegistro();

    // Chamando a função que preenche a página com a lista de setores
    echo "<script>adm_cms('pessoaFisica');</script>";

    break;

    case 'EXCLUIR':

    // Chamando o método de excluir um registro
    $controllerPessoaFisica->excluirRegistro();

    // Chamando a função que preenche a página com a lista de setores
    echo "<script>adm_cms('pessoaFisica');</script>";

    break;

    case 'BUSCAR':

    // Chamando o método de buscar um registro
    $pessoaFisica = $controllerPessoaFisica->buscarRegistro();

    // Importando o formulário
    require_once "$path_local/cms/view/pessoaFisica/formulario.php";

    break;
    }

    break;

    case 'PESSOA_JURIDICA':

      // Importando a classe Controller do Setor
      require_once "$path_local/cms/controller/controllerPessoaJuridica.php";

      // Instância da Controller do Setor
      $controllerPessoaJuridica = new ControllerPessoaJurica();

      // Verifica qual é o modo do controller de setor
      switch ($modo) {

        case 'STATUS':
          echo "<script>console.log('OK');</script>";
          $controllerPessoaJuridica->updateStatus();
          echo "<script>adm_cms('pessoa_juridica');</script>";
          break;
      }

      break;

    case 'ANUNCIO':

    // Importando a classe Controller do Setor
    require_once "$path_local/cms/controller/controllerAnuncio.php";

    // Instância da Controller do Setor
    $controllerAnuncio = new ControllerAnuncio();

    // Verifica qual é o modo do controller de setor
    switch ($modo) {

      case 'EXCLUIR':

      // Chamando o método de excluir um registro
      $controllerAnuncio->excluirRegistro();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('anuncios');</script>";

      break;

      case 'STATUS':

      // Chamando o método de excluir um registro
      $controllerAnuncio->status();

      // Chamando a função que preenche a página com a lista de setores
      echo "<script>adm_cms('anuncios');</script>";

      break;

    }

    break;

  }

}

?>
