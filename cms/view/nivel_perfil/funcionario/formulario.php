<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

// Verificando se o objeto existe
if (isset($funcionarios)) {

  // Pegando os dados do objeto e setando em variavéis locais
  $idFuncionario = $funcionarios->getMatricula();
  $txtNomeFuncionario = $funcionarios->getNome();
  $txtDataAdmissao = $funcionarios->getDataAdmissao();
  $txtEmailFuncionario = $funcionarios->getEmail();
  $txtUsuario = $funcionarios->getUsuario();
  $txtTelefone = $funcionarios->getTelefone();
  $txtSenha = $funcionarios->getSenha();
  $txtCelular = $funcionarios->getCelular();
  $txtDataNascimento = $funcionarios->getDataNascimento();
  $idCargo = $funcionarios->getIdCargo();
  $idPerfil = $funcionarios->getIdPerfil();
  $status = $funcionarios->getStatus();


  //Função do onclick para saber qual ação chama o router
  $router = "router('funcionario', 'atualizar', '".$idFuncionario."')";

  // Muda o texto do botão e título
  $botao = "Atualizar";
  $titulo = "ATUALIZAR FUNCIONÁRIO";

}else{

  //Função do onclick para saber qual ação chama o router
  $router = "router('funcionario', 'inserir', 0)";

  // Muda o texto do botão e título
  $botao = "Salvar";
  $titulo = "CADASTRAR FUNCIONÁRIO";

}

?>

<div class="title_paginas centralizarX">
   <?= $titulo ?>
</div>
<div class="caixa_form_funcionario centralizarX">
  <form id="form" method="POST" enctype="multipart/form-data">
    <div class="caixa_geral_funcionario">
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtNomeFuncionario">Nome do funcionário:</label><br>
            <input class="inputEventos font-input" type="text" id="txtNomeFuncionario" name="txtNomeFuncionario" value="<?= @$txtNomeFuncionario?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtDataAdmissao">Data de admissão:</label><br>
            <input class="inputEventos font-input largura_data" maxlength="10" type="text" id="txtDataAdmissao" name="txtDataAdmissao" value="<?= @$txtDataAdmissao?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtEmailFuncionario">Email:</label><br>
            <input class="inputEventos font-input" type="text" id="txtEmailFuncionario" name="txtEmailFuncionario" value="<?= @$txtEmailFuncionario?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtUsuario">Usuário:</label><br>
            <input class="inputEventos font-input" type="text" id="txtUsuario" name="txtUsuario" value="<?= @$txtUsuario?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtTelefone">Telefone:</label><br>
            <input class="inputEventos font-input" type="text" id="txtTelefone" name="txtTelefone" value="<?= @$txtTelefone?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtSenha">Senha:</label><br>
            <input class="inputEventos font-input" type="password" id="txtSenha" name="txtSenha" value="<?= @$txtSenha?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtCelular">Celular:</label><br>
            <input class="inputEventos font-input" type="text" id="txtCelular" name="txtCelular" value="<?= @$txtCelular?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade">
            <label class="lblEventos" for="txtDataNascimento">Data de nascimento:</label><br>
            <input class="inputEventos font-input" type="text" id="txtDataNascimento" name="txtDataNascimento" value="<?= @$txtDataNascimento?>">
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade select_funcionario">
            <label class="lblEventos">Cargo:</label><br>
            <select name="select_cargo">
                <option selected disabled>Selecione um cargo:</option>
              <?php
                
              // Importando a controller de cargo
              require_once "$path_local/cms/controller/controllerCargo.php";

              // Instânciando a classe do controler
              $controllerCargo = new ControllerCargo();

              // Result set que recebe os dados
              $rsCargo = $controllerCargo->listarRegistros();

              // Variável do contador
              $cont = 0;

              // Loop para colocar todos os registros no result set
              while ($cont < count($rsCargo)) {

                // Verificando se o select está com o option que corresponde ao cargo do funcionario
                if ($rsCargo[$cont]->getId() == $idCargo)
                $selected = "selected";
                else
                $selected = "";

                ?>
                <option <?= $selected ?> value="<?= $rsCargo[$cont]->getId() ?>">
                    <?= $rsCargo[$cont]->getCargo() ?>
                </option>
                <?php $cont++; } ?>
            </select>
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade select_funcionario">
            <label class="lblEventos slt_direita">Perfil:</label><br>
            <select name="select_perfil" class="slt_direita">
                <option selected disabled>Selecione um perfil:</option>
              <?php

              // Importando a controller de perfil
              require_once "$path_local/cms/controller/controllerNivelPerfil.php";

              // Instânciando a classe do controler
              $controllerPerfil = new ControllerNivelPerfil();

              // Result set que recebe os dados
              $rsPerfil = $controllerPerfil->listarRegistros();

              // Variável do contador
              $cont = 0;

              // Loop para colocar todos os registros no result set
              while ($cont < count($rsPerfil)) {

                // Verificando se o select está com o option que corresponde ao perfil do funcionario
                if ($rsPerfil[$cont]->getId() == $idPerfil)
                $selected = "selected";
                else
                $selected = "";

                ?>
                <option <?= $selected ?> value="<?= $rsPerfil[$cont]->getId() ?>">
                    <?= $rsPerfil[$cont]->getPerfil() ?>
                </option>
                <?php $cont++; } ?>
            </select>
        </div>
        <div class="caixa_inputs_evento titulo_e_localidade select_funcionario">
            <label class="lblEventos">Status:</label><br>
            <select name="select_status">
                <option value="1" <?php if (@$status == 1) echo 'selected="selected"';?>>Ativado</option>
                <option value="0" <?php if (@$status == 0) echo 'selected="selected"';?>>Desativado</option>
            </select>
        </div>
            <div class="caixa_inputs_evento titulo_e_localidade select_funcionario">
        </div>
        

        <div class="area_botao_form">
            <input type="button" id="btn_submit" value="<?= $botao ?>" onclick="<?= $router ?>">
            <input type="reset" value="Limpar">
        <a onclick="funcionario();">
            <input type="button" value="Cancelar">
        </a>
        </div>
    </div>
  </form>
</div>
</div>
