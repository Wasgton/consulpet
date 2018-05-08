<?php

include_once 'config.php';

$id = $_POST['id'];

$query_validacao = "SELECT 1 as retorno
                    FROM usr_usuario
                    WHERE usr_id_usuario = $id
                    AND usr_st_usuario = 1";

if($rs = mysqli_query(connect(),$query_validacao)){
    $dados = mysqli_fetch_array($rs);

    if($dados['retorno']==1){
        echo '0';
        exit;
    }else{
        $delete_usr = "delete from usr_usuario
                       where usr_id_usuario = $id";

        $delete_pes = "delete from pes_pessoa
                       where pes_id_pessoa = $id";

        if(mysqli_query(connect(),$delete_usr)){
            mysqli_query(connect(),$delete_pes);

            echo '2';
            exit;

        }else{
            echo '1';
        }


    }
}