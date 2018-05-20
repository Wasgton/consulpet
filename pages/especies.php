<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Espécies</h1><span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Especie</th>
                        <th scope="col">Status</th>
                        <th scope="col">Excluir</th>
                    </tr>

                    <?php

                    $query_especies = "SELECT  tpa_id_tipo,
                                              tpa_ds_tipo,
                                              tpa_st_tipo
                                       FROM tpa_tipo_animal";

                    if($res = mysqli_query(connect(),$query_especies)){

                        while($dados = mysqli_fetch_array($res)){
                            $id_especie      = $dados['tpa_id_tipo'];
                            $especie         = $dados['tpa_ds_tipo'];
                            $status          = "";

                            if($dados['tpa_st_tipo'] == "1"){
                                $status = "Ativo";
                            }else if($dados['tpa_st_tipo'] =="0"){
                                $status = "Inativo";
                            }

                            echo"<tr >
                        <td class='esp_id' id='$id_especie'>$id_especie</td>
                        <td class='esp_id' id='$id_especie'>$especie</td>
                        <td class='esp_id' id='$id_especie'>$status</td>
                        <td><button class='delete_especie btn-link' id='$id_especie'><i class='fa fa-ban' aria-hidden='true'></i></button></td>
                   </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div class='col-md-2' style="padding-bottom: 30px">
                <div style="padding-bottom: 30px">
                    <button id='nova_especie' type='button' class='btn btn-success'>
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>