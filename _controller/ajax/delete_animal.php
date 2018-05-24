<?php

include_once '../config.php';

$id = $_POST['id'];

$delete_animal = "delete from ani_animal
                  where ani_id_animal = $id";

if(mysqli_query(connect(),$delete_animal)){

    echo 'Agendamento deletado com sucesso!';
    exit;

}else{
    echo 'Erro ao deletar agendamento, entre em contato com o administrador do sistema!';
}