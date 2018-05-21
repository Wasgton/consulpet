$(document).ready(function() {

$('#especie').change(function(){
    var especie = $('#especie option:selected').attr('id');
    $.ajax({
       url:url+'/_controller/ajax/racas.php',
       type:'post',
       dataType:'text',
       data:'id='+especie,
       success:function(data){
            $('#raca').html(data);

       }
    });
});


//AJAX CADASTRO DE USUARIO
    $('#cadastrar_animal').click(function () {

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/insert_animal.php',
            type: 'post',
            dataType: 'text',
            data: $('#form-animais').serialize(),
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='2'){
                        alert('Erro ao cadastrar o animal');
                    }else if(data==='1'){
                        alert('Animal cadastrado com sucesso!');
                        window.location.href = url + '/animais';
                    }
                });
            }
        });
    });

    //AJAX DELEÇÃO DE animal
    $('.delete_animal').click(function () {

        var animal_id = $(this).attr("id");

        $.ajax({
            url: url + '/_controller/ajax/delete_animal.php',
            type: 'post',
            dataType: 'text',
            data: 'id=' + animal_id,
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='2'){
                        alert('Erro ao tentar deletar o animal');
                    }else if(data==='1'){
                        alert('Animal deletado com sucesso');
                        window.location.reload();
                    }
                });
            }
        });
    });



//AJAX EDIÇÃO DE CLIENTE
    $('#editar_animal').click(function () {

        event.preventDefault();
        $.ajax({
            url: url + '/_controller/ajax/editar_animal.php',
            type: 'post',
            dataType: 'text',
            data: $('#form-animais').serialize(),
            beforeSend: function () {
                $("#load").show();
            },
            success: function (data) {
                $("#load").fadeOut(2000, function () {
                    if(data==='2'){
                        alert('Erro ao atualizar os dados do animal!');
                    }else if(data==='1'){
                        alert('Dados atualizados com sucesso');
                        window.location.href = url + '/animais';
                    }
                });
            }
        });
    });



});