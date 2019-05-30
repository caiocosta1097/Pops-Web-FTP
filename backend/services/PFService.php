<?php
    @session_start();

    $path_url = "http://".$_SERVER['HTTP_HOST']."/web";
    $path_local = $_SERVER['DOCUMENT_ROOT']."/web";

    $pfBusiness = "";
    require_once "../business/PessoaFisicaBusiness.php";
    require_once "$path_local/cms/upload.php";
    require_once "$path_local/cms/controller/controllerBrinde.php";
    $pfBusiness = new PessoaFisicaBusiness();
    $controllerBrinde = new ControllerBrinde();

    if(isset($_GET['op'])){
        $op = $_GET['op'];

        if($op=='login'){
            $cpf = $_POST['cpf'];
            $password = $_POST['senha'];
            //callback
            echo json_encode($pfBusiness->loginPessoaFisica($cpf, $password));
        }

        if($op=='dashboard'){
            $id_p_fisica = $_COOKIE['id_p_fisica'];

            echo json_encode($pfBusiness->selectByIdPessoaFisica($id_p_fisica));
        }

        if($op=='addComentario'){
            $id_p_fisica = $_COOKIE['id_p_fisica'];
            $comentario = $_POST['txtComentario'];
            $status = 0;

            //callback
            echo json_encode($pfBusiness->insertComentario(
                $id_p_fisica,
                $comentario,
                $status
            ));
        }

    }

    if(isset($_GET['acao'])){
      $acao = $_GET['acao'];
      $id = $_POST['id'];

        echo json_encode($controllerBrinde->adicionarCarrinho($acao, $id));

    }
?>
