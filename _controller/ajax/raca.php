<?php
include_once '../config.php';

$id_tipo = $_POST['id'];

$query_raca = "SELECT * FROM rac_raca WHERE rac_id_tipo = $id_tipo";

$res_raca = mysqli_query(connect(),$query_raca);

echo "<option id='0'>--Escolha a raça do animal--</option>";

while($dados_raca = mysqli_fetch_array($res_raca)){
    $id = $dados_raca['rac_id_raca'];
    $raca = utf8_encode($dados_raca['rac_ds_raca']);



    echo  "<option class='option' id='$id' value='$id'>$raca</option>";
}