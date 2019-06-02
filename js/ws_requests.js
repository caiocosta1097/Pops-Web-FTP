
//-------FAZ O LOGIN NO DASHBOARD DA PESSOA JURIDICA ------------
var host = window.location.host + "/web";
$("#btnlogar").click(function(){


  var tipo = $(this).data("tipo");

  if (tipo == "txtcpf") {
      loginPF();
  }else if(tipo == "txtcnpj"){
      loginPJ();
  }

});

function logout(){
    document.cookie = "cnpj="+null;
    var url = `http://${host}/index.php`;
    $(location).attr('href',url);
}

function loginPF(){
  $.ajax({
    type: "POST",
    url: `http://${host}/backend/services/PFService.php/?op=login`,
    dataType: "json",
    data: {"cpf": $("#txtcpf").val(), "senha": $("#txtpassword").val()},
    success: function(data){

        //console.log(data);
        var html = '';
        if(data.success == true){
            //redireciona a url p/ dashboard da pj
            var url = `http://${host}/index.php`;

            //criando um cookie no js
            document.cookie = "id_p_fisica="+data.id_p_fisica;
            $(location).attr('href',url);

        } 

    }
  });
}

//function que faz o login p/ Pessoa Juridica
function loginPJ(){
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=login`,
        dataType: "json",
        data: {"cnpj": $("#txtcnpj").val(), "senha": $("#txtpassword").val()},
        success: function(data){
            //console.log(data);

            var html = '';
            if(data.success == true){
                //redireciona a url p/ dashboard da pj
                var url = `http://${host}/index.php`;

                //criando um cookie no js
                document.cookie = "cnpj="+data.cnpj;
                $(location).attr('href',url);

            } else {
                html = "<div>"+data.message+"</div>";
                $("#msg_login").fadeToggle(350);
                $("#msg_login").html(html);
            }

        }
    });
}
//Comentário inserido com sucesso!
$("#form-comentario").submit(function(evt){
    alert('certo')
    evt.preventDefault();
    var idPessoaFisicaCookie = document.cookie;
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PFService.php/?op=addComentario`,
        data: new FormData($("#form-comentario")[0]),
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        dataType:"json",
        success: function(data){
             var html = "<div>"+data.message+"</div>";
             $("#msg_add").html(html);
             $("#form-comentario")[0].reset();
        },
        error: function(){
            alert('deu erro');
        }
    });
});


function getAllData(){
    var idPessoaFisicaCookie = document.cookie;
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PFService.php/?op=dashboard`,
        dataType: "json",
        data: {"id_p_fisica":idPessoaFisicaCookie},
        success: function(data){
            sessionStorage.setItem("customer", JSON.stringify(data));
            $('#nome').html(data.nome);
            $('#cpf').html(data.cpf);
            $('#celular').html(data.celular);
            $('#logradouro').html(data.logradouro);
            $('#num').html(data.num);
            $('#bairro').html(data.bairro);
            $('#cidade').html(data.cidade);
            $('#uf').html(data.uf);
        }
    });
}

function getComprasData(){
   
    $.ajax({
      type: "POST",
      url: `http://${host}/backend/services/CompraService.php/?op=pedidos`,
      dataType: "json",
      success: function(data){
        var html = '';
        
        for(var i = 0; i < data.length; i++){
          
          html+= `<div class="caixa_titulo_mp">`;
          html+= ` <div class="tabela_compra elemento_esquerda ont-titulos_res">
                      <p class="">${data[i].dt_compra}</p>
                   </div>`;
          html+= ` <div class="tabela_compra elemento_esquerda ont-titulos_res">
                      <p>R$ ${data[i].valor_total}</p>
                    </div>`;
          html+= `<div class="tabela_compra elemento_esquerda ont-titulos_res">
                    <p>${data[i].status_pedido}</p>
                      </div></div>`;
      }
      $("#container-compras").append(html);
      }
  });
}

function getNome(){
  var idPessoaFisicaCookie = document.cookie;
  $.ajax({
      type: "POST",
      url: `http://${host}/backend/services/PFService.php/?op=dashboard`,
      dataType: "json",
      data: {"id_p_fisica":idPessoaFisicaCookie},
      success: function(data){
          $('#nome_header').html("Olá, " + data.nome);
      }
  });
}

//-------ADICIONAR PERFIL------------
$("#form-perfil").submit(function(evt){
    evt.preventDefault();
    var cnpjCookie = document.cookie;
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=addProfile`,
        data: new FormData($("#form-perfil")[0]),
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        dataType:"json",
        success: function(data){
            //alert(perfilJuridico.foto);
             var html = "<div>"+data.message+"</div>";
             $("#msg_add").html(html);
             $("#form-perfil")[0].reset();
        },
        error: function(){
            alert('deu erro');
        }
    });
});

//-------ADICIONAR ANUNCIO------------
$("#form-anuncio").submit(function(evt){
    evt.preventDefault();
    var btnValue = $("#btnok").val();

    console.log(btnValue);

    if(btnValue!="Editar"){
    $.ajax({
            type: "POST",
            url: `http://${host}/backend/services/PJService.php/?op=addAnuncio`,
            data: new FormData($("#form-anuncio")[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            dataType:"json",
            success: function(data){
                //alert(perfilJuridico.foto);
                var html = "<div>"+data.message+"</div>";
                $("#msg_add").html(html);
                $("#form-anuncio")[0].reset();
                getAdData();
            },
            error: function(){
                alert('deu erro');
            }
        });

    }

});

function getAllDataPJ(){
    var cnpjCookie = document.cookie;
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=dashboard`,
        dataType: "json",
        data: {"cnpj":cnpjCookie},
        success: function(data){
            sessionStorage.setItem("customer", JSON.stringify(data));
            $('#nom_fantasia').html(data.nome_fantasia);
            $('#razao_social').html(data.razao_social);
            $('#responsavel').html(data.responsavel);
            $('#user').html(data.usuario);
            $('#cnpj').html(data.cnpj);
            $('#email').html(data.email);
            $('#logradouro').html(data.logradouro);
            $('#bairro').html(data.bairro);
            $('#tel').html(data.telefone);
            $('#num').html(data.numero);
            $('#cep').html(data.cep);
            $('#uf').html(data.uf);

            //preenchendo campos da modal
            $('#txt_nome').val(data.razao_social);
            $('#txt_logradouro').val(data.logradouro);
            $('#txt_num').val(data.numero);
            $('#txt_cidade').val(data.cidade);
            $('#txt_uf').val(data.uf);

        }
    });
}

function getResponsavel(){
  var cnpjCookie = document.cookie;
  $.ajax({
      type: "POST",
      url: `http://${host}/backend/services/PJService.php/?op=dashboard`,
      dataType: "json",
      data: {"cnpj":cnpjCookie},
      success: function(data){

          $('#responsavel_header').html("Olá, " + data.responsavel);

      }
  });
}

function getPerfilData(){
    var cnpjCookie = document.cookie;
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=perfis`,
        dataType: "json",
        data: {"cnpj":cnpjCookie},
        success: function(data){
            var html = '<div class="container_card_anuncio">';
            //looping em todos os dados retorados via JSON
            for(var i = 0; i < data.length; i++){
                html+= `<a class="click_me" href="#" data-id="${data[i].id_perfil_juridico}" onclick="callModalPerfilWithData(this);$('#container').fadeIn(600);"><div class="card_anuncio">`;
                html+= `<div class="card_img_anuncio"><img class="img_anuncio" src='http://${host}/cms/view/img/usuario.png'  alt="ads" title="ads"></img></div>`;
                html+= `<div class="options">Responsável</div>`;
                html+= `<div class="desc_anuncio">${data[i].responsavel}</div>`;
                html+= `</div></a>`;
            }

           $("#container_perfil").html(html);
           //alert(html);

        }
    });
}

function getAdData(){

    var cnpjCookie = document.cookie;
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=ads`,
        dataType: 'json',
        data: {"cnpj":cnpjCookie},
        success: function(data){
          var html = '<div class="container_card_anuncio">';
          for(var i = 0; i < data.length; i++){

               html+= `<a class="click_me" href="#" data-id="${data[i].id_anuncio}" onclick="callModalWithData(this);$('#container').fadeIn(600);"><div class="card_anuncio">`;
               html+= `<div class="card_img_anuncio"><img class="img_anuncio" src='http://${host}/cms/view/img/temp/${data[i].foto}'  alt="ads" title="ads"></img></div>`;
               html+= `<div class="options">Descrição</div>`;
               html+= `<div class="desc_anuncio">${data[i].descricao}</div>`;

               html+= `</div></a>`;


           }
          $("#container_card_anuncio").html(html);
        },
        error: function(xhr){
            var errorMessage = xhr.status + ': ' + xhr.statusText
            console.log('Error - ' + errorMessage);

        }
    });
}

function callModalWithData(obj){

    var id = $(obj).data("id");
    document.cookie = "idAnuncio="+id;

    $.ajax({
      type: "GET",
      url: 'modal-anuncio.php',
      success: function(dados){
        $("#modal").html(dados);
        selectById(id);


        $("#form-anuncio").submit(function(){
            var btnValue = $("#btnok").val();
            if(btnValue=="Editar"){

                $.ajax({
                    type: "POST",
                    url: `http://${host}/backend/services/PJService.php/?op=updateAnuncio`,
                    data: new FormData($("#form-anuncio")[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: true,
                    dataType:"json",
                    success: function(data){

                        var html = "<div>"+data.message+"</div>";
                        $("#msg_add").html(html);
                        $("#form-anuncio")[0].reset();
                        getAdData();
                    },
                    error: function(){
                        alert('deu erro');
                    }
                });
            }
        });

      }
    });
  }

  function callModalPerfilWithData(obj){

    var id = $(obj).data("id");
    document.cookie = "idPerfil="+id;

    $.ajax({
      type: "GET",
      url: 'modal_perfil_secundario.php',
      success: function(dados){
        $("#modal").html(dados);
        selectPerfilById(id);


        $("#form-perfil").submit(function(){
            var btnValue = $("#btn_add").val();
            if(btnValue=="Editar"){

                $.ajax({
                    type: "POST",
                    url: `http://${host}/backend/services/PJService.php/?op=updatePerfil`,
                    data: new FormData($("#form-perfil")[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: true,
                    dataType:"json",
                    success: function(data){
                        var html = "<div>"+data.message+"</div>";
                        $("#msg_add").html(html);
                        $("#form-perfil")[0].reset();
                        getPerfilData();
                    },
                    error: function(){
                        alert('deu erro');
                    }
                });
            }
        });

      }
    });
  }

  function selectById(id){
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=ad_by_id`,
        dataType: 'json',
        data: {"idAd":id},
        success: function(data){
          console.log(data);
          $("#txtadescricao").val(data.descricao);
          $("#slt_status").val(data.status);
          $("#btnok").val("Editar");
        },
        error: function(xhr){
            var errorMessage = xhr.status + ': ' + xhr.statusText
            alert('Error - ' + errorMessage);

        }
    });
  }


  function selectPerfilById(id){
    $.ajax({
        type: "POST",
        url: `http://${host}/backend/services/PJService.php/?op=perfil_by_id`,
        dataType: 'json',
        data: {"idPerfil":id},
        success: function(data){
          console.log(data);
          $("#txt_responsavel").val(data.responsavel);
          $("#txt_email").val(data.email);
          $("#txt_tel").val(data.telefone);
          $("#txt_user").val(data.usuario);
          $("#txt_cel").val(data.celular);
          $("#txt_password").val(data.senha);
          $("#btn_add").val("Editar");
        },
        error: function(xhr){
            var errorMessage = xhr.status + ': ' + xhr.statusText
            alert('Error - ' + errorMessage);

        }
    });
  }

  function adicionarCarrinho(id, event) {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: `http://${host}/backend/services/PFService.php/?acao=mais`,
      data: {id:id},
      success: function(dados){
        window.location.href = "carrinho.php";
      }
    });
  }

  function atualizarCarrinho(id, quant){
    if (quant == 1){
      // alert(host);
      $.ajax({
        type: 'POST',
        url: `http://${host}/backend/services/PFService.php/?acao=mais`,
        data: {id:id},
        success: function(dados){
          console.log(dados);
        }
      });
    } else if (quant == -1) {

      $.ajax({
        type: 'POST',
        url: `http://${host}/backend/services/PFService.php/?acao=menos`,
        data: {id:id},
        success: function(dados){
          console.log(dados);
        }
      });
    }
  }

  function adicionarFardo(id, event) {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: `http://${host}/backend/services/PJService.php/?acao=mais`,
      data: {id:id},
      success: function(dados){
        window.location.href = "carrinhoPJ.php";
      }
    });
  }

  function atualizarCarrinhoPJ(id, quant){
  if (quant == 1){
    // alert(host);
    $.ajax({
      type: 'POST',
      url: `http://${host}/backend/services/PJService.php/?acao=mais`,
      data: {id:id},
      success: function(dados){
        console.log(dados);
      }
    });
  } else if (quant == -1) {

    $.ajax({
      type: 'POST',
      url: `http://${host}/backend/services/PJService.php/?acao=menos`,
      data: {id:id},
      success: function(dados){
        console.log(dados);
      }
    });
  }
}
	
	//Insert escola
    $("#frmPopsEscola").submit(function(evt){
        alert('Cadastro efetuado com sucesso!')
        evt.preventDefault();
        $.ajax({
            type: "POST",
            url: `http://${host}/backend/services/PEService.php/?op=addEscola`,
            data: new FormData($("#frmPopsEscola")[0]),
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            dataType:"json",
            success: function(data){
                var html = "<div>"+data.message+"</div>";
                $("#msg_add").html(html);
                $("#frmPopsEscola")[0].reset();
            },
            error: function(){
                alert('deu erro');
            }
        });
    });

    //resposta da enquete
    function answer(_id_enq) {
        var radioValue = $(`input[name='rdo_option${_id_enq}']:checked`).val();
       
        $.ajax({
          type: "POST",
          url: `http://${host}/backend/services/EnqueteService.php/?op=answer`,
          dataType:"json",
          data:{"id_resposta":radioValue, "id_enq":_id_enq},
          success: function(data){
              var html = "<div>"+data+"</div>";
              swal({icon:"success", text:data});
              console.log(data);
          },
          error: function(){
              alert('deu erro');
          }
      });
    };



    

