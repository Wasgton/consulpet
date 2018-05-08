<?php

$id = $_GET['id'];

$query_cliente = " SELECT 
                          pes_id_pessoa,
                          cli_id_cliente,
                          end_id_endereco,
                          usr_id_usuario,  
                          pes_nm_pessoa,
                          pes_sbnm_pessoa,
                          pes_sexo_pessoa,
                          cli_tel_cliente,
                          end_ds_endereco,
                          end_bairro_endereco,
                          end_id_cidade                         
                   FROM usr_usuario 
                   INNER JOIN pes_pessoa on pes_id_pessoa = usr_id_pessoa
                   INNER JOIN cli_cliente on cli_id_pessoa = pes_id_pessoa
                   INNER JOIN end_endereco on cli_id_cliente = end_id_cliente
                   INNER JOIN cid_cidade on cid_id_cidade = end_id_cidade
                   and cli_id_cliente = $id";

$res_cliente = mysqli_query(connect(),$query_cliente);

//DADOS DE PESSOA
$nome   = "";
$sbnome = "";
$sexo   = "";

//DADOS CLIENTE
$telefone = "";
$endereco = "";
$bairro   = "";
$cidade   = "";

if($dados = mysqli_fetch_assoc($res_cliente)){

    $nome       = $dados['pes_nm_pessoa'];
    $sobrenome  = $dados['pes_sbnm_pessoa'];
    $sexo       = $dados['pes_sexo_pessoa'];
    $telefone   = $dados['cli_tel_cliente'];
    $endereco   = $dados['end_ds_endereco'];
    $endereco   = $dados['end_ds_endereco'];
    $bairro     = $dados['end_bairro_endereco'];

    $cidade_id   = $dados['end_id_cidade'];
    $id_pessoa   = $dados['pes_id_pessoa'];
    $id_cliente  = $dados['cli_id_cliente'];
    $id_endereco = $dados['end_id_endereco'];
    $id_usuario  = $dados['usr_id_usuario'];

}

?>

<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Cliente</h1>
    </div>
</main>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id='form-cliente' class="form-group form-row" method="post">
                <div class="container">

                    <input type="text" value="<?= $id_pessoa?>" name="id_pessoa" hidden>
                    <input type="text" value="<?= $id_cliente?>" name="id_cliente" hidden>
                    <input type="text" value="<?= $id_endereco?>" name="id_endereco" hidden>
                    <input type="text" value="<?= $id_usuario?>" name="id_usuario" hidden>

                    <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Nome</label>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?=$nome?>">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Sobrenome</label>
                            <input class="form-control" type="text" id="sobrenome" name="sobrenome" value="<?=$sobrenome?>">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" value="<?=$telefone?>">
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" value="<?=$endereco?>">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?=$bairro?>">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Cidade</label>
                            <select class="tipo_usuario form-control" id="cidade" name="cidade">
                                <option id="0">----Selecione sua cidade----</option>
                                <?php
                                $query_cidade = "SELECT * FROM cid_cidade";

                                $res_cidade = mysqli_query(connect(),$query_cidade);


                                $selected = '';
                                while($dados_cidade = mysqli_fetch_array($res_cidade)){
                                    $id_cidade = $dados_cidade['cid_id_cidade'];
                                    $ds_cidade = utf8_encode($dados_cidade['cid_ds_cidade']);
                                    $uf_cidade = $dados_cidade['cid_est_cidade'];

                                    if($id_cidade == $cidade_id){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                    echo"<option class='option' id='$id_cidade' value='$id_cidade' $selected>$ds_cidade/$uf_cidade</option>";

                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Sexo: </label><br>
                            <label for="masculino">Masculino <input class="custom-radio" type="radio" id="masculino" value="masculino" name="sexo" <?php if($sexo=='masculino') echo 'checked' ?>></label>
                            <label for="feminino">Feminino <input class="custom-radio" type="radio" id="feminino" value="feminino" name="sexo" <?php if($sexo=='feminino') echo 'checked' ?>></label>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA QUARTA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <input id="editar_cliente" type="submit" class="btn btn-success" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
