<?php

include_once 'componentes/redirecionamento.php';

?>
<?php

include_once '../_controller/config.php';

?>
<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
    </div>
</main>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php include 'componentes/alerts.php';?>
            <form id='form-usuario' class="form-group form-row" method="post">

                <div class="container">
                    <div class="alert alert-success" role="alert" id="alert_sucesso_usuario"></div>
                    <div class="alert alert-danger" role="alert" id="alert_erro_usuario"></div>
                    <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Nome</label>
                            <input class="form-control" type="text" id="nome" name="nome">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Sobrenome</label>
                            <input class="form-control" type="text" id="sobrenome" name="sobrenome">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Tipo</label>
                            <select class="tipo_usuario form-control" id="tipo" name="tipo">
                                <option id="0">----Escolha um tipo de usuário----</option>
                                <?php
                                    $query_tipo = "SELECT * 
                                                   FROM tpu_tipo_usuario
                                                   WHERE tpu_id_tipo_usuario <> 4";

                                    $res_tipo = mysqli_query(connect(),$query_tipo);

                                    while($dados_tipo = mysqli_fetch_array($res_tipo)){
                                        $id = $dados_tipo['tpu_id_tipo_usuario'];
                                        $tipo = $dados_tipo['tpu_ds_tipo_usuario'];

                                        echo  "<option class='option' id='$id' value='$id'>$tipo</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label class="CRMV" style="display: none;">CRMV </label>
                            <input class="form-control CRMV" type="text" id="crmv" name="crmv" style="display: none;">
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>CPF</label>
                            <input class="form-control" type="text" id="cpf" name="cpf" maxlength="14">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Senha</label>
                            <input class="form-control" type="password" id="Senha" name="Senha">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Confirmação</label>
                            <input class="form-control" type="password" id="confirmacao" name="confirmacao">
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
                            <label for="masculino">Masculino <input class="custom-radio" type="radio" id="masculino" value="masculino" name="sexo" checked></label>
                            <label for="feminino">Feminino <input class="custom-radio" type="radio" id="feminino" value="feminino" name="sexo"></label>
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label for="status" >Usuário Ativo</label>
                            <input type="checkbox" id="status" name="status">
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA QUARTA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                           <input id="cadastrar_usuario" type="submit" class="btn btn-success" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php


