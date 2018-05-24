$(document).ready(function() {

    //AJAX CADASTRO DE AGENDAMENTO
    $('#novo_agendamento').click(function () {

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/insert_agendamento.php',
            type: 'post',
            dataType: 'text',
            data: $('#form-agenda').serialize(),
            beforeSend: function () {
                $('html, body').animate({
                    scrollTop: $( $("#load") ).offset().top
                }, 200);
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {

                    if(data==='1'){

                        $('#alert_sucesso_modal').html('Agendamento realizado com sucesso!');
                        $('#alert_sucesso_modal').show();
                        setTimeout(function () {
                            $('#modalCadastrar').modal('hide');
                            window.location.reload();
                        }, 1000);

                    }else if(data==='4'){
                        $('#alert_erro_modal').html('Não é possivel registrar consulta com horario/data final menor ou igual a(o) horario/data inicial');
                        $('#alert_erro_modal').show();
                        $('input').focus(function(){
                            $('#alert_erro_modal').fadeOut();
                        });

                    }else if(data==='3'){
                        $('#alert_erro_modal').html('Não foi possível registrar agendamento, pois o médico não estará disponivel neste horário');
                        $('#alert_erro_modal').show();
                        $('input').focus(function(){
                            $('#alert_erro_modal').fadeOut();
                        });

                    }else if(data==='2'){
                        $('#alert_erro_modal').html('Não foi possivel realizar o agendamento, entre em contato com o administrador do sistema!');
                        $('#alert_erro_modal').show();
                        $('input').focus(function(){
                            $('#alert_erro_modal').fadeOut();
                        });

                    }

                });
            }
        });
    });

    //AJAX EXCLUIR AGENDAMENTO
    $('.btn_excluir').click(function () {

        var id = $(this).attr('id');
        console.log(id);

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/delete_agendamento.php',
            type: 'post',
            dataType: 'text',
            data: {'id':id},
            beforeSend: function () {
                $('html, body').animate({
                    scrollTop: $( $("#load") ).offset().top
                }, 200);
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='1'){
                        $('#modalAgenda').modal('hide');

                        $('#alert_sucesso').html('Agendamento deletado com sucesso');
                        $('#alert_sucesso').show();
                        setTimeout(function () {
                            window.location.reload();
                        }, 800);
                    }else if(data===2){
                        $('#modalAgenda').modal('hide');
                        $('#alert_erro').html('Erro ao deletar agendamento, entre em contato com o administrador do sistema');
                        $('#alert_erro').show();
                    }
                });
            }
        });
    });

    //AJAX REALIZAR CONSULTA
    $('.btn_realizar').click(function () {

        var id = $(this).attr('id');
        console.log(id);

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/ajax_realiza_consulta.php',
            type: 'post',
            dataType: 'text',
            data: {'id':id},
            beforeSend: function () {
                $('html, body').animate({
                    scrollTop: $( $("#load") ).offset().top
                }, 200);
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {

                    if(data==='1'){
                        $('#modalAgenda').modal('hide');

                        $('#alert_sucesso').html('Consulta realizada!');
                        $('#alert_sucesso').show();
                        setTimeout(function () {
                            window.location.reload();
                        }, 800);
                    }else if(data==='2'){
                        $('#modalAgenda').modal('hide');
                        $('#alert_erro').html('Erro ao realizar a consulta, favor entre em contato com o administrador do sistema');
                        $('#alert_erro').show();
                    }
                });
            }
        });
    });

    //AJAX ATUALIZAR CONSULTA
    $('#form-editar .btn_atualizar').click(function () {

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/editar_agendamento.php',
            type: 'post',
            dataType: 'text',
            data: $('#form-editar').serialize(),
            beforeSend: function () {
                $('html, body').animate({
                    scrollTop: $( $("#load") ).offset().top
                }, 200);
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {

                    if(data==='1'){

                        $('.alert_sucesso_modal').html('Agendamento alterado com sucesso!');
                        $('.alert_sucesso_modal').show();
                        setTimeout(function () {
                            $('#modalAgenda').modal('hide');
                            window.location.reload();
                        }, 1000);

                    }else if(data==='4'){
                        $('.alert_erro_modal').html('Não é possivel registrar consulta com horario/data final menor ou igual a(o) horario/data inicial');
                        $('.alert_erro_modal').show();
                        $('input').focus(function(){
                            $('.alert_erro_modal').fadeOut();
                        });

                    }else if(data==='3'){
                        $('.alert_erro_modal').html('Não foi possível registrar agendamento, pois o médico não estará disponivel neste horário');
                        $('.alert_erro_modal').show();
                        $('input').focus(function(){
                            $('.alert_erro_modal').fadeOut();
                        });

                    }else if(data==='2'){
                        $('.alert_erro_modal').html('Não foi possivel atualizar o agendamento, entre em contato com o administrador do sistema!');
                        $('.alert_erro_modal').show();
                        $('input').focus(function(){
                            $('.alert_erro_modal').fadeOut();
                        });

                    }
                });
            }
        });
    });
});