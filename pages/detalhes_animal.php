<?php


$id = $_GET['id'];

    $query_animal = "  SELECT *
                        FROM ani_animal
                        INNER JOIN cli_cliente on ani_id_cliente = cli_id_cliente
                        INNER JOIN pes_pessoa on cli_id_pessoa = pes_id_pessoa
                        INNER JOIN rac_raca  on ani_id_raca = rac_id_raca
                        INNER JOIN tpa_tipo_animal on tpa_id_tipo = rac_id_tipo
                        WHERE ani_id_animal = $id";


$res_animal = mysqli_query(connect(),$query_animal);

$dono = "";
$sobrenome = "";
$nome="";
$altura ="";
$peso="";
$idade="";
$sexo="";
$vacinas ="";
$doencas ="";
$raca = "";
$especie = "";

if($dados = mysqli_fetch_assoc($res_animal)){

    $sobrenome  = $dados['pes_sbnm_pessoa'];
    $dono       = $dados['pes_nm_pessoa'];
    $nome       = $dados['ani_nm_animal'];
    $altura     = $dados['ani_altura_animal'];
    $peso       = $dados['ani_peso_animal'];
    $idade      = $dados['ani_idade_animal'];
    $sexo       = $dados['ani_sexo_animal'];
    $vacinas    = $dados['ani_vacina_animal'];
    $doencas    = $dados['ani_doenca_animal'];
    $raca       = $dados['rac_ds_raca'];
    $especie    = $dados['tpa_ds_tipo'];

}

?>

<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?=$nome?></h1>
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

                        <label><b>Dono :</b></label>
                        <label><?=$dono.' '.$sobrenome?></label><br>

                        <label><b>Sexo :</b></label>
                        <label><?=$sexo?></label><br>

                        <label><b>Altura :</b></label>
                        <label><?=$altura?> Cm</label><br>

                        <label><b>Peso :</b></label>
                        <label><?=$peso?> g</label><br>

                        <label><b>Idade :</b></label>
                        <label><?=$idade?> Ano(s)</label><br>

                        <label><b>Espécie :</b></label>
                        <label><?=$especie?></label><br>

                        <label><b>Raça :</b></label>
                        <label><?=$raca?></label><br>


                        <label><b>Histórico de vacinas:</b></label>
                        <label><?=$vacinas?></label><br>

                        <label><b>Histórico de doenças:</b></label>
                        <label><?=$doencas?></label><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>