<?php

include_once '../config.php';

//DADOS DA ESPECIE
$nome    = $_POST['nome'];
$status  = $_POST['status'];
$status  = '0';

if(isset($_POST['status'])){
    $status = '1';
}else if(!isset($_POST['status'])){
    $status = '0';
}


$query_especie = "INSERT INTO tpa_tipo_animal
               (tpa_ds_tipo,tpa_st_tipo)
               VALUES
               ('$nome',$status);";


if(mysqli_query(connect(),$query_especie)) {
    echo '1';
}else{
    echo '2';
}
