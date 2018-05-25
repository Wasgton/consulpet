<?php

include_once 'componentes/redirecionamento.php';

?>
<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Cidades</h1><span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Excluir</th>
                    </tr>

                    <?php

                    $query_especies = "SELECT cid_id_cidade,
                                              cid_ds_cidade,
                                              cid_est_cidade
                                       FROM cid_cidade";

                    if($res = mysqli_query(connect(),$query_especies)){

                        while($dados = mysqli_fetch_array($res)){
                            $id_cidade      = $dados['cid_id_cidade'];
                            $cidade         = $dados['cid_ds_cidade'];
                            $estado         = $dados['cid_est_cidade'];

              echo"<tr >
                        <td class='cid_id' id='$id_cidade'>$id_cidade</td>
                        <td class='cid_id' id='$id_cidade'>$cidade</td>
                        <td class='cid_id' id='$id_cidade'>$estado</td>
                        <td><button class='delete_cidade btn-link' id='$id_cidade'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                   </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div class='col-md-2' style="padding-bottom: 30px">
                <div style="padding-bottom: 30px">
                    <button id='nova_cidade' type='button' class='btn btn-success'>
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>