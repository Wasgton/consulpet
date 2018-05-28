<?php

include_once 'componentes/redirecionamento.php';

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
                <?php include_once 'componentes/alerts.php'; ?>
                <form id='form-cidade' class="form-group form-row" method="post">
                    <div class="container">
                        <div class="row"><!--INICIO DA PRIMEIRA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <label>Cidade</label>
                                <input class="form-control" type="text" id="cidade" name="cidade">
                            </div>
                            <div style="padding: 5px" class="col-md-3">
                                <label>Estado</label>
                                <input class="form-control" type="text" id="estado" name="estado">
                            </div>
                        </div>
                        <div class="row"> <!--INICIO DA SEGUNDA LINHA-->
                            <div style="padding: 5px" class="col-md-3">
                                <input id="cadastrar_cidade" type="submit" class="btn btn-success" value="Cadastrar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php


