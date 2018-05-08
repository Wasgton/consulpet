<?php

include_once 'config.php';

session_start();

$usuario = $_POST['user'];
$senha = sha1($_POST['senha']);

$query ="SELECT usr_id_usuario,
               pes_nm_pessoa
         FROM usr_usuario inner join pes_pessoa on usr_id_pessoa = pes_id_pessoa
         where usr_login_usuario = '$usuario'
         and usr_password_usuario = '$senha'
         and usr_st_usuario = 1";

if($result = mysqli_query(connect(),$query)) {
    $dados = mysqli_fetch_array($result);

    if ($dados !== null) {

        $_SESSION["id"] = $dados['usr_id_usuario'];
        $_SESSION["usuario"] = $dados['pes_nm_pessoa'];

        echo 1;

    }else{
        echo 0;
    }
}else{
    echo 2;
}

