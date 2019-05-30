<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Anuncio</title>
    <link rel="stylesheet" href="css/arielle.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro_edicao_pessoa_fisica.css">
    <script src="js/ws_requests.js"></script>
  </head>
  <body>
    <script>
    $(document).ready(function(){
      //function para fechar a modal
      $('#fechar').click(function(){
        $('#container').fadeOut(400);
      });
      getAllDataPJ();
    });
    </script>

    <div class="modal_anuncio">
      <div class="modal-header-login">
        <h4 class="modal-title-login">
          Anuncio
          <a href="#" id="fechar" class="modal-fechar"> </a>
        </h4>

      </div>

      <div class="modal-body-anuncio">
        <div class="modal-content-login">
          <div class="modal-form-anuncio">
            <form class="form-anuncio" id="form-anuncio" action="index.html" method="post">
              <p class="modal-title-campos-anuncio"> Nome do estabelecimento:
                <input  type="text" name="txtendereco" id="txt_nome" disabled>
              </p>

              <p class="modal-title-campos-anuncio"> Imagem:
                <input type="file" name="flt_anuncio" id="flt_anuncio">
              </p>

              <p class="modal-title-campos-anuncio"> Descrição:
                <textarea name="txtadescricao" id="txtadescricao" rows="5" cols="38"></textarea>
              </p>

              <p class="modal-title-campos-anuncio" > Logradouro: <br>
                <input type="text" id="txt_logradouro" name="txt_logradouro" disabled>
              </p>

              <p class="modal-title-campos-anuncio" > N: <br>
                <input type="text" id="txt_num" name="txt_num" style="width:50px;" disabled>
              </p>

              <p class="modal-title-campos-anuncio" >
                Cidade: <br>
                <input type="text" id="txt_cidade" name="txt_cidade" disabled>
              </p>

              <p class="modal-title-campos-anuncio" >
                Estado: <br>
                <input type="text" id="txt_uf" name="txt_uf" disabled>
              </p>

              <input type="submit" name="btnok" id="btnok" value="Criar anuncio" >
               <p id="msg_add" class="centralizarX"></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>