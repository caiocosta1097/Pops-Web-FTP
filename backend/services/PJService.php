<?php
    @session_start();
    $path_url = "http://".$_SERVER['HTTP_HOST']."/web";
    $path_local = $_SERVER['DOCUMENT_ROOT']."/web";

    $pjBusiness = "";
    require_once "../business/PessoaJuridicaBusiness.php";
    require_once "$path_local/cms/upload.php";
    require_once "$path_local/cms/controller/controllerProduto.php";

    $pjBusiness = new PessoaJuridicaBusiness();
    $controllerProduto = new ControllerProduto();

    if(isset($_GET['op'])){
        $op = $_GET['op'];
        if($op=='login'){
            $cnpj = $_POST['cnpj'];
            $password = $_POST['senha'];
            //callback
            echo json_encode($pjBusiness->login($cnpj, $password));
        }
        if($op=='dashboard'){
            $cnpj = $_COOKIE['cnpj'];
            //callback
            echo json_encode($pjBusiness->selectByCnpj($cnpj));
        }
        if($op=='perfis'){
            $cnpj = $_COOKIE['cnpj'];
            //callback
            echo json_encode($pjBusiness->selectPerfis($cnpj));
        }
        if($op=='ads'){
            $cnpj = $_COOKIE['cnpj'];
            //callback

            echo json_encode($pjBusiness->selectAnuncios($cnpj));
        }
        if($op=='addProfile'){

             $responsavel = $_POST['txt_responsavel'];
             $foto = upload($_FILES['ipt_foto']);
             $email = $_POST['txt_email'];
             $cel = $_POST['txt_cel'];
             $tel = $_POST['txt_tel'];
             $user = $_POST['txt_user'];
             $senha = $_POST['txt_senha'];
             $status = 0;
             $cnpj = $_COOKIE['cnpj'];

            //armazenando a quantidade de linhas que a query retornará
             $numProfileAdded = $pjBusiness->getPerfisAdicionados($cnpj);

             //caso o a quantidade seja menor q 3 o usuário poderá adicionar outros perfis
            if($numProfileAdded < 3) {
                //callback
                echo json_encode($pjBusiness->insertNewProfile(
                    $responsavel,
                    $email,
                    $cel,
                    $tel,
                    $user,
                    $senha,
                    $status,
                    $foto,
                    $cnpj
                ));
            } else {
                echo json_encode(array("success"=>false, "message"=>"Limite de perfis já alcançado!"));
            }
        }
        if($op=='addAnuncio'){
            //resgatando valores
            $foto = upload($_FILES['flt_anuncio']);
            $desc = $_POST['txtadescricao'];
            $status = 0;
            $cnpj = $_COOKIE['cnpj'];

            //callback
            echo json_encode($pjBusiness->insertNewAd(
                   $foto,
                   $desc,
                   $status,
                   $cnpj
               ));

       }
       if($op=='updateAnuncio'){
            //resgatando valores
            $foto = upload($_FILES['flt_anuncio']);
            $desc = $_POST['txtadescricao'];
            $status = 0;
            $idAnuncio = $_COOKIE['idAnuncio'];


            if($foto != ""){
                //callback
                echo json_encode($pjBusiness->updateAd(
                    $foto,
                    $desc,
                    $status,
                    $idAnuncio
                ));
            } else {
                 //callback
                 echo json_encode($pjBusiness->updateAd(
                    null,
                    $desc,
                    $status,
                    $idAnuncio
                ));
            }

   }
       if($op=='ad_by_id'){
        //resgatando valores
        $id = $_POST['idAd'];

        //callback
        echo json_encode($pjBusiness->selectAdById($id));

   }
   if($op=='updatePerfil'){
    //resgatando valores
    $responsavel = $_POST['txt_responsavel'];
    $foto = upload($_FILES['ipt_foto']);
    $email = $_POST['txt_email'];
    $cel = $_POST['txt_cel'];
    $tel = $_POST['txt_tel'];
    $user = $_POST['txt_user'];
    $senha = $_POST['txt_senha'];
    $status = 0;
    $id = $_COOKIE['idPerfil'];

    if($foto != ""){
        //callback
        echo json_encode($pjBusiness->updatePerfil(
            $responsavel,
                    $email,
                    $cel,
                    $tel,
                    $user,
                    $senha,
                    $status,
                    $foto,
                   $id
        ));
    } else {
         //callback
         echo json_encode($pjBusiness->updatePerfil(
            $responsavel,
                    $email,
                    $cel,
                    $tel,
                    $user,
                    $senha,
                    $status,
                    null,
                   $id
        ));
    }
}
if($op=='perfil_by_id'){
    //resgatando valores
    $id = $_POST['idPerfil'];
    //callback
    echo json_encode($pjBusiness->selectPerfilById($id));
    }
}

  if(isset($_GET['acao'])){
    $acao = $_GET['acao'];
    $id = $_POST['id'];

      echo json_encode($controllerProduto->adicionarFardo($acao, $id));

  }

?>
