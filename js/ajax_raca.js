$(document).ready(function() {


    //AJAX CADASTRO DE RAÇA
    $('#cadastrar_raca').click(function () {

        event.preventDefault();

        if($('#nome').val()==="" || $('#especie').val()==="" ){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {

            $.ajax({
                url: url + '/_controller/ajax/insert_raca.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-raca').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao cadastrar a raça');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Raça cadastrada com sucesso!');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/racas';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });

    //AJAX DELEÇÃO DE RAÇA
    $('.delete_raca').click(function () {

        var raca_id = $(this).attr("id");

        $.ajax({
            url: url + '/_controller/ajax/delete_raca.php',
            type: 'post',
            dataType: 'text',
            data: 'id=' + raca_id,
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='4'){
                        alert('Não é possivel remover raça vinculada a um animal');
                    }else if(data==='3'){
                        alert('Não é possivel remover raça vinculada com status ativo!');
                        window.location.reload();
                    }else if(data==='2'){
                        alert('Não foi possivel excluir a raça, contacte o administrador!');
                        window.location.reload();
                    }else if(data==='1'){
                        alert(data);
                    }
                });
            }
        });
    });

    //AJAX EDIÇÃO DE RAÇA
    $('#editar_raca').click(function () {

        event.preventDefault();

        if($('#nome').val()==="" || $('#especie').val()==="" ){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {
            $.ajax({
                url: url + '/_controller/ajax/editar_raca.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-raca').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao atualizar os dados da raça!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Dados atualizados com sucesso');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/racas';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });
});