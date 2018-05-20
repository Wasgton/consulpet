$(document).ready(function() {


//AJAX CADASTRO DE ESPECIE
    $('#cadastrar_especie').click(function () {

        event.preventDefault();
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
                        alert('Erro ao cadastrar a especie');
                    }else if(data==='1'){
                        alert('Especie cadastrada com sucesso!');
                        window.location.href = url + '/especies';
                    }
                });
            }
        });
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
                    if(data==='2'){
                        alert('Erro ao atualizar os dados do animal!');
                    }else if(data==='1'){
                        alert('Dados atualizados com sucesso');
                        window.location.href = url + '/especies';
                    }
                });
            }
        });
    });



});