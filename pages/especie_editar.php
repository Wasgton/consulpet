<?php

include_once 'componentes/redirecionamento.php';

$id = $_GET['id'];

$query = "SELECT *
          FROM tpa_tipo_animal
          WHERE tpa_id_tipo = $id";

$res = mysqli_query(connect(),$query);
$dados = mysqli_fetch_array($res);


?>

<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Espécie</h1>
    </div>
</main>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php include_once 'componentes/alerts.php'; ?>
            <form id='form-especie' class="form-group form-row" method="post">
                <div class="container">
                    <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <input type="text" name="id_especie" value="<?=$id?>" hidden>
                            <label>Nome</label>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?=$dados['tpa_ds_tipo']?>">
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label for="status" >Espécie Ativa</label>
                            <input type="checkbox" id="status" name="status" <?php if($dados['tpa_st_tipo']=="1")echo 'checked';?>>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <input id="editar_especie" type="submit" class="btn btn-success" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php


