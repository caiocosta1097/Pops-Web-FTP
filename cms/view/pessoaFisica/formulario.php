<?php

// Iniciando uma sessão
@session_start();

// Iniciando a variável em null para não haver erro
$path_local = null;

// Variável que recebe a variáveil de sessão
$path_local = $_SESSION['path_local'];

if (isset($_GET["id"])) {

  // Importando a controller de setor
  require_once "$path_local/cms/controller/controllerPessoaFisica.php";

  // Instânciando a classe do controler
  $controllerPessoaFisica = new ControllerPessoaFisica();

  // Result set que recebe os dados
  $rsPessoaFisica = $controllerPessoaFisica->buscarRegistro();

  // Pegando os dados do objeto e setando em variavéis locais
  $id = $rsPessoaFisica->getId();
  $nome = $rsPessoaFisica->getNome();
  $imagem = $rsPessoaFisica->getImagem();
  $email = $rsPessoaFisica->getEmail();
  $celular = $rsPessoaFisica->getCelular();
  $cpf = $rsPessoaFisica->getCpf();
  $logradouro = $rsPessoaFisica->getLogradouro();
  $bairro = $rsPessoaFisica->getBairro();
  $cidade = $rsPessoaFisica->getCidade();
  $uf = $rsPessoaFisica->getUf();
  $foto = $rsPessoaFisica->getImagem();

}

?>



<script>
  $(document).ready(function(){
    //function para fechar a modal
    $('#close').click(function(){
      $('#container').fadeOut(400);
    });
  });
</script>



<div class="caixa_form_fisica centralizarX">
  <div class="head-fale-conosco">
    <span>INFORMAÇÕES</span>
    <a id="close" class="btn-close trigger" href="#">
      <i class="fa fa-times" aria-hidden="true"></i>
    </a>
  </div>

  <div class="modal-conteudo-fale-conosco">
    <div class="clearfix" style="height:420px;">
      <div class="coluna_form_fisica">
        <label for="file_img">Nome</label>
        <input readonly type="text" id="file_img" name="txt_nome" value="<?= @$nome ?>">
        <label for="file_img">Email</label>
        <input  readonly type="text" id="file_img" name="txt_email" value="<?= @$email ?>">
        <label for="file_img">Logradouro</label>
        <input readonly type="text" id="file_img" name="txt_logradouro" value="<?= @$logradouro ?>">
        <label for="file_img">Cidade</label>
        <input readonly type="text" id="file_img" name="txt_cidade" value="<?= @$cidade ?>">
      </div>

      <div class="coluna_form_fisica">
        <label for="file_img">CPF</label>
        <input readonly type="text" id="file_img" name="txt_cpf" value="<?= @$cpf ?>">
        <label for="file_img">Celular</label>
        <input readonly type="text" id="file_img" name="txt_celular" value="<?= @$celular ?>">
        <label for="file_img">Bairro</label>
        <input readonly type="text" id="file_img" name="txt_bairro" value="<?= @$bairro ?>">
        <label for="file_img">Estado</label>
        <select name="select_estado">
          <option value="SP">SP</option>
          <option value="MG">MG</option>
        </select>
      </div>
    </div>

    <div class="area_foto centralizarX">
      <label for="file_img">Foto</label>
      <img src="<?= "$path_url/cms/view/img/temp/".$foto ?>" alt="" id="area_foto_p_fisico">
    </div>

    <div class="area_botao_form">

    </div>
</div>
