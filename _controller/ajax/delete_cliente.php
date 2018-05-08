<?php

include_once '../config.php';

$id = $_POST['id'];

$query_validacao = "SELECT 1 as retorno
                    FROM usr_usuario
                    INNER JOIN cli_cliente ON cli_id_pessoa = usr_id_pessoa
                    WHERE cli_id_cliente = $id
                    AND usr_st_usuario = 1";

if($rs = mysqli_query(connect(),$query_validacao)){
    $dados = mysqli_fetch_array($rs);

    if($dados['retorno']==1){
        echo '0';
        exit;
    }else{

        $query_id_pessoa = "SELECT pes_id_pessoa 
                            FROM pes_pessoa 
                            INNER JOIN cli_cliente on cli_id_pessoa = pes_id_pessoa
                            WHERE cli_id_cliente = $id";

        $res = mysqli_query(connect(),$query_id_pessoa);
        $dados = mysqli_fetch_array($res);
        $id_pessoa = $dados['pes_id_pessoa'];

        $delete_end = "delete from end_endereco
                       where end_id_cliente = $id";

        $delete_usr = "delete from usr_usuario
                       where usr_id_pessoa = $id_pessoa";

        $delete_cli = "delete from cli_cliente
                       where cli_id_cliente = $id";

        $delete_pes = "delete from pes_pessoa
                       where pes_id_pessoa = $id_pessoa";

        if(mysqli_query(connect(),$delete_end)){
            if(mysqli_query(connect(),$delete_usr)){
                if(mysqli_query(connect(),$delete_cli)){
                    if(mysqli_query(connect(),$delete_pes)){
                        echo '5';
                        exit;
                    }else{
                        echo '4';
                        exit;
                    }
                }else {
                    echo '3';
                    exit;
                }
            }else{
                echo '2';
                exit;
            }
        }else {
            echo '1';
            exit;
        }

    }
}