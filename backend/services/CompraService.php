<?php
    @session_start();
    $path_url = "http://".$_SERVER['HTTP_HOST']."/Tcc";
    $path_local = $_SERVER['DOCUMENT_ROOT']."/Tcc";

    $buyBusiness = "";
    require_once "../business/CompraBusiness.php";
    $buyBusiness = new CompraBusiness();
   

    if(isset($_GET['op'])){
        $op = $_GET['op'];
        if($op=='buy'){
            $cnpj = $_COOKIE['cnpj'];
            $valor_total = $_POST['valor_total'];
            $peso_total = $_POST['peso_total'];
            $volume_total = $_POST['volume_total'];
            $status = $_POST['status'];
            $status_pedido = $_POST['status_pedido'];
            $logradouro = $_POST['logradouro'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $dt_compra = $_POST['dt_compra'];
            //callback
            echo json_encode($buyBusiness->addNewCompra(
                $cnpj,
                $valor_total,
                $peso_total,
                $volume_total,
                $status,
                $status_pedido,
                $logradouro,
                $bairro,
                $cidade,
                $uf,
                $dt_compra
            ));
        }

        if($op=='pedidos'){
            $cnpj = $_COOKIE['cnpj'];

            echo json_encode($buyBusiness->getCompras($cnpj));
        }

    }
?>