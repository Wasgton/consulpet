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
                            <input class="form-control" type="text" id="nome" name="nome">
                        </div>
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
                    </div>
                    <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <label for="status">Espécie Ativa</label>
                            <input type="checkbox" id="status" name="status">
                        </div>
                    </div>
                    <div class="row"> <!--INICIO DA TERCEIRA LINHA-->
                        <div style="padding: 5px" class="col-md-3">
                            <input id="cadastrar_raca" type="submit" class="btn btn-success" value="Cadastrar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>