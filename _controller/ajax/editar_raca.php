<?php

include_once '../config.php';

//DADOS DE RAÇA
$id     = $_POST['id_raca'];
$nome   = $_POST['nome'];
$especie= $_POST['especie'];

if(isset($_POST['status'])){
    $status = '1';
}else{
    $status = '0';
}

$query_raca = "UPDATE rac_raca
                 SET rac_ds_raca = '$nome',
                     rac_st_raca = $status,
                     rac_id_tipo  = $especie
                 WHERE rac_id_raca = $id;";

if(mysqli_query(connect(),$query_raca)) {
    echo '1';
}else{
    echo '2';
}