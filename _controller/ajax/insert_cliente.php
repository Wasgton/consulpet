<?php

include_once '../config.php';

//DADOS DE PESSOA
$nome   = $_POST['nome'];
$sbnome = $_POST['sobrenome'];
$sexo   = $_POST['sexo'];
$cpf    = $_POST['cpf'];

$caracteres = array('.','-');
$cpf = str_replace($caracteres,'',$cpf);

//DADOS DE USUARIO

$login          = $cpf;
$tipo_usuario   = 4;
$senha          = sha1(123456);
$status         = '1';

//DADOS CLIENTE
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$bairro   = $_POST['bairro'];
$cidade   = $_POST['cidade'];


$query_pessoa = "INSERT INTO pes_pessoa
                 (pes_nm_pessoa,pes_sbnm_pessoa,pes_sexo_pessoa,pes_cpf_pessoa)
                 VALUES
                 ('$nome','$sbnome','$sexo','$cpf');";

$con = connect();

if(mysqli_query($con,$query_pessoa)) {

    $id_pessoa = mysqli_insert_id($con);

    $query_usuario = "INSERT INTO usr_usuario 
                      (usr_id_pessoa,usr_tipo_usuario,usr_login_usuario,
                      usr_password_usuario,usr_st_usuario)
                      VALUES
                      ($id_pessoa,$tipo_usuario,'$login','$senha',$status)";

    if(mysqli_query(connect(),$query_usuario)){
        $query_cliente = "INSERT INTO cli_cliente
                          (cli_id_pessoa, cli_tel_cliente)
                          VALUES
                          ($id_pessoa,'$telefone')";

        $con_end = connect();

        if(mysqli_query($con_end,$query_cliente)){

            $id_cliente = mysqli_insert_id($con_end);

            $query_endereco = "INSERT INTO end_endereco
                               (end_id_cidade, end_id_cliente, end_bairro_endereco, end_ds_endereco)
                               VALUES
                               ($cidade,$id_cliente,'$bairro','$endereco')";
            if(mysqli_query(connect(),$query_endereco)){
                echo '1';
                exit;
            }
        }else{
            echo '4';
            exit;
        }
    }else{
        echo '3';
        exit;
    }
}else{
    echo '2';
    exit;
}
