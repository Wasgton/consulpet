<?php

include_once '../config.php';

$id = $_POST['id'];

//VALIDA SE ALGUM CLIENTE ESTÁ VINCULADA A CIDADE
$query_validacao = "select end_id_endereco
                    from end_endereco 
                    where end_id_cidade = $id";

if($res = mysqli_query(connect(),$query_validacao)){

    if($dados = mysqli_fetch_array($res)!= ""){
       echo '4';
        exit;
    }else{
        //DELETA A ESPÉCIE
        $delete_cidade = "delete from cid_cidade
                          where cid_id_cidade = $id";

        if(mysqli_query(connect(),$delete_cidade)){

            echo '1';
            exit;

        }else{
            echo '2';
        }
    }
}else{
    echo '3';
}


