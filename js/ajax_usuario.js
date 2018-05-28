$(document).ready(function() {

    $('input').focus(function(){
        $('#alert_erro_cadastros').fadeOut();
    });

//AJAX EDIÇÃO DE USUARIO
    $('#editar_usuario').click(function () {

        event.preventDefault();

        if($('#cpf').val()==="" || $('#nome').val()==="" || $('#sobrenome').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {

            $.ajax({
                url: url + '/_controller/ajax/editar_usuario.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-usuario').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '0') {
                            $('#alert_erro_cadastros').html('Erro ao atualizar os dados da pessoa, favor entrar em contato com o administrador do sistema!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao atualizar os dados do usuario, favor entrar em contato com o administrador do sistema!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '4') {
                            $('#alert_erro_cadastros').html('Senhas não correspondem!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '5') {
                            $('#alert_erro_cadastros').html('Erro ao verificar o tipo do cliente');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '3') {
                            $('#alert_erro_cadastros').html('Para criar um usuario do tipo cliente use a interface de clientes');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Dados do usuario atualizados com sucesso!');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/usuarios';
                            }, 1000);
                        }
                    });

                }
            });
        }
    });

//AJAX CADASTRO DE USUARIO
    $('#cadastrar_usuario').click(function () {
        event.preventDefault();
        if($('#cpf').val()==="" || $('#nome').val()==="" || $('#sobrenome').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else{

            $.ajax({
                url: url + '/_controller/ajax/insert_user.php',
                type: 'post',
                dataType: 'text',
                data: $('#form-usuario').serialize(),
                beforeSend: function () {
                    $("#load").show();
                },
                success: function (data) {
                    $("#load").fadeOut(2000, function () {
                        if (data === '0') {
                            $('#alert_erro_cadastros').html('Usuário já cadastrado');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao cadastrar a pessoa, favor entrar em contato com o administrador do sistema!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Usuario inserido com sucesso!');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/usuarios';
                            }, 1000);
                        } else if (data === '3') {
                            $('#alert_sucesso_cadastros').html('Erro ao cadastrar o usuario, favor entrar em contato com o administrador do sistema!');
                            $('#alert_erro_cadastros').show();
                        }else if (data === '4') {
                            $('#alert_erro_cadastros').html('Senhas não correspondem!');
                            $('#alert_erro_cadastros').show();
                        }
                    });

                }
            });
        }
    });

//AJAX DELEÇÃO DE USUARIO
    $('.delete_user').click(function () {

        var user_id = $(this).attr("id");

        $.ajax({
            url: url + '/_controller/ajax/delete_usuario.php',
            type: 'post',
            dataType: 'text',
            data: 'id=' + user_id,
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if (data === '0') {
                        alert('Não é possivel excluir um usuario ativo!');
                    } else if (data === '1') {
                        alert('Erro ao deletar o usuario contacte o administrador do sistema!');
                    } else if (data === '2') {
                        alert('Usuário deletado com sucesso!');
                        window.location.reload();
                    }
                });

            }
        });
    });
});