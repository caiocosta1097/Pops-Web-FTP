// Pegando o servidor
var host = window.location.host + "/web";

function adm_cms(area){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/${area}/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);
    }

  });

}

function form_cms(area) {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/${area}/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para chamar a página de escolha de funcionário
function adm_funcionario() {
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/area/escolha_funcionario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);
    }

  });

}



function adm_cms(area){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/${area}/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);
    }

  });

}

function form_cms(area) {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/${area}/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}



function adm_pops_nas_escolas() {
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/area/escolha_pops_nas_escolas.php`,
    success: function (callback) {
      $("#caixa_informacoes").html(callback);
    }

  });

}


// Função para listar os dados
function setor() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/setor/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_setor() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/setor/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function cargo() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/cargo/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_cargo() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/cargo/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function enquetes() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/enquetes/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_enquete() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/enquetes/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}


function pops_nas_escolas(){
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/pops_nas_escolas/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });
}


function conteudo_pops_nas_escolas(){
  //Function que pega o Conteúdo o POP'S na escola
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/pops_nas_escolas/dados_site.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });
}


// Função para criar o formulário
function form_conteudo_pagina_pops_escolas() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/pops_nas_escolas/formulario_conteudos.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function videos() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/videos/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_video() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/videos/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}


function router(controller, modo, id){

  let form = $('#form');

  $.ajax({

      type: "POST",
      url: `http://${host}/cms/router.php?controller=${controller}&modo=${modo}&id=${id}`,
      // data: form.serialize(),
      data: new FormData($('#form')[0]),
      cache: false,
      contentType: false,
      processData: false,
      async: true,
      success: function (callback) {

        $("#caixa_informacoes").html(callback);

      }
  });

}

function router_status(controller, modo, id, status){

  let form = $('#form');

  $.ajax({

      type: "POST",
      url: `http://${host}/cms/router.php?controller=${controller}&modo=${modo}&id=${id}&status=${status}`,
      // data: form.serialize(),
      data: new FormData($('#form')[0]),
      cache: false,
      contentType: false,
      processData: false,
      async: true,
      success: function (callback) {

        $("#caixa_informacoes").html(callback);

      }
  });

}

function teste(controller, modo, id){

  $.ajax({

      type: "POST",
      url: `http://${host}/cms/router.php?controller=${controller}&modo=${modo}&id=${id}`,
      success: function (callback) {

        $(".modal").html(callback);

      }
  });

}

function fale_conosco() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/fale_conosco/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}
// Função para criar o formulário de apresentação do fale conosco
function form_fale_conosco() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/fale_conosco/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

function visualizar_fale_conosco(id){

  $.ajax({
    type: "GET",
    url: `http://${host}/cms/view/fale_conosco/formulario.php?id=${id}`,
    success: function(dados){
      $(".modal").html(dados)
    }
  });
  $('#container').fadeIn(600);
}

// Função para listar os dados da historia da marca
function historia_marca() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/historia_marca/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}
// Função para criar o formulário de apresentação da historia da marca
function form_historia_marca() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/historia_marca/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados da sobre
function sobre() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/sobre/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}
// Função para criar o formulário de apresentação da sobre
function form_sobre() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/sobre/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_eventos() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/eventos/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function eventos(){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/eventos/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_nossos_patrocinios() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/nossos_patrocinios/formulario.php`,
    data: new FormData($('#form')[0]),
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function nossos_patrocinios(){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/nossos_patrocinios/dados.php`,
    data: new FormData($('#form')[0]),
    //function para resgatar dados do form
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_noticia() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/noticia/formulario.php`,
    data: new FormData($('#form')[0]),
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function noticia(){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/noticia/dados.php`,
    data: new FormData($('#form')[0]),
    //function para resgatar dados do form
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function planeta_sustentavel() {

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/planeta_sustentavel/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para criar o formulário
function form_planeta_sustentavel() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/planeta_sustentavel/formulario.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

function comentarios(){
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/comentarios/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });
}

function form_promocao() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/promocao/formulario.php`,
    data: new FormData($('#form')[0]),
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function promocao(){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/promocao/dados.php`,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

function form_funcionario() {

  $.ajax({

    type: "POST",
    url: `http://${host}/cms/view/funcionario/formulario.php`,
    data: new FormData($('#form')[0]),
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

// Função para listar os dados
function funcionario(){

  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/funcionario/dados.php`,
    data: new FormData($('#form')[0]),
    //function para resgatar dados do form
    cache: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (callback) {

      $("#caixa_informacoes").html(callback);

    }

  });

}

function form_cores(){
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/cor/formulario.php`,
    success: function(callback){
      $("#caixa_informacoes").html(callback);
    }
  })
}

function cores(){
  $.ajax({
    type: "POST",
    url: `http://${host}/cms/view/cor/dados.php`,
    success: function(callback){
      $("#caixa_informacoes").html(callback);
    }
  })
}

function visualizar_pessoaFisica(id){

  $.ajax({
    type: "GET",
    url: `http://${host}/cms/view/pessoaFisica/formulario.php?id=${id}`,
    success: function(dados){
      $(".modal_p_fisica").html(dados)
    }
  });
  $('#container').fadeIn(600);
}
