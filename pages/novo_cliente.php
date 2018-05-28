<?php

include_once 'componentes/redirecionamento.php';

include_once '../_controller/config.php';

?>

    <main role="main" class="col-md-9 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Clientes</h1>
        </div>
    </main>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include_once 'componentes/alerts.php'; ?>
                <form id='form-cliente' class="form-group form-row" method="post">
                    <div class="container">
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
                                <label>CPF</label>
                                <input class="form-control" type="text" id="cpf" name="cpf">
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <label>Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone">
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Endereço</label>
                                <input type="text" class="form-control" name="endereco" id="endereco">
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro">
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <label>Cidade</label>
                                <select class="tipo_usuario form-control" id="cidade" name="cidade">
                                    <option id="0">----Selecione sua cidade----</option>
                                    <?php
                                    $query_cidade = "SELECT * FROM cid_cidade";

                                    $res_cidade = mysqli_query(connect(),$query_cidade);

                                    while($dados_cidade = mysqli_fetch_array($res_cidade)){
                                        $id_cidade = $dados_cidade['cid_id_cidade'];
                                        $ds_cidade = $dados_cidade['cid_ds_cidade'];
                                        $uf_cidade = $dados_cidade['cid_est_cidade'];

                                        echo"<option class='option' id='$id_cidade' value='$id_cidade'>$ds_cidade/$uf_cidade</option>";

                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Sexo: </label><br>
                                <label for="masculino">Masculino <input class="custom-radio" type="radio" id="masculino" value="masculino" name="sexo" checked></label>
                                <label for="feminino">Feminino <input class="custom-radio" type="radio" id="feminino" value="feminino" name="sexo"></label>
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA QUARTA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <input id="cadastrar_cliente" type="submit" class="btn btn-success" value="Cadastrar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php


