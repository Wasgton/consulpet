<?php

include_once '../config.php';

$id = $_POST['id'];


$query_validacao = "SELECT 1 as result
                    FROM ani_animal
                    WHERE ani_id_raca = $id";

if($res = mysqli_query(connect(),$query_validacao)){
    $dados = mysqli_fetch_array($res);

    if($dados['result']==1){
        echo '4';
        exit;
    }else{

        $query_validacao_status = "SELECT rac_st_raca
                                   FROM rac_raca
                                   WHERE rac_id_raca = $id";

        if($res_status = mysqli_query(connect(),$query_validacao_status)){
            $dados_status = mysqli_fetch_array($res_status);

            if($dados_status['rac_st_raca']){
                echo '3';
                exit;
            }else{
                $delete_animal = "delete from rac_raca
                                  where rac_id_raca = $id";

                if(mysqli_query(connect(),$delete_animal)){

                    echo '1';
                    exit;

                }else{
                    echo '2';
                    exit;
                }
            }
        }
    }
}


