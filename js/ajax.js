$(document).ready(function(){
    $('#alert_login').hide();

    //AJAX CONTROLE DE LOGIN

    $('#submit').click(function(){
        event.preventDefault();
        var user = $('#user').val();
        var pass = $('#senha').val();

        if(user.length>0 && pass.length>0){
            $.ajax({
                url:url+'/_controller/valida_login.php',
                type: 'post',
                dataType: 'text',
                data:{user:user,senha:pass},
                success: function (data) {
                    $('#alert_login').hide();

                    if(data==='1'){
                        window.location.href=url+'/home';
                    }else{
                        // console.log(data)
                        $('#alert_login').html(data);
                        $('#alert_login').show();
                    }


                    // if(data==='0'){
                    //     alert('Usuário ou senha incorretos!');
                    // }else if(data==='2'){
                    //     alert('Erro ao tentar realizar o login contacte o administrador do sistema!');
                    // }else

                }
            });
            return false;
        }else{
            alert('Preencha todos os campos');
            return false;
        }
    });

    $('input').focus(function(){
        $('#alert_login').fadeOut('slow');
    });


});