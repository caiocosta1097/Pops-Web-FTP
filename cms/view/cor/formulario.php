<?php
    // Iniciando uma sessão
    @session_start();

    // Iniciando a variável em null para não haver erro
    $path_local = null;

    // Variável que recebe a variáveil de sessão
    $path_local = $_SESSION['path_local'];

    $titulo = "CADASTRAR COR";

    //Função do onclick para saber qual ação chama o router
    $router = "router('cor', 'inserir', 0)";
    
?>
<!-- <script>
    $(document).ready(function(){
        $("#btn_submit").click(function(){
            alert($("#ipt_hexadec").val());
        });
    });
</script> -->
<style>
    #ipt_hexadec{
        width:70px;height:27px;
        padding: 0;
    }
</style>
<div class="title_paginas centralizarX">
    <?= $titulo ?>
</div>
<div class="caixa_form centralizarX">
  <form id="form" method="post">
    <label for="ipt_hexadec">Cor</label>
    <br>
    <input type="color" id="ipt_hexadec" name="ipt_hexadec" required>
    <br>
    <label for="slt_elementos">Elementos Visuais</label>
    <select id="slt_elementos" name="slt_elementos" >
        <option>Selecione...</option>
        <?php 
             // Importando a controller de cargo
            require_once "$path_local/cms/controller/controllerElementoVisual.php";

            // Instânciando a classe do controler
            $controllerElementoVisual = new ControllerElementoVisual();

            // Result set que recebe os dados
            $rsElementoVisual = $controllerElementoVisual->listar();

            // Variável do contador
            $cont = 0;

            // Loop para colocar todos os registros no result set
            while ($cont < count($rsElementoVisual)) {
        ?>
            <option value="<?=$rsElementoVisual[$cont]->getIdElementoVisual()?>">
                <?=$rsElementoVisual[$cont]->getNomeElemento()?>
            </option>
        <?php $cont++; } ?>
    </select>
    
    <div class="area_botao_form">
      <input type="button" id="btn_submit" value="Salvar" onclick="<?=$router?>"> 
      <input type="reset" value="Limpar">
      <a onclick="adm_cms('cor');">
        <input type="button" value="Cancelar">
      </a>
    </div>
  </form>
</div>
</div>