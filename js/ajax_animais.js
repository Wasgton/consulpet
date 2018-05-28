$(document).ready(function() {

$('#especie').change(function(){
    var especie = $('#especie option:selected').val();
    $.ajax({
       url:url+'/_controller/ajax/raca.php',
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

        if($('#nome').val()==="" || $('#idade').val()==="" || $('#peso').val()==="" || $('#altura').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {

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
                        if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao cadastrar o animal');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Animal cadastrado com sucesso!');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/animais';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });

    //AJAX DELEÇÃO DE ANIMAL
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
                    if(data==='3'){
                        alert('Erro ao deletar as consultas marcadas para o animal');
                    }else if(data==='2'){
                        alert('Erro ao tentar deletar o animal');
                    }else if(data==='1'){
                        alert('Animal deletado com sucesso');
                        window.location.reload();
                    }
                });
            }
        });
    });



//AJAX EDIÇÃO DE ANIMAL
    $('#editar_animal').click(function () {

        event.preventDefault();
        if($('#nome').val()==="" || $('#idade').val()==="" || $('#peso').val()==="" || $('#altura').val()===""){
            $('#alert_erro_cadastros').html('Preencha todos os campos');
            $('#alert_erro_cadastros').show();
            return false;
        }else {
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
                        if (data === '2') {
                            $('#alert_erro_cadastros').html('Erro ao atualizar os dados do animal!');
                            $('#alert_erro_cadastros').show();
                        } else if (data === '1') {
                            $('#alert_sucesso_cadastros').html('Dados atualizados com sucesso');
                            $('#alert_sucesso_cadastros').show();
                            setTimeout(function () {
                                window.location.href = url + '/animais';
                            }, 1000);
                        }
                    });
                }
            });
        }
    });

});