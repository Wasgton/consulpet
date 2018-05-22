<?php

include_once '../config.php';

//DADOS DA CIDADE
$cidade    = $_POST['cidade'];
$estado  = $_POST['estado'];

$query_estado = "INSERT INTO cid_cidade
                 (cid_ds_cidade,cid_est_cidade)
                 VALUES
                 ('$cidade','$estado');";

if(mysqli_query(connect(),$query_estado)) {
    echo '1';
}else{
    echo '2';
}
