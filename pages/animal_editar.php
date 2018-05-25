<?php

include_once 'componentes/redirecionamento.php';

include_once '../_controller/config.php';

$id = $_GET['id'];

//RECUPERA DADOS DO ANIMAL SELECIONADO
$query_animal = "SELECT *
                FROM ani_animal
                INNER JOIN rac_raca ON rac_id_raca = ani_id_raca
                INNER JOIN tpa_tipo_animal on rac_id_tipo = tpa_id_tipo
                WHERE ani_id_animal = $id";

$res_animal = mysqli_query(connect(),$query_animal);

$dados = mysqli_fetch_array($res_animal);

?>
    <main role="main" class="col-md-9 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Animais</h1>
        </div>
    </main>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id='form-animais' class="form-group form-row" method="post">
                    <div class="container">
                        <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                            <input type="text" id="id_animal" name="id_animal" value="<?=$id?>" hidden>
                            <div style="padding: 5px" class="col-md-3">
                                <label for="nome">Nome</label>
                                <input class="form-control" type="text" id="nome" name="nome" value="<?= $dados['ani_nm_animal']?>">
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Dono</label>
                                <select class="dono form-control" id="dono" name="dono">
                                    <option id="0">--Selecione o dono do animal--</option>
                                    <?php
                                    $query_clientes = "SELECT pes_nm_pessoa, cli_id_cliente 
                                                       FROM cli_cliente 
                                                       INNER JOIN pes_pessoa ON cli_id_pessoa = pes_id_pessoa
                                                       INNER JOIN usr_usuario on pes_id_pessoa = usr_id_pessoa
                                                       WHERE usr_st_usuario = 1
                                                       AND usr_tipo_usuario = 4";

                                    $res_clientes = mysqli_query(connect(),$query_clientes);

                                    $selected = "";

                                    while($dados_clientes = mysqli_fetch_array($res_clientes)){
                                        $id_cliente = $dados_clientes['cli_id_cliente'];
                                        $nome = utf8_encode($dados_clientes['pes_nm_pessoa']);

                                        if($dados['ani_id_cliente']==$id_cliente){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        echo  "<option class='option' id='$id_cliente' value='$id_cliente' $selected>$nome</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-1">
                                <label for="idade">Idade</label>
                                <input class="form-control" type="text" id="idade" name="idade" maxlength="2" value="<?= $dados['ani_idade_animal']?>">
                            </div>
                            <div style="padding: 5px" class="col-md-1">
                                <label for="peso">Peso (kg)</label>
                                <input class="form-control" type="text" id="peso" name="peso" value="<?= $dados['ani_peso_animal']?>">
                            </div>
                            <div style="padding: 5px" class="col-md-1">
                                <label for="altura">Altura (cm)</label>
                                <input class="form-control" type="text" id="altura" name="altura" value="<?= $dados['ani_altura_animal']?>">
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <label>Espécie</label>
                                <select class="especie form-control" id="especie" name="especie">
                                    <option id="0">--Escolha a espécie do animal--</option>
                                    <?php
                                    $query_especie = "SELECT tpa_id_tipo, tpa_ds_tipo 
                                                   FROM tpa_tipo_animal";

                                    $res_especie = mysqli_query(connect(),$query_especie);

                                    $selected_especie = "";

                                    while($dados_especie = mysqli_fetch_array($res_especie)){

                                        $id_especie = $dados_especie['tpa_id_tipo'];
                                        $tipo = utf8_encode($dados_especie['tpa_ds_tipo']);

                                        if($dados['tpa_id_tipo'] == $id_especie){
                                            $selected_especie = "selected";
                                        }else{
                                            $selected_especie = "";
                                        }

                                        echo  "<option class='option' id='$id_especie' value='$id_especie' $selected_especie>$tipo</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Raça</label>
                                <select class="raca form-control" id="raca" name="raca">
                                    <option id="0">--Escolha a raça do animal--</option>
                                    <?php
                                        $query_raca = "SELECT * FROM rac_raca";

                                        $res_raca = mysqli_query(connect(),$query_raca);

                                        $selected_raca = "";

                                        while($dados_raca = mysqli_fetch_array($res_raca)){
                                            $id_raca = $dados_raca['rac_id_raca'];
                                            $raca = $dados_raca['rac_ds_raca'];

                                            if($id_raca===$dados['rac_id_raca']){
                                                $selected_raca = "selected";
                                            }else{
                                                $selected_raca = "";
                                            }

                                            echo  "<option class='option' id='$id_raca' value='$id_raca' $selected_raca>$raca</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Sexo: </label><br>
                                <label for="macho">Macho <input class="custom-radio" type="radio" id="macho" value="macho" name="sexo" <?php if($dados['ani_sexo_animal']=="macho"){echo "checked";} ?>></label>
                                <label for="femea">Femêa <input class="custom-radio" type="radio" id="femea" value="femea" name="sexo" <?php if($dados['ani_sexo_animal']=="femea"){echo "checked";} ?>></label>
                            </div>
                        </div>

                        <div class="row"> <!--INICIO DA TERCEIRA LINHA-->

                            <div class="col-md-6">
                                <label for="hist-doencas">Histórico de Doenças</label>
                                <textarea class="form-control" name="hist-doencas" style="height: 129px" ><?=$dados['ani_doenca_animal'] ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="hist-vacinas">Historico de vacinas</label>
                                <textarea class="form-control" id="hist-vacinas" name="hist-vacinas" style="height: 129px"><?=$dados['ani_vacina_animal'] ?></textarea>
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA QUARTA LINHA-->
                            <div style="padding: 10px" class="col-md-3">
                                <input id="editar_animal" type="submit" class="btn btn-success" value="Cadastrar">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php


