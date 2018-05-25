<?php

include_once 'componentes/redirecionamento.php';


$id = $_GET['id'];

$query = "SELECT *
          FROM cid_cidade
          WHERE cid_id_cidade = $id";

$res = mysqli_query(connect(),$query);
$dados = mysqli_fetch_array($res);


?>

    <main role="main" class="col-md-9 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Cidades</h1>
        </div>
    </main>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id='form-cidade' class="form-group form-row" method="post">
                    <div class="container">
                        <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <input type="text" name="id_cidade" value="<?=$id?>" hidden>
                                <label>Nome</label>
                                <input class="form-control" type="text" id="cidade" name="cidade" value="<?=$dados['cid_ds_cidade']?>">
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Estado</label>
                                <input class="form-control" type="text" id="estado" name="estado" value="<?=$dados['cid_est_cidade']?>">
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <input id="editar_cidade" type="submit" class="btn btn-success" value="Cadastrar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php


