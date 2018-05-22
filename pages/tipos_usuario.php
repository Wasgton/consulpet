<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Tipos de usuário</h1><span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo Usuário</th>
                        <th scope="col">Excluir</th>
                    </tr>

                    <?php

                    $query_tp_usuario = "SELECT tpu_id_tipo_usuario,
                                              tpu_ds_tipo_usuario
                                         FROM tpu_tipo_usuario";

                    if($res = mysqli_query(connect(),$query_tp_usuario)){

                        while($dados = mysqli_fetch_array($res)){
                            $id_tipo_usuario      = $dados['tpu_id_tipo_usuario'];
                            $tipo_usuario         = $dados['tpu_ds_tipo_usuario'];
                            $status          = "";
              echo"<tr >
                        <td class='tp_usuario_id' id='$id_tipo_usuario'>$id_tipo_usuario</td>
                        <td class='tp_usuario_id' id='$id_tipo_usuario'>$tipo_usuario</td>
                        <td><button class='delete_tp_usuario btn-link' id='$id_tipo_usuario'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
                   </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div class='col-md-2' style="padding-bottom: 30px">
                <div style="padding-bottom: 30px">
                    <button id='nova_tp_usuario' type='button' class='btn btn-success'>
                        Adicionar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>