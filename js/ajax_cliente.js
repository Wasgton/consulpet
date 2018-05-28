$(document).ready(function() {

//AJAX CADASTRO DE USUARIO
$('#cadastrar_cliente').click(function () {

    event.preventDefault();
    if($('#cpf').val()==="" || $('#nome').val()==="" || $('#sobrenome').val()==="" || $('#telefone').val()===""){
        $('#alert_erro_cadastros').html('Preencha todos os campos');
        $('#alert_erro_cadastros').show();
        return false;
    }else {

        $.ajax({
            url: url + '/_controller/ajax/insert_cliente.php',
            type: 'post',
            dataType: 'text',
            data: $('#form-cliente').serialize(),
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {

                    $('#alert_sucesso_cadastros').html('Dados do usuario atualizados com sucesso!');
                    $('#alert_sucesso_cadastros').show();
                    if (data === '2') {
                        $('#alert_erro_cadastros').html('Erro ao cadastrar dados pessoais');
                        $('#alert_erro_cadastros').show();
                    } else if (data === '3') {
                        $('#alert_erro_cadastros').html('Erro ao criar usuario para o cliente');
                        $('#alert_erro_cadastros').show();
                    } else if (data === '4') {
                        $('#alert_erro_cadastros').html('Erro ao cadastrar dados do cliente');
                        $('#alert_erro_cadastros').show();
                    } else if (data === '1') {
                        $('#alert_sucesso_cadastros').html('Cliente cadastrado com sucesso!');
                        $('#alert_sucesso_cadastros').show();
                        setTimeout(function () {
                            window.location.href = url + '/clientes';
                        }, 1000);
                    }
                });
            }
        });
    }
});

//AJAX EDIÇÃO DE CLIENTE
    $('#editar_cliente').click(function () {

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/editar_cliente.php',
            type: 'post',
            dataType: 'text',
            data: $('#form-cliente').serialize(),
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='2'){
                        $('#alert_sucesso_cadastros').html('Erro ao atualizar os dados pessoais!');
                        $('#alert_sucesso_cadastros').show();
                    }else if(data==='4'){
                        $('#alert_sucesso_cadastros').html('Erro ao atualizar os dados do usuário!');
                        $('#alert_sucesso_cadastros').show();
                    }else if(data==='3') {
                        $('#alert_sucesso_cadastros').html('Erro ao atualizar os dados do cliente!');
                        $('#alert_sucesso_cadastros').show();
                    }else if(data==='1'){
                        $('#alert_sucesso_cadastros').html('Dados atualizados com sucesso');
                        $('#alert_sucesso_cadastros').show();
                        setTimeout(function () {
                            window.location.href = url + '/clientes';
                        }, 1000);
                    }
                });
            }
        });
    });

//AJAX DELEÇÃO DE USUARIO
    $('.delete_cliente').click(function () {

        var cliente_id = $(this).attr("id");

        $.ajax({
            url: url + '/_controller/ajax/delete_cliente.php',
            type: 'post',
            dataType: 'text',
            data: 'id=' + cliente_id,
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='0'){
                        alert('Não é possivel excluir cliente com usuario ativo!');
                    }else if(data==='1'){
                        alert('Erro ao apagar os registro de endereço!');
                    }else if(data==='2'){
                        alert('Erro ao apagar os registros de usuário!');
                    }else if(data==='3'){
                        alert('Não foi possivel apagar os registro de endereço!');
                    }else if(data==='4'){
                        alert('Não foi possivel apagar os registro de pessoa!');
                    }else if(data==='6'){
                        alert('Erro ao deletar as consultas marcadas para os animais do cliente!');
                    }else if(data==='7'){
                        alert('Erro ao deletar os animais vinculados ao cliente!');
                    }else if(data==='5'){
                        alert('Cliente deletado com sucesso!');
                        window.location.reload();
                    }
                });
            }
        });
    });
});