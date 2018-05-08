<?php

include_once '../config.php';

//DADOS DE PESSOA
$id = $_POST['id'];
$nome   = $_POST['nome'];
$sbnome = $_POST['sobrenome'];
$sexo   = $_POST['sexo'];

//DADOS DE USUARIO
$words          = explode(' ',$sbnome);
$login          = strtolower($nome.'.'.$words[count($words)-1]);
$CRVM           = $_POST['crmv'];
$tipo_usuario   = $_POST['tipo'];
$senha          = sha1($_POST['Senha']);
$sexo           = $_POST['sexo'];

if(isset($_POST['status'])){
    $status = '1';
}else if(!isset($_POST['status'])){
    $status = '0';
}

$query_pessoa = "UPDATE pes_pessoa
                 SET pes_nm_pessoa = '$nome',
                     pes_sbnm_pessoa = '$sbnome',
                     pes_sexo_pessoa = '$sexo'
                 WHERE pes_id_pessoa = $id;";




if(mysqli_query(connect(),$query_pessoa)) {

    $query_usuario = "UPDATE usr_usuario 
                      SET usr_tipo_usuario = $tipo_usuario,";

    if ($tipo_usuario === '3') {
      $query_usuario .= "usr_crmv_usuario = $CRVM,";
    }else{
        $query_usuario .= "usr_crmv_usuario = null,";
    }

    $query_usuario .= "usr_login_usuario = '$login',";

    //VERIFICA SE O CAMPO DE SENHA FOI INSERIDO PARA ALTERAÇÃO E ACRESCENTA AO UPDATE
    if ($senha !== '') {
        $query_usuario .= "usr_password_usuario = '$senha',";
    }

    $query_usuario .= "usr_st_usuario = $status
                       WHERE usr_id_usuario = $id;";

    if(mysqli_query(connect(),$query_usuario)){
        echo 1;
    }else{
        echo 2;
    }
}else{
    echo 0;
}

