$(document).ready(function(){
    timer();
    /**
     * configurando um range de scroll para o conteúdo da seção 
     * aparecer em tela
     */
    $(window).scroll(function(){
        if(window.pageYOffset > 260){
            $("#box_products").fadeIn(700);
            $("nav").addClass("fixed_nav fadeInTop");
        } else {
            $("nav").removeClass("fixed_nav");
        }
        if(window.pageYOffset > 1000 )
            $("#enquetes").fadeIn(700);
            
        if(window.pageYOffset > 1600)
            $("#promo").fadeIn(700);

        if(window.pageYOffset > 2400)
            $("#news").fadeIn(700);
        
        if(window.pageYOffset > 3200)
            $("#sustentavel").fadeIn(700);
        
        if(window.pageYOffset > 3600)
            $("#comments").fadeIn(700);
    });
});

timer = () => {
    setTimeout(showPage, 1900);
    //setTimeout(autoScroll, 3500);
}

function showPage(){
   $("#loading").fadeOut(900);
   $("#index_principal").fadeIn(100);
   
   
}
/**
 * essa function faz a page scrollar de acordo com o num inserido em
 * window.scrollBy() e captura a posição do scroll
 */
function autoScroll(){
    window.scrollBy(0, 1450);
    alert(window.pageYOffset);
}
