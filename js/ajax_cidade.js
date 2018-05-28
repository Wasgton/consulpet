$(document).ready(function() {


//AJAX CADASTRO DE CIDADE
    $('#cadastrar_cidade').click(function () {

        event.preventDefault();
        if($('#cidade').val()==="" || $('#estado').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {
            $.ajax({
                url: url + '/_controller/ajax/insert_cidade.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-cidade').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao cadastrar a cidade');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Cidade cadastrada com sucesso!');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/cidades';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });

    //AJAX DELEÇÃO DE CIDADE
    $('.delete_cidade').click(function () {

        var cidade_id = $(this).attr("id");

        $.ajax({
            url: url + '/_controller/ajax/delete_cidade.php',
            type: 'post',
            dataType: 'text',
            data: 'id=' + cidade_id,
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='4'){
                        alert("Não é possivel excluir a cidade pois está vinculada a um ou mais clientes");
                    }else if(data==='3') {
                        alert("Erro ao verificar se a cidade está sendo utilizada.");
                    }else if(data==='2'){
                        alert('Erro ao tentar deletar a cidade');
                    }else if(data==='1'){
                        alert('Cidade deletada com sucesso');
                        window.location.reload();
                    }else{
                        alert(data);
                    }
                });
            }
        });
    });



//AJAX EDIÇÃO DE CLIENTE
    $('#editar_cidade').click(function () {

        event.preventDefault();
        if($('#cidade').val()==="" || $('#estado').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {
            $.ajax({
                url: url + '/_controller/ajax/editar_cidade.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-cidade').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '2') {
                            $('#alert_erro_cadastros')('Erro ao atualizar os dados da cidade!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Dados atualizados com sucesso');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/cidades';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });



});