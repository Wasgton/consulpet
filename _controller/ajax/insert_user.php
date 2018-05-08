<?php

include_once '../config.php';

//DADOS DE PESSOA
$nome   = $_POST['nome'];
$sbnome = $_POST['sobrenome'];
$sexo   = $_POST['sexo'];

//DADOS DE USUARIO
$words          = explode(' ',$sbnome);
$login          = strtolower($nome.'.'.$words[count($words)-1]);
$CRVM           = $_POST['crmv'];
$tipo_usuario   = $_POST['tipo'];
$senha          = sha1($_POST['Senha']);
$sexo           = $_POST['sexo'];
$status         = '0';

if(isset($_POST['status'])){
    $status = '1';
}else if(!isset($_POST['status'])){
    $status = '0';
}

$query_validacao = "SELECT pes_nm_pessoa,
                           pes_sbnm_pessoa
                    FROM   pes_pessoa
                    WHERE  pes_nm_pessoa = '$nome'
                    AND    pes_sbnm_pessoa = '$sbnome'";

$res_validacao = mysqli_query(connect(),$query_validacao);

$dados_validacao = mysqli_fetch_assoc($res_validacao);

if($dados_validacao['pes_nm_pessoa']=="" && $dados_validacao['pes_sbnm_pessoa']==""){

    $query_pessoa = "INSERT INTO pes_pessoa
                   (pes_nm_pessoa,pes_sbnm_pessoa,pes_sexo_pessoa)
                   VALUES
                   ('$nome','$sbnome','$sexo');";

    $con = connect();

    if(mysqli_query($con,$query_pessoa)) {

        $id_pessoa = mysqli_insert_id($con);

        $query_usuario = "INSERT INTO usr_usuario 
                          (usr_id_pessoa,usr_tipo_usuario,";

        if ($tipo_usuario === '3') {
            $query_usuario .= "usr_crmv_usuario,";
        }

        $query_usuario .= "usr_login_usuario,usr_password_usuario,usr_st_usuario)
                          VALUES
                          ($id_pessoa,$tipo_usuario,";

        if ($tipo_usuario === '3') {
            $query_usuario .= "$CRVM,";
        }

        $query_usuario .= "'$login','$senha',$status)";

         if(mysqli_query(connect(),$query_usuario)){
            echo '1';
         }else{
             echo '3';
         }

    }else{
        echo '2';
    }

}else{
    echo "0";
}