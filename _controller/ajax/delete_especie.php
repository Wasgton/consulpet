<?php

include_once '../config.php';

$id = $_POST['id'];

//VALIDA SE ALGUMA RAÇA ESTÁ VINCULADA A ESPÉCIE
$query_validacao = "select rac_ds_raca 
                    from rac_raca 
                    where rac_id_tipo = $id";

if($res = mysqli_query(connect(),$query_validacao)){

    if($dados = mysqli_fetch_array($res)!= ""){
        echo "Não é possivel excluir a espécie pois está vinculada a uma ou mais raças";
        exit;
    }else{

        //VALIDA SE A ESPÉCIE ESTÁ ATIVA
        $query_status = "SELECT tpa_st_tipo 
                         FROM tpa_tipo_animal 
                         WHERE tpa_id_tipo = $id";

        $res = mysqli_query(connect(),$query_status);
        $dados = mysqli_fetch_array($res);

        if($dados['tpa_st_tipo']==1){
            echo "Não é possivel excluir uma espécie ativa!";
        }else{
            //DELETA A ESPÉCIE
            $delete_especie = "delete from tpa_tipo_animal
                   where tpa_id_tipo = $id";

            if(mysqli_query(connect(),$delete_especie)){

                echo '1';
                exit;

            }else{
                echo '2';
            }
        }
    }

}else{
    echo "Erro ao verificar se a especie está sendo utilizada.";
}


