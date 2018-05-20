<?php

include_once '../config.php';

//DADOS DE ANIMAL
$id     = $_POST['id_especie'];
$nome   = $_POST['nome'];

if(isset($_POST['status'])){
    $status = '1';
}else{
    $status = '0';
}

$query_especie = "UPDATE tpa_tipo_animal
                 SET tpa_ds_tipo='$nome',
                     tpa_st_tipo=$status
                 WHERE tpa_id_tipo = $id;";

if(mysqli_query(connect(),$query_especie)) {
    echo '1';
}else{
    echo '2';
}