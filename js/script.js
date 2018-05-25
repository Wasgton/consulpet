$(document).ready(function(){

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

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

    //SCRIPTS USUARIOS
        $('.usr_id').click(function () {
            var id = $(this).attr("id");
            location.href="usuario_editar?id="+id;
        });

        $('#novo_usuario').click(function () {
            location.href="novo_usuario";
        });

        $('#tipo').change(function() {

            var id = $(this).val();
                        
            if (id === '3') {
                $('.CRMV').removeAttr("style");
            } else {
                $('.CRMV').hide();
            }
        });
        $('#confirmacao').keyup(function(){
            var senha = $('#Senha').val();
            var confirmacao = $(this).val();

            if(senha!==confirmacao){
                $('#alert_sucesso_senha').hide();
                $('#alert_erro_senha').show();
                $('#alert_erro_senha').html('<i class="fa fa-times" aria-hidden="true"></i>');
            }else{
                $('#alert_erro_senha').hide();
                $('#alert_sucesso_senha').html('<i class="fa fa-check" aria-hidden="true"></i>')
                $('#alert_sucesso_senha').show();
            }

        });

    //SCRIPTS CLIENTES
        $('.cli_id').click(function () {
            var id = $(this).attr("id");
            location.href="cliente_editar?id="+id;
        });

        $('#novo_cliente').click(function () {
            location.href="novo_cliente";
        });

    //SCRIPTS ANIMAIS
        $('.ani_id').click(function () {
            var id = $(this).attr("id");
            location.href="animal_editar?id="+id;
        });

        $('#novo_animal').click(function () {
            location.href="novo_animal";
        });

    //SCRIPTS ESPECIE
        $('.esp_id').click(function () {
            var id = $(this).attr("id");
            location.href="especie_editar?id="+id;
        });

        $('#nova_especie').click(function () {
            location.href="nova_especie";
        });

    //SCRIPTS RAÇA
        $('.rac_id').click(function () {
            var id = $(this).attr("id");
            location.href="raca_editar?id="+id;
        });

        $('#nova_raca').click(function () {
            location.href="nova_raca";
        });

    //SCRIPTS CIDADE
        $('.cid_id').click(function () {
            var id = $(this).attr("id");
            location.href="cidade_editar?id="+id;
        });

        $('#nova_cidade').click(function () {
            location.href="nova_cidade";
        });

    //MASCARA PARA DATA E HORA
        function DataHora(evento, objeto){

            var keypress=(window.event)?event.keyCode:evento.which;

            campo = eval (objeto);
            if (campo.value === '00/00/0000 00:00:00'){
                campo.value=""
            }

            caracteres = '0123456789';
            separacao1 = '/';
            separacao2 = ' ';
            separacao3 = ':';
            conjunto1 = 2;
            conjunto2 = 5;
            conjunto3 = 10;
            conjunto4 = 13;
            conjunto5 = 16;
            if ((caracteres.search(String.fromCharCode (keypress))!==-1) && campo.value.length < (19)){
                if (campo.value.length === conjunto1 )
                    campo.value = campo.value + separacao1;
                else if (campo.value.length === conjunto2)
                    campo.value = campo.value + separacao1;
                else if (campo.value.length === conjunto3)
                    campo.value = campo.value + separacao2;
                else if (campo.value.length === conjunto4)
                    campo.value = campo.value + separacao3;
                else if (campo.value.length === conjunto5)
                    campo.value = campo.value + separacao3;
            }else{
                event.returnValue = false;
            }
        }

        $('#start').keypress(function(){
            DataHora(event, this);
        });
        $('#end').keypress(function(){
            DataHora(event, this);
        });
});