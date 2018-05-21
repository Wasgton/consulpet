<?php

include_once '../config.php';

//DADOS DE ANIMAL
$nome   = $_POST['nome'];
$dono = $_POST['dono'];
$idade = $_POST['idade'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];
$raca = $_POST['raca'];
$sexo   = $_POST['sexo'];
$vacinas   = $_POST['hist-vacinas'];
$doencas   = $_POST['hist-doencas'];


$query_animal = "INSERT INTO ani_animal
               (ani_id_raca,ani_id_cliente,ani_nm_animal,
               ani_idade_animal,ani_peso_animal,ani_altura_animal,
               ani_sexo_animal,ani_vacina_animal,ani_doenca_animal)
               VALUES
               ($raca,$dono,'$nome',$idade,$peso,$altura,'$sexo','$vacinas','$doencas');";

if(mysqli_query(connect(),$query_animal)) {
    echo '1';
}else{
    echo '2';
}
