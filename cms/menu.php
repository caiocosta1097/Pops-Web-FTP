<?php
// Iniciando a variável em null para não haver erro
$path_url = null;
// Variável que recebe a variáveil de sessão
$path_url = $_SESSION['path_url'];
// Importando o arquivo de autenticação
require_once "$path_local/cms/verificar_login.php";
// Variável que recebe o função com o usuário autenticado
$rsUser = verificarAutentica();
if ($rsUser['perfil_nome'] == "Publicitário") {
  $modulo_geral = "";
  $modulo_produto = "style='display:none;'";
  $modulo_contato = "style='display:none;'";
  $modulo_dashboard = "style='display:none;'";
  $modulo_administracao = "style='display:none;'";
}elseif ($rsUser['perfil_nome'] == "Cataloguista") {
  $modulo_geral = "style='display:none;'";
  $modulo_produto = "";
  $modulo_contato = "style='display:none;'";
  $modulo_dashboard = "style='display:none;'";
  $modulo_administracao = "style='display:none;'";
}elseif ($rsUser['perfil_nome'] == "Marketing") {
  $modulo_geral = "style='display:none;'";
  $modulo_produto = "style='display:none;'";
  $modulo_contato = "";
  $modulo_dashboard = "";
  $modulo_administracao = "style='display:none;'";
}
?>

<div class="sidenav">
  <div class="menu centralizarY">
    <div class="foto_usuario centralizarX">

    </div>
  </div>
  <a href="#" class="editar_perfil" id="editar">Editar perfil </a>
  <button <?= @$modulo_geral ?> class="dropdown-btn">Páginas
  <i class="fas fa-angle-down fa-2px"></i>
  </button>

  <div class="dropdown-container">
    <a style="margin-left:10px;" href="<?= "$path_url/cms/view/home.php"?>">Home</a>
    <a style="margin-left: 10px;" href="<?= "$path_url/cms/view/pagina_promocao.php" ?>">Promoção</a>
    <a style="margin-left: 10px;" href="<?= "$path_url/cms/view/pagina_eventos.php" ?>">Eventos</a>
    <a style="margin-left: 10px;" href="<?= "$path_url/cms/view/pagina_noticia.php" ?>">Notícia</a>
    <a style="margin-left: 10px;" href="<?= "$path_url/cms/view/pagina_nossos_patrocinios.php" ?>">Nossos Patrocínios</a>
    <a style="margin-left:10px;"  href="<?= "$path_url/cms/view/pagina_enquetes.php" ?>">Enquete</a>
    <a style="margin-left:10px;"  href="<?= "$path_url/cms/view/pagina_historia_marca.php"?>">História da Marca</a>
    <a style="margin-left:10px;"  href="<?= "$path_url/cms/view/pagina_sobre.php"?>">Sobre a POP'S</a>
    <a style="margin-left:10px;"   href="<?= "$path_url/cms/view/pagina_videos.php" ?>">Videos</a>
	  <a style="margin-left:10px;"   href="<?= "$path_url/cms/view/pagina_planeta_sustentavel.php" ?>">Planeta Sustentável</a>
    <a style="margin-left:10px;"   href="<?= "$path_url/cms/view/pagina_cor.php" ?>">Cores</a>
  </div>
  <button <?= @$modulo_produto ?> class="dropdown-btn">Produtos
    <i class="fas fa-angle-down fa-2px"></i>
  </button>
  <div class="dropdown-container">
    <a href="<?= "$path_url/cms/view/pagina_produto.php"?>">Bebida</a>
    <a href="<?= "$path_url/cms/view/pagina_componente.php"?>">Componente</a>
    <a href="<?= "$path_url/cms/view/pagina_brinde.php"?>">Brinde</a>
  </div>
  <button <?= @$modulo_contato ?> class="dropdown-btn">Contato
    <i class="fas fa-angle-down fa-2px"></i>
  </button>


  <div class="dropdown-container">
    <a style="margin-left:10px;"  href="<?= "$path_url/cms/view/pagina_fale_conosco.php"?>">Fale Conosco</a>
    <a style="margin-left:10px;" href="<?= "$path_url/cms/view/pagina_pops_nas_escolas.php" ?>">Pop's nas Escolas</a>

  </div>

  <button <?= @$modulo_dashboard ?> class="dropdown-btn">Dashboard
    <i class="fas fa-angle-down fa-2px"></i>
  </button>

  <div class="dropdown-container">
    <a style="margin-left:10px;"  href="<?= "$path_url/cms/view/pagina_pessoa_fisica.php"?>">Pessoa física</a>
    <a style="margin-left:10px;" href="<?= "$path_url/cms/view/pagina_pessoa_juridica.php" ?>"> Pessoa  Juridica </a>
    <a style="margin-left:10px;" href="<?= "$path_url/cms/view/pagina_comentario.php" ?>">Comentarios</a>
    <a style="margin-left:10px;" href="<?= "$path_url/cms/view/pagina_anuncios.php" ?>">Anuncios</a>
  </div>

  <button <?= @$modulo_administracao ?> class="dropdown-btn">Funcionário
    <i class="fas fa-angle-down fa-2px"></i>
  </button>
  <div class="dropdown-container">
    <a style="margin-left:10px;" onclick="adm_funcionario();">Administração</a>
  </div>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
