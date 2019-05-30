$(document).ready(function(){

  $("#event_clique_1").click(function(){/*Função para deixar so a caixa_submenu_ev_an aberta ao clicar*/
    $("#caixa_submenu_estabelecimento").fadeOut(100);
    $("#caixa_submenu_sobre").fadeOut(100);
    $("#caixa_submenu_ev_an").fadeIn(100);
  });

  $("#event_clique_2").click(function(){/*Função para deixar so a caixa_submenu_estabelecimento aberta ao clicar*/
    $("#caixa_submenu_ev_an").fadeOut(100);
    $("#caixa_submenu_sobre").fadeOut(100);
    $("#caixa_submenu_estabelecimento").fadeIn(100);
  });

  $("#event_clique_3").click(function(){/*Função para deixar so a caixa_submenu_sobre aberta ao clicar*/
    $("#caixa_submenu_estabelecimento").fadeOut(100);
    $("#caixa_submenu_ev_an").fadeOut(100);
    $("#caixa_submenu_sobre").fadeIn(100);
  });

});
