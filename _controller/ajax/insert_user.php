<?php

include_once '../config.php';

//DADOS DE PESSOA
$nome   = $_POST['nome'];
$sbnome = $_POST['sobrenome'];
$sexo   = $_POST['sexo'];
$cpf    = $_POST['cpf'];

$caracteres = array('.','-');
$cpf = str_replace($caracteres,'',$cpf);


//DADOS DE USUARIO
$login          = $cpf;
$CRVM           = $_POST['crmv'];
$tipo_usuario   = $_POST['tipo'];
$senha          = $_POST['Senha'];
$sexo           = $_POST['sexo'];
$status         = '0';
$confirmacao    = $_POST['confirmacao'];

if($senha!==$confirmacao){
    echo '4';
    exit;
}else{
    $senha = sha1($senha);
}

if(isset($_POST['status'])){
    $status = '1';
}else if(!isset($_POST['status'])){
    $status = '0';
}

$query_validacao = "SELECT pes_cpf_pessoa
                    FROM   pes_pessoa
                    WHERE  pes_cpf_pessoa = '$cpf'";

$res_validacao = mysqli_query(connect(),$query_validacao);

$dados_validacao = mysqli_fetch_assoc($res_validacao);

if($dados_validacao['pes_cpf_pessoa']==""){

    $query_pessoa = "INSERT INTO pes_pessoa
                   (pes_nm_pessoa,pes_sbnm_pessoa,pes_sexo_pessoa,pes_cpf_pessoa)
                   VALUES
                   ('$nome','$sbnome','$sexo','$cpf');";

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