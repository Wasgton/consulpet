$(document).ready(function() {

//AJAX CADASTRO DE USUARIO
$('#cadastrar_cliente').click(function () {

    event.preventDefault();
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
                if(data==='2'){
                    alert('Erro ao cadastrar dados pessoais');
                }else if(data==='3'){
                    alert('Erro ao criar usuario para o cliente');
                }else if(data==='4'){
                    alert('Erro ao cadastrar dados do cliente');
                }else if(data==='1'){
                    alert('Cliente cadastrado com sucesso!');
                    window.location.href = url + '/clientes';
                }
            });
        }
    });
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
                        alert('Erro ao atualizar os dados pessoais!');
                    }else if(data==='3'){
                        alert('Erro ao atualizar os dados do cliente!');
                    }else if(data==='1'){
                        alert('Dados atualizados com sucesso');
                        window.location.href = url + '/clientes';
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
                    }else if(data==='5'){
                        alert('Cliente deletado com sucesso!');
                        window.location.reload();
                    }
                });
            }
        });
    });
});