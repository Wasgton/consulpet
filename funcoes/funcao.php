<?php

include_once '../_controller/config.php';

function F_recupera_tipo(){

    $query_tipo = "SELECT * FROM tpu_tipo_usuario";

    $res_tipo = mysqli_query(connect(),$query_tipo);

    while($dados_tipo = mysqli_fetch_array($res_tipo)){
        $id = $dados_tipo['tpu_id_tipo_usuario'];
        $tipo = utf8_encode($dados_tipo['tpu_ds_tipo_usuario']);

        echo  "<option class='option' id='$id'>$tipo</option>";
    }


}
