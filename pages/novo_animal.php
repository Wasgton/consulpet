<?php

include_once '../_controller/config.php';

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
                            <div style="padding: 5px" class="col-md-3">
                                <label for="nome">Nome</label>
                                <input class="form-control" type="text" id="nome" name="nome">
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
                                                       WHERE usr_st_usuario = 1";

                                    $res_clientes = mysqli_query(connect(),$query_clientes);

                                    while($dados_clientes = mysqli_fetch_array($res_clientes)){
                                        $id = $dados_clientes['cli_id_cliente'];
                                        $nome = utf8_encode($dados_clientes['pes_nm_pessoa']);

                                        echo  "<option class='option' id='$id' value='$id'>$nome</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-1">
                                <label for="idade">Idade</label>
                                <input class="form-control" type="text" id="idade" name="idade" maxlength="2">
                            </div>
                            <div style="padding: 5px" class="col-md-1">
                                <label for="peso">Peso (Kg)</label>
                                <input class="form-control" type="text" id="peso" name="peso">
                            </div>
                            <div style="padding: 5px" class="col-md-1">
                                <label for="altura">Altura (cm)</label>
                                <input class="form-control" type="text" id="altura" name="altura">
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <label>Espécie</label>
                                <select class="especie form-control" id="especie" name="especie">
                                    <option id="0">--Escolha a espécie do animal--</option>
                                    <?php
                                    $query_tipo = "SELECT * FROM tpa_tipo_animal WHERE tpa_st_tipo = 1";

                                    $res_tipo = mysqli_query(connect(),$query_tipo);

                                    while($dados_tipo = mysqli_fetch_array($res_tipo)){
                                        $id = $dados_tipo['tpa_id_tipo'];
                                        $tipo = utf8_encode($dados_tipo['tpa_ds_tipo']);

                                        echo  "<option class='option' id='$id' value='$id'>$tipo</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Raça</label>
                                <select class="raca form-control" id="raca" name="raca">
                                    <option id="0">--Escolha a raça do animal--</option>

                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Sexo: </label><br>
                                <label for="macho">Macho <input class="custom-radio" type="radio" id="macho" value="macho" name="sexo" checked></label>
                                <label for="femea">Femêa <input class="custom-radio" type="radio" id="femea" value="femea" name="sexo"></label>
                            </div>
                        </div>

                        <div class="row"> <!--INICIO DA TERCEIRA LINHA-->

                            <div class="col-md-6">
                                <label for="hist-doencas">Histórico de Doenças</label>
                                <textarea class="form-control" name="hist-doencas" style="height: 129px"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="hist-vacinas">Historico de vacinas</label>
                                <textarea class="form-control" id="hist-vacinas" name="hist-vacinas" style="height: 129px"></textarea>
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA QUARTA LINHA-->
                            <div style="padding: 10px" class="col-md-3">
                                <input id="cadastrar_animal" type="submit" class="btn btn-success" value="Cadastrar">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php


