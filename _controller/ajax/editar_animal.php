<?php

include_once '../config.php';

//DADOS DE ANIMAL
$id = $_POST['id_animal'];
$nome   = $_POST['nome'];
$dono = $_POST['dono'];
$idade = $_POST['idade'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];
$raca = $_POST['raca'];
$sexo   = $_POST['sexo'];
$vacinas   = $_POST['hist-vacinas'];
$doencas   = $_POST['hist-doencas'];

$query_animal = "UPDATE ani_animal
                 SET ani_id_raca=$raca,
                     ani_id_cliente=$dono,
                     ani_nm_animal='$nome',
                     ani_idade_animal='$idade',
                     ani_peso_animal='$peso',
                     ani_altura_animal=$altura,
                     ani_sexo_animal='$sexo',
                     ani_vacina_animal='$vacinas',
                     ani_doenca_animal='$doencas'
                 WHERE ani_id_animal = $id;";


if(mysqli_query(connect(),$query_animal)) {
    echo '1';
}else{
    echo '2';
}