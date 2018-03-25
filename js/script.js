$(document).ready(function(){


    var objeto = $('#sidebar');                  //CAPTURA A REFERENCIA DO OBJETO
    $('.navbar-toggler').click(function(){          //VERIFICA SE O BOTÃO FOI CLICADO

        if( objeto.hasClass('fechado')){            //VERIFICA SE O MENU ESTA FECHADO PARA ABRIR
            objeto.removeClass("fechado");
            objeto.addClass("aberto");

        }else if(objeto.hasClass('aberto')){        //VERIFICA SE O MENU ESTA ABERTO PARA FECHAR
            objeto.removeClass("aberto");
            objeto.addClass("fechado");
        }
    });

    $('.btn-menu').click(function(){                //VERIFICA SE O X NO MENU FOI CLICADO PARA FECHAR
        objeto.removeClass("aberto");
        objeto.addClass("fechado");
    });


});


