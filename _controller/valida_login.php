<?php

include_once 'config.php';

session_start();
error_reporting(1);


$usuario = strtolower($_POST['user']);
$senha = sha1($_POST['senha']);

$query ="SELECT usr_id_usuario,
               pes_nm_pessoa,
               usr_tipo_usuario,
               pes_id_pessoa
         FROM usr_usuario inner join pes_pessoa on usr_id_pessoa = pes_id_pessoa
         where usr_login_usuario = '$usuario'
         and usr_password_usuario = '$senha'
         and usr_st_usuario = 1";

if($result = mysqli_query(connect(),$query)) {
    $dados = mysqli_fetch_array($result);

    if ($dados !== null) {

        $_SESSION["id"] = $dados['usr_id_usuario'];
        $_SESSION["usuario"] = $dados['pes_nm_pessoa'];
        $_SESSION['tipo'] = $dados['usr_tipo_usuario'];
        $_SESSION['id_pessoa'] = $dados['pes_id_pessoa'];

        echo '1';

    }else{
        echo 'Usuário ou senha incorretos!';
    }
}else{
    echo 'Erro ao tentar realizar o login, entre em contato com a administração do sistema!!';
}

