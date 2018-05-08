$(document).ready(function(){

    // $('#load').hide();

    function controlaMenu(){
        var objeto = $('#sidebar');                 //CAPTURA A REFERENCIA DO OBJETO
        if( objeto.hasClass('fechado')){            //VERIFICA SE O MENU ESTA FECHADO PARA ABRIR
            objeto.removeClass("fechado");
            objeto.addClass("aberto");

        }else if(objeto.hasClass('aberto')){        //VERIFICA SE O MENU ESTA ABERTO PARA FECHAR
            objeto.removeClass("aberto");
            objeto.addClass("fechado");
        }
    }

    $('.navbar-toggler').click(function(){          //VERIFICA SE O BOTÃO FOI CLICADO
        controlaMenu();
    });

    $('.td_id').click(function () {
        var id = $(this).attr("id");
        location.href="usuario_editar?id="+id;
    });

    $('#novo_usuario').click(function () {
        location.href="novo_usuario";
    });

    $('#tipo').change(function() {
        var id = $('option:selected').attr('id');
        if (id === '3') {
            $('.CRMV').removeAttr("style");
        } else {
            $('.CRMV').hide();
        }
    });




});