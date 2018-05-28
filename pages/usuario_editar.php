<?php


$id = $_GET['id'];

$query_usuario = " SELECT pes_nm_pessoa,
                          pes_sbnm_pessoa,
                          pes_sexo_pessoa,
                          pes_cpf_pessoa,
                          usr_tipo_usuario,
                          usr_crmv_usuario,
                          usr_st_usuario,
                          usr_login_usuario
                   FROM usr_usuario 
                   INNER JOIN pes_pessoa on pes_id_pessoa = usr_id_pessoa
                   INNER JOIN tpu_tipo_usuario on tpu_id_tipo_usuario = usr_tipo_usuario
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

if($dados = mysqli_fetch_assoc($res_usuario)){

    $nome       = $dados['pes_nm_pessoa'];
    $sobrenome  = $dados['pes_sbnm_pessoa'];
    $sexo       = $dados['pes_sexo_pessoa'];
    $tipo       = $dados['usr_tipo_usuario'];
    $crmv       = $dados['usr_crmv_usuario'];
    $login      = $dados['usr_login_usuario'];
    $status     = $dados['usr_st_usuario'];
    $cpf        = $dados['pes_cpf_pessoa'];

}

?>

<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1><a href="usuarios">Home/usuario</a></span>
    </div>
</main>
</div>
</div>
<div class="container">
        <div class="row">
        <div class="col-md-12">
            <form id='form-usuario' class="form-group form-row" method="post">
                <div class="container">
                    <?php include 'componentes/alerts.php';?>
                    <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Nome</label>
                            <input type="text" id="id" name="id" value="<?=$id?>" hidden>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?=$nome?>" required>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Sobrenome</label>
                            <input class="form-control" type="text" id="sobrenome" name="sobrenome" value="<?=$sobrenome?>" required>
                        </div>
                        <?php

                        echo '<div style="padding: 5px" class="col-md-3">
                            <label>Tipo</label>
                            <select class="tipo_usuario form-control" id="tipo" name="tipo" required>
                                <option id="0">----Escolha um tipo de usuário----</option>';

                                $query_tipo = "SELECT * 
                                               FROM tpu_tipo_usuario
                                               WHERE tpu_id_tipo_usuario";

                                $res_tipo = mysqli_query(connect(),$query_tipo);
                                $selected = '';

                                while($dados_tipo = mysqli_fetch_array($res_tipo)){
                                    $id_tipo = $dados_tipo['tpu_id_tipo_usuario'];
                                    $tipo_lista = $dados_tipo['tpu_ds_tipo_usuario'];

                                    if($tipo == $id_tipo){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }

                                    echo  "<option class='option' id='$id_tipo' value='$id_tipo' $selected>$tipo_lista</option>";

                                }
                           echo "</select>
                        </div>";

                    ?>
                        <div style="padding: 5px" class="col-md-3">
                            <label class="CRMV" style="display: <?php if($tipo==3){ echo 'table';}else{echo 'none';}?>;">CRMV </label>
                            <input class="form-control CRMV" type="text" id="crmv" name="crmv" value="<?= $crmv?>" style="display: <?php if($tipo==3){ echo 'table';}else{echo 'none';}?>;" required>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>CPF</label>
                            <input class="form-control" type="text" id="cpf" name="cpf" value="<?=$cpf?>" required>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Senha</label>
                            <input class="form-control" type="password" id="Senha" name="Senha" required>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Confirmação</label>
                            <input class="form-control" type="password" id="confirmacao" name="confirmacao" required>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <div class="alert alert-success" role="alert" id="alert_sucesso_senha">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                            <div class="alert alert-danger" role="alert" id="alert_erro_senha">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Sexo: </label><br>
                            <label for="masculino">Masculino <input class="custom-radio" type="radio" id="masculino" value="masculino" name="sexo" <?php if($sexo=='masculino') echo 'checked' ?>></label>
                            <label for="feminino">Feminino <input class="custom-radio" type="radio" id="feminino" value="feminino" name="sexo" <?php if($sexo=='feminino') echo 'checked' ?>></label>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label for="status" >Usuário Ativo</label>
                            <input type="checkbox" id="status" name="status" <?php if($status==1)echo 'checked' ?>>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA QUARTA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <input id="editar_usuario" type="submit" class="btn btn-success" value="Atualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
