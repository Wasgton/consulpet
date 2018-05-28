<?php

include_once '../config.php';

//DADOS DE PESSOA
$id_pessoa = $_POST['id_pessoa'];
$nome   = $_POST['nome'];
$sbnome = $_POST['sobrenome'];
$sexo   = $_POST['sexo'];
$cpf    = $_POST['cpf'];

//DADOS DE USUÁRIO
$login          = $cpf;

//DADOS CLIENTE
$id_cliente = $_POST['id_cliente'];
$id_endereco = $_POST['id_endereco'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$bairro   = $_POST['bairro'];
$cidade   = $_POST['cidade'];

$query_pessoa = "UPDATE pes_pessoa
                 SET pes_nm_pessoa='$nome',
                     pes_sbnm_pessoa='$sbnome',
                     pes_sexo_pessoa='$sexo',
                     pes_cpf_pessoa = '$cpf'
                 WHERE pes_id_pessoa = $id_pessoa";

if(mysqli_query(connect(),$query_pessoa)) {

    $query_usuario = "UPDATE usr_usuario
                      SET usr_login_usuario = '$cpf'
                      WHERE usr_id_pessoa = $id_pessoa";

    if(mysqli_query(connect(),$query_usuario)){

        $query_cliente = "UPDATE cli_cliente
                          SET cli_tel_cliente = '$telefone'
                          WHERE cli_id_cliente = $id_cliente";

        if(mysqli_query(connect(),$query_cliente)){

            $query_endereco = "UPDATE end_endereco
                               set end_id_cidade = $cidade,
                                   end_bairro_endereco = '$bairro', 
                                   end_ds_endereco ='$endereco'
                               WHERE end_id_endereco = $id_endereco";

            if(mysqli_query(connect(),$query_endereco)){
                echo '1';
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

}else{
    echo '4';
    exit;
}
