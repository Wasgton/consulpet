$(document).ready(function() {


//AJAX CADASTRO DE ESPECIE
    $('#cadastrar_especie').click(function () {

        event.preventDefault();

        if($('#nome').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
        }else{
            $.ajax({
                url: url + '/_controller/ajax/insert_especie.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-especie').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if(data==='2'){
                            $('#alert_erro_cadastros').html('Erro ao cadastrar a especie');
                            $('#alert_erro_cadastros').show();
                        }else if(data==='1'){
                            $('#alert_sucesso_cadastros').html('Especie cadastrada com sucesso!');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/especies';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });

    //AJAX DELEÇÃO DE ESPECIE
    $('.delete_especie').click(function () {

        var especie_id = $(this).attr("id");

        $.ajax({
            url: url + '/_controller/ajax/delete_especie.php',
            type: 'post',
            dataType: 'text',
            data: 'id=' + especie_id,
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='2'){
                        alert('Erro ao tentar deletar a espécie');
                    }else if(data==='1'){
                        alert('Espécie deletada com sucesso');
                        window.location.reload();
                    }else{
                        alert(data);
                    }
                });
            }
        });
    });



//AJAX EDIÇÃO DE CLIENTE
    $('#editar_especie').click(function () {

        event.preventDefault();
        if($('#nome').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
        }else {
            $.ajax({
                url: url + '/_controller/ajax/editar_especie.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-especie').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '2') {
                            alert('Erro ao atualizar os dados do animal!');
                        } else if (data === '1') {
                            alert('Dados atualizados com sucesso');
                            window.location.href = url + '/especies';
                        }
                    });
                }
            });
        }
    });



});