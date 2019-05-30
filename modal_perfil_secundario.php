<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Perfil Secundário</title>
    
    
    <link rel="stylesheet" type="text/css" href="css/arielle.css">
    <script src="js/ws_requests.js"></script>
  </head>
  <body>
    <script>
    $(document).ready(function(){
      //function para fechar a modal
      $('#fechar').click(function(){
        $('#container').fadeOut(400);
      });
    });
    </script>
    

    <div class="modal_anuncio">
      <div class="modal-header-login">
        <h4 class="modal-title-login">
        Perfil Secundário
          <a href="#" id="fechar" class="modal-fechar"> </a>
        </h4>

      </div>

      <div class="modal-body-anuncio">
        <div class="modal-content-login">
          <div class="modal-form-anuncio">
            <form class="form-perfil" id="form-perfil"  method="post" enctype="multipart/form-data">
              Nome do Responsável:
                <input name="txt_responsavel" id='txt_responsavel'/>
              
            
             Foto:
                <input type="file" name="ipt_foto" id='ipt_foto'/>
              
              E-mail:
                <input type="email" name="txt_email" id='txt_email'/>
              

             Celular: <br>
                <input type="text" name="txt_cel" id='txt_cel'/>
             

            
                Telefone: <br>
                <input type="text" name="txt_tel" id='txt_tel'>
             

           Nome de Usuário p/ Login: <br>
                <input type="text" name="txt_user" id='txt_user' >
            

             
                Senha: <br>
                <input type="password" name="txt_senha" id='txt_password'>
            

              <input type="submit" name="btn_add" id="btn_add" value="ADICIONAR PERFIL">
              <div id='msg_add'></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>