$(document).ready(function() {


//AJAX CADASTRO DE CIDADE
    $('#cadastrar_cidade').click(function () {

        event.preventDefault();
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
                    if(data==='2'){
                        alert('Erro ao cadastrar a cidade');
                    }else if(data==='1'){
                        alert('Cidade cadastrada com sucesso!');
                        window.location.href = url + '/cidades';
                    }
                });
            }
        });
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
                    if(data==='2'){
                        alert('Erro ao atualizar os dados da cidade!');
                    }else if(data==='1'){
                        alert('Dados atualizados com sucesso');
                        window.location.href = url + '/cidades';
                    }
                });
            }
        });
    });



});