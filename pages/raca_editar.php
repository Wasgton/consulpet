<?php


$id = $_GET['id'];

    $query = "SELECT *
              FROM rac_raca
              WHERE rac_id_raca = $id";

    $raca    = "";
    $especie = "";
    $status  = "";

    $res = mysqli_query(connect(),$query);
    if($dados = mysqli_fetch_array($res)){

        $raca    = $dados['rac_ds_raca'];
        $especie = $dados['rac_id_tipo'];
        $status  = $dados['rac_st_raca'];
    }

?>
<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Raça</h1>
    </div>
</main>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id='form-raca' class="form-group form-row" method="post">
                <div class="container">
                    <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label>Nome</label>
                            <input id="id_raca" name="id_raca" value="<?=$id?>" hidden>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?=$raca?>">
                        </div>
                        <div style="padding: 5px" class="col-md-3">
                            <label>Espécie</label>
                            <select class="especie form-control" id="especie" name="especie">
                                <option id="0">--Escolha a espécie do animal--</option>
                                <?php
                                $query_tipo = "SELECT * 
                                               FROM tpa_tipo_animal 
                                               WHERE tpa_st_tipo = 1";

                                $res_tipo = mysqli_query(connect(),$query_tipo);

                                $selected = "";

                                while($dados_tipo = mysqli_fetch_array($res_tipo)){
                                    $id_especie = $dados_tipo['tpa_id_tipo'];
                                    $tipo = utf8_encode($dados_tipo['tpa_ds_tipo']);

                                    if($id_especie == $especie){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }

                                    echo  "<option class='option' id='$id_especie' value='$id_especie' $selected>$tipo</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label for="status">Raça Ativa</label>
                            <input type="checkbox" id="status" name="status" <?php if($status=="1") echo "checked";?>>
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <input id="editar_raca" type="submit" class="btn btn-success" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>