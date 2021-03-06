<?php

include_once '../config.php';

session_start();

$descricao  = $_POST['descricao'];
$animal     = $_POST['animal'];
$medico     = $_POST['medico'];
$start      = $_POST['start'];
$end        = $_POST['end'];
$observacao = $_POST['observacao'];

//FORMATAÇÃO DATA INICIO
$data_inicio = explode( ' ' , $start );
list($data,$hora) = $data_inicio;
$data_sem_barra = array_reverse(explode("/",$data));
$data_sem_barra = implode("-",$data_sem_barra);
$data_inicio = $data_sem_barra." ". $hora;

//FORMATAÇÃO DATA FIM
$data_fim = explode(' ',$end);
list($data,$hora) = $data_fim;
$data_sem_barra = array_reverse(explode("/",$data));
$data_sem_barra = implode("-",$data_sem_barra);
$data_fim = $data_sem_barra." ". $hora;

$inicio = $data_inicio;
$fim = $data_fim;

//VERIFICA SE A DATA E HORA INICIAL É MENOR QUE A FINAL
if($fim<$inicio){
    echo '4';
    exit;
}else{
    // VALIDA SE O MEDICO JÁ TEM OUTRO AGENDAMENTO ENTRE OS HORARIOS SOLICITADOS
    $query_validacao = "SELECT *
                        FROM atd_atendimento
                        WHERE (atd_inicio_atendimento BETWEEN '$inicio' AND '$fim')
                        OR (atd_fim_atendimento BETWEEN '$inicio' AND '$fim')
                        OR ('$inicio' BETWEEN atd_inicio_atendimento AND atd_fim_atendimento)
                        OR ('$fim' BETWEEN atd_inicio_atendimento AND atd_fim_atendimento)
                        AND atd_id_medico = $medico";


    if($res = mysqli_query(connect(),$query_validacao)){
        $dados = mysqli_fetch_array($res);

        if($dados!==null){

            $data_inicio = explode(' ',$dados['atd_inicio_atendimento']);
            list($data_inicio,$hora_inicio) = $data_inicio;


            $data_fim =explode(' ', $dados['atd_fim_atendimento']);
            list($data_fim,$hora_fim) = $data_fim;


            echo '3';
            exit;
        }else{
            $query_insert = "INSERT INTO atd_atendimento
                             (atd_id_animal,atd_inicio_atendimento, atd_fim_atendimento,atd_ds_atendimento,atd_obs_atendimento,atd_st_atendimento,atd_id_medico)
                             VALUES
                             ($animal,'$inicio','$fim','$descricao','$observacao',1,$medico)";

            if(mysqli_query(connect(),$query_insert)){
                echo '1';
                exit;
            }else{
                echo '2';
                exit;
            }

        }

    }

}
