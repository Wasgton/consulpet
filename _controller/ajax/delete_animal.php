<?php

include_once '../config.php';

$id = $_POST['id'];

$delete_atendimento = "delete from atd_atendimento
                       WHERE atd_id_animal = $id";

if(mysqli_query(connect(),$delete_atendimento)){
    $delete_animal = "delete from ani_animal
                  where ani_id_animal = $id";

    if(mysqli_query(connect(),$delete_animal)){

        echo '1';
        exit;

    }else{
        echo '2';
    }
}else{
    echo '3';
}


