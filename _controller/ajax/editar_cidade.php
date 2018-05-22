<?php

include_once '../config.php';

//DADOS DA CIDADE
$cidade  = $_POST['cidade'];
$estado  = $_POST['estado'];
$id      = $_POST['id_cidade'];

$query_cidade = "UPDATE cid_cidade
                 SET cid_ds_cidade ='$cidade',
                     cid_est_cidade ='$estado'
                 WHERE cid_id_cidade = $id;";

if(mysqli_query(connect(),$query_cidade)) {
    echo '1';
}else{
    echo '2';
}