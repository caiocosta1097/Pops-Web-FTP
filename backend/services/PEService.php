<?php

    @session_start();

    $path_url = "http://".$_SERVER['HTTP_HOST']."/web";
    $path_local = $_SERVER['DOCUMENT_ROOT']."/web";

    $peBusiness =  "";
    require_once "../business/PopsEscolaBusiness.php";
    
    $peBusiness = new PopsEscolaBusiness();

    if(isset($_GET['op'])){
        $op = $_GET['op'];

        if($op == 'addEscola'){
            $nome = $_POST['txtNome'];
            $telefone = $_POST['txtTelefone'];
            $responsavel = $_POST['txtResponsavel'];
            $localidade = $_POST['txtLocalidade'];
            $cnpj = $_POST['txtCnpj'];
            $motivo = $_POST['txtMotivo'];
            $email = $_POST['txtEmail'];

            echo json_encode($peBusiness->insertPopsEscola(
                $nome,
                $telefone,
                $responsavel,
                $localidade,
                $cnpj,
                $motivo,
                $email
            ));
        }

    }


?>