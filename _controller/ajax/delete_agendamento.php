<?php

include_once '../config.php';

$id = $_POST['id'];

$delete_animal = "delete 
                  from atd_atendimento
                  where atd_id_atendimento = $id";

if(mysqli_query(connect(),$delete_animal)){

    echo '1';
    exit;

}else{
    echo '2';
}