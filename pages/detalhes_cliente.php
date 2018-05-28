<?php


$id = $_GET['id'];

$query_usuario = " SELECT pes_nm_pessoa,
                          pes_sbnm_pessoa,
                          pes_sexo_pessoa,
                          pes_cpf_pessoa,
                          usr_tipo_usuario,
                          usr_st_usuario,
                          usr_login_usuario,
                          cli_tel_cliente,
                          concat(end_ds_endereco,', ',end_bairro_endereco,', ', cid_ds_cidade,', ', cid_est_cidade)  as endereco
                   FROM usr_usuario 
                   INNER JOIN pes_pessoa on pes_id_pessoa = usr_id_pessoa
                   INNER JOIN tpu_tipo_usuario on tpu_id_tipo_usuario = usr_tipo_usuario
                   INNER JOIN cli_cliente on cli_id_pessoa = pes_id_pessoa
                   INNER JOIN end_endereco on cli_id_cliente = end_id_cliente
                   INNER JOIN cid_cidade on cid_id_cidade = end_id_cidade
                   and pes_id_pessoa = $id";

$res_usuario = mysqli_query(connect(),$query_usuario);

$nome="";
$sobrenome="";
$sexo="";
$tipo="";
$crmv="";
$login="";
$status ="";
$cpf = "";
$cidade = "";
$telefone="";

if($dados = mysqli_fetch_assoc($res_usuario)){

    $nome       = $dados['pes_nm_pessoa'];
    $sobrenome  = $dados['pes_sbnm_pessoa'];
    $telefone   = $dados['cli_tel_cliente'];
    $sexo       = $dados['pes_sexo_pessoa'];
    $tipo       = $dados['usr_tipo_usuario'];
    $crmv       = $dados['usr_crmv_usuario'];
    $login      = $dados['usr_login_usuario'];
    $status     = $dados['usr_st_usuario'];
    $cpf        = $dados['pes_cpf_pessoa'];
    $cidade     = $dados['endereco'];


}

?>

<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?=$nome?> <?=$sobrenome?></h1>
    </div>
</main>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                    <div style="padding: 5px" class="col-md-6 dados">

                        <label><b>Sexo :</b></label>
                        <label><?=$sexo?></label><br>

                        <label><b>CPF :</b></label>
                        <label><?=$cpf?></label><br>

                        <label><b>Telefone :</b></label>
                        <label><?=$telefone?></label><br>

                        <label><b>Endereço :</b></label>
                        <label><?=$cidade?></label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h4 class="h2">Animais</h4>
    </div>
</main>
    <div class="container">
        <table class="table">
            <th>Nome</th>
            <th>Idade</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Sexo</th>
            <th>Historico Vacinas</th>
            <th>Historico Doenças</th>
<?php

    $query_usuario = "  SELECT *
                        FROM ani_animal
                        INNER JOIN cli_cliente on ani_id_cliente = cli_id_cliente
                        INNER JOIN pes_pessoa on cli_id_pessoa = pes_id_pessoa
                        WHERE cli_id_pessoa = $id";

$res_usuario = mysqli_query(connect(),$query_usuario);

$nome="";
$altura ="";
$peso="";
$idade="";
$sexo="";
$vacinas ="";
$doencas ="";

while($dados = mysqli_fetch_assoc($res_usuario)){

$nome       = $dados['ani_nm_animal'];
$altura     = $dados['ani_altura_animal'];
$peso       = $dados['ani_peso_animal'];
$idade      = $dados['ani_idade_animal'];
$sexo       = $dados['ani_sexo_animal'];
$vacinas    = $dados['ani_vacina_animal'];
$doencas    = $dados['ani_doenca_animal'];

?>


        <tr>
            <td><?=$nome?></td>
            <td><?=$idade?> Ano(s)</td>
            <td><?=$altura?> Cm</td>
            <td><?=$peso?>g</td>
            <td><?=$sexo?></td>
            <td><?=$vacinas?></td>
            <td><?=$doencas?></td>
        </tr>



<?php

}

?>
    </table>
    </div>