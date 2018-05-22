<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Raças</h1><span><a href="animais">Animais</a></span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Raça</th>
                        <th scope="col">Espécie</th>
                        <th scope="col">Excluir</th>
                    </tr>

                    <?php

                    $query_raca = "SELECT rac_id_raca,
                                          rac_ds_raca,
                                          rac_st_raca,
                                          tpa_ds_tipo
                                   FROM rac_raca
                                   INNER JOIN tpa_tipo_animal on rac_id_tipo = tpa_id_tipo
                                   WHERE rac_st_raca = 1";

                    if($res = mysqli_query(connect(),$query_raca)){

                        while($dados = mysqli_fetch_array($res)){
                                $id_raca  = $dados['rac_id_raca'];
                                $raca     = $dados['rac_ds_raca'];
                                $status   = $dados['rac_st_raca'];
                                $especie  = $dados['tpa_ds_tipo'];

                      echo"<tr >
                                <td class='rac_id' id='$id_raca'>$id_raca</td>
                                <td class='rac_id' id='$id_raca'>$raca</td>
                                <td class='rac_id' id='$id_raca'>$especie</td>
                                <td><button class='delete_raca btn-link' id='$id_raca'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                           </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div class='col-md-2' style="padding-bottom: 30px">
                <div style="padding-bottom: 30px">
                    <button id='nova_raca' type='button' class='btn btn-success'>
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>