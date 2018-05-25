<?php

$where = '';


if($_SESSION['tipo']==3){
    $where = " and usr_id_usuario = ". $_SESSION['id']." ORDER BY pes_nm_pessoa";
}

?>
<!--MODAL AGENDA-->

<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Modal title</h5>
                <button id="fechar_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-visualizar">
                    <dl class="row">
                        <div class="container" id="body_modal">
                            <dt>Animal: &nbsp</dt>              <dd id="animal"> </dd><br>
                            <dt>Dono: &nbsp</dt>                <dd id="dono"> </dd><br>
                            <dt> Medico: &nbsp</dt>             <dd id="medico"> </dd><br>
                            <dt>Horario Consulta: &nbsp</dt>    <dd id="start"> </dd><br>
                            <dt>Obs: &nbsp</dt>                 <dd id="obs">   </dd><br>
                        </div>
                    </dl>
                    <div style="margin: 0 auto; display: table;">
                        <?php

                        if($_SESSION['tipo']!=4){
                       echo '<button class="btn btn-outline-danger btn_excluir" data-toggle="tooltip" data-placement="top" title="Deletar consulta">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-outline-warning btn_realizar" data-toggle="tooltip" data-placement="top" title="Consulta Realizada">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-outline-info btn_editar_form" data-toggle="tooltip" data-placement="top" title="Editar consulta">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-editar">
                    <div class="alert alert-success alert_sucesso_modal" role="alert"></div>
                    <div class="alert alert-danger alert_erro_modal" role="alert"></div>
                    <form id="form-editar" method="post">
                        <div class="form-group">
                            <input type="text" id="id" name="id" value="" hidden>
                            <label for="descricao">Descrição</label>
                            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="descrição">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="animal">Animal</label>
                                    <select id="animal" name="animal" class="form-control">
                                        <?php
                                        $query_animais = "SELECT ani_nm_animal,
                                                                   ani_id_animal,
                                                                   ani_id_cliente,
                                                                   concat(pes_nm_pessoa,' ', pes_sbnm_pessoa) as nome_cliente,
                                                                   rac_ds_raca,
                                                                   tpa_ds_tipo
                                                            FROM ani_animal
                                                            INNER JOIN cli_cliente ON cli_id_cliente = ani_id_cliente
                                                            INNER JOIN pes_pessoa ON pes_id_pessoa = cli_id_pessoa
                                                            INNER JOIN rac_raca on rac_id_raca = ani_id_raca
                                                            INNER JOIN tpa_tipo_animal on tpa_id_tipo = rac_id_tipo
                                                            INNER JOIN usr_usuario on pes_id_pessoa = usr_id_pessoa
                                                            WHERE usr_st_usuario = 1
                                                            ORDER BY ani_nm_animal";

                                        if($res = mysqli_query(connect(),$query_animais)) {

                                            while ($dados = mysqli_fetch_array($res)) {
                                                $id_animal = $dados['ani_id_animal'];
                                                $id_cliente = $dados['ani_id_cliente'];
                                                $nome_animal = $dados['ani_nm_animal'];
                                                $nome_dono = $dados['nome_cliente'];
                                                $raca = $dados['rac_ds_raca'];
                                                $tipo_animal = $dados['tpa_ds_tipo'];

                                                echo "<option id='$id_animal' value='$id_animal'>$nome_animal</option>";
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="medico">Médico</label>
                                    <select id="medico" name="medico" class="form-control">
                                        <?php
                                        $query_medico = "SELECT *
                                                         FROM usr_usuario
                                                         INNER JOIN pes_pessoa on usr_id_pessoa = pes_id_pessoa
                                                         WHERE usr_st_usuario = 1
                                                         AND usr_tipo_usuario = 3";

                                        $query_medico .= $where;

                                        if($res = mysqli_query(connect(),$query_medico)) {

                                            while ($dados = mysqli_fetch_array($res)) {
                                                $id_medico = $dados['usr_id_usuario'];
                                                $nm_medico = $dados['pes_nm_pessoa'];

                                                echo "<option id='$id_medico' value='$id_medico'>$nm_medico</option>";
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="start">Horário inicio</label>
                                    <input class="form-control" type="text" name="start" id="start">
                                </div>
                                <div class="col-md-6">
                                    <label for="end">Horário Fim</label>
                                    <input class="form-control" type="text" name="end" id="end">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observação">Observação</label>
                            <textarea class="form-control" type="text" name="observacao" id="observacao" ></textarea>
                        </div>
                        <button type="button" style="margin: 0 auto;" class="btn btn-outline-primary btn_voltar" data-toggle="tooltip" data-placement="top" title="Voltar">
                            <i class="fa fa-undo" aria-hidden="true"></i>
                        </button>
                        <button type="button" style="margin: 0 auto;" class="btn btn-success btn_atualizar" data-toggle="tooltip" data-placement="top" title="Atualizar">
                            Atualizar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var menu = "fechado";
    $('.btn_editar_form').click(function(){
        $('.form-editar').slideToggle();
        $('.form-visualizar').slideToggle();
        menu = 'aberto';

    });
    $('.btn_voltar').click(function(){
        $('.form-visualizar').slideToggle();
        $('.form-editar').slideToggle();
        menu = 'fechado';
    });

    $('#fechar_modal').click(function(){
        console.log(menu);
        if(menu === 'aberto'){
            $('.form-visualizar').slideToggle();
            $('.form-editar').slideToggle();
            menu = 'fechado';
        }

    });

</script>
<!--MODAL CADASTRAR-->

<div class="modal fade bd-example-modal-lg" id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Cadastrar Agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert" id="alert_sucesso_modal" ></div>
                <div class="alert alert-danger" role="alert" id="alert_erro_modal"></div>
                <form id="form-agenda" method="post">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input class="form-control" type="text" name="descricao" id="descricao" placeholder="descrição">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="animal">Animal</label>
                                <select id="animal" name="animal" class="form-control">
                                    <?php
                                    $query_animais = "SELECT ani_nm_animal,
                                                                   ani_id_animal,
                                                                   ani_id_cliente,
                                                                   concat(pes_nm_pessoa,' ', pes_sbnm_pessoa) as nome_cliente,
                                                                   rac_ds_raca,
                                                                   tpa_ds_tipo
                                                            FROM ani_animal
                                                            INNER JOIN cli_cliente ON cli_id_cliente = ani_id_cliente
                                                            INNER JOIN pes_pessoa ON pes_id_pessoa = cli_id_pessoa
                                                            INNER JOIN rac_raca on rac_id_raca = ani_id_raca
                                                            INNER JOIN tpa_tipo_animal on tpa_id_tipo = rac_id_tipo
                                                            INNER JOIN usr_usuario on pes_id_pessoa = usr_id_pessoa
                                                            WHERE usr_st_usuario = 1";

                                    if($res = mysqli_query(connect(),$query_animais)) {

                                        while ($dados = mysqli_fetch_array($res)) {
                                            $id_animal = $dados['ani_id_animal'];
                                            $id_cliente = $dados['ani_id_cliente'];
                                            $nome_animal = $dados['ani_nm_animal'];
                                            $nome_dono = $dados['nome_cliente'];
                                            $raca = $dados['rac_ds_raca'];
                                            $tipo_animal = $dados['tpa_ds_tipo'];

                                            echo "<option id='$id_animal' value='$id_animal'>$nome_animal</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="medico">Médico</label>
                                <select id="medico" name="medico" class="form-control">
                                    <?php
                                    $query_medico = "SELECT *
                                                     FROM usr_usuario
                                                     INNER JOIN pes_pessoa on usr_id_pessoa = pes_id_pessoa
                                                     WHERE usr_st_usuario = 1
                                                     AND usr_tipo_usuario = 3";

                                    $query_medico .= $where;
                                    if($res = mysqli_query(connect(),$query_medico)) {

                                        while ($dados = mysqli_fetch_array($res)) {
                                            $id_medico = $dados['usr_id_usuario'];
                                            $nm_medico = $dados['pes_nm_pessoa'];

                                            echo "<option id='$id_medico' value='$id_medico'>$nm_medico</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="start">Horário inicio</label>
                                <input class="form-control" type="text" name="start" id="start">
                            </div>
                            <div class="col-md-6">
                                <label for="end">Horário Fim</label>
                                <input class="form-control" type="text" name="end" id="end">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observação">Observação</label>
                        <textarea class="form-control" type="text" name="observacao" id="observacao" ></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="novo_agendamento">Cadastrar</button>
            </div>
        </div>
    </div>
</div>