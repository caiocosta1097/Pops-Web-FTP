<?php
    @session_start();
    $path_url = "http://".$_SERVER['HTTP_HOST']."/web";
    $path_local = $_SERVER['DOCUMENT_ROOT']."/web";

    $enqBusiness = "";
    require_once "../business/EnqueteBusiness.php";
    $enqBusiness = new EnqueteBusiness();
   

    if(isset($_GET['op'])){
        $op = $_GET['op'];
        if($op=='answer'){
            $id_resposta = $_POST['id_resposta'];
           
            $id_enq = $_POST['id_enq'];
            //callback
            echo json_encode($enqBusiness->answer($id_resposta, $id_enq));
        }
    }
?>
