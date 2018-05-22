<?php

include_once '../config.php';

//DADOS DA RAÇA
$nome    = $_POST['nome'];
$especie = $_POST['especie'];
$status  = '0';

if(isset($_POST['status'])){
    $status = '1';
}else if(!isset($_POST['status'])){
    $status = '0';
}

$query_raca = "INSERT INTO rac_raca
               (rac_ds_raca,rac_st_raca,rac_id_tipo)
               VALUES
               ('$nome',$status,$especie);";

if(mysqli_query(connect(),$query_raca)) {
    echo '1';
}else{
    echo '2';
}
