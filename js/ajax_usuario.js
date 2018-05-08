$(document).ready(function() {

//AJAX EDIÇÃO DE USUARIO
    $('#editar_usuario').click(function () {

        event.preventDefault();
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
                        alert('Erro ao atualizar os dados da pessoa, favor entrar em contato com o administrador do sistema!');
                    } else if (data === '2') {
                        alert('Erro ao atualizar os dados do usuario, favor entrar em contato com o administrador do sistema!');
                    } else if (data === '1') {
                        alert('Dados do usuario atualizados com sucesso!');
                        window.location.href = url + '/usuarios';
                    }
                });

            }
        });
    });

//AJAX CADASTRO DE USUARIO
    $('#cadastrar_usuario').click(function () {

        event.preventDefault();
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
                        alert('Usuário já cadastrado');
                    } else if (data === '2') {
                        alert('Erro ao cadastrar a pessoa, favor entrar em contato com o administrador do sistema!');
                    } else if (data === '1') {
                        alert('Usuario inserido com sucesso!');
                        window.location.href = url + '/usuarios';
                    } else if (data === '3') {
                        alert('Erro ao cadastrar o usuario, favor entrar em contato com o administrador do sistema!');
                    }
                });

            }
        });
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