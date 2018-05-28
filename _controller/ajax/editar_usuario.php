<?php

include_once '../config.php';

//DADOS DE PESSOA
$id = $_POST['id'];
$nome   = $_POST['nome'];
$sbnome = $_POST['sobrenome'];
$sexo   = $_POST['sexo'];
$cpf    = $_POST['cpf'];


//DADOS DE USUARIO
$login          = $cpf;
$CRVM           = $_POST['crmv'];
$tipo_usuario   = $_POST['tipo'];


$senha          = $_POST['Senha'];
$sexo           = $_POST['sexo'];
$confirmacao    = $_POST['confirmacao'];

if($senha<>$confirmacao){
    echo '4';
    exit;
}

$validacao_usuario = "";

$valida_usuario = "SELECT usr_tipo_usuario
                   FROM usr_usuario
                   WHERE usr_id_pessoa = $id";


if($res = mysqli_query(connect(),$valida_usuario)){

    $dados = mysqli_fetch_array($res);

    if($dados['usr_tipo_usuario']!=4){
        if($tipo_usuario=='4'){
            $tipo_usuario = $dados['usr_tipo_usuario'];
            echo '3';
            exit;
        }
    }
}else{
    echo '5';
    exit;
}


$caracteres = array('.','-');


$cpf = str_replace($caracteres,'',$cpf);


if(isset($_POST['status'])){
    $status = '1';
}else if(!isset($_POST['status'])){
    $status = '0';
}

$query_pessoa = "UPDATE pes_pessoa
                 SET pes_nm_pessoa = '$nome',
                     pes_sbnm_pessoa = '$sbnome',
                     pes_sexo_pessoa = '$sexo',
                     pes_cpf_pessoa = '$cpf'
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
        $senha = sha1($_POST['Senha']);
        $query_usuario .= "usr_password_usuario = '$senha',";
    }

    $query_usuario .= "usr_st_usuario = $status
                       WHERE usr_id_pessoa = $id;";


    if(mysqli_query(connect(),$query_usuario)){
        echo 1;
    }else{
        echo 2;
    }
}else{
    echo 0;
}

