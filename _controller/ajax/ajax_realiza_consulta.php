<?php

include_once '../config.php';

$id = $_POST['id'];

$realiza_consulta = "UPDATE atd_atendimento
                      SET atd_st_atendimento = 2 
                      WHERE atd_id_atendimento = $id";


if(mysqli_query(connect(),$realiza_consulta)){

    echo '1';
    exit;

}else{
    echo '2';
}