<?php

include_once 'componentes/redirecionamento.php';

?>


<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1><span><a href="home">Home</a></span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                    </tr>

                    <?php

                    $query_user = "SELECT pes_id_pessoa,
                                          pes_nm_pessoa,
                                          pes_sbnm_pessoa,
                                          pes_sexo_pessoa,
                                          usr_st_usuario, 
                                          tpu_ds_tipo_usuario
                                   FROM usr_usuario
                                   INNER JOIN tpu_tipo_usuario on tpu_id_tipo_usuario = usr_tipo_usuario
                                   INNER JOIN pes_pessoa on pes_id_pessoa = usr_id_pessoa
                                   WHERE tpu_id_tipo_usuario = 4";

                    if($res = mysqli_query(connect(),$query_user)){

                        while($dados = mysqli_fetch_array($res)){
                            $id = $dados['pes_id_pessoa'];
                            $nome = $dados['pes_nm_pessoa'];
                            $sobrenome = $dados['pes_sbnm_pessoa'];
                            $sexo = $dados['pes_sexo_pessoa'];

                            if($dados['usr_st_usuario']=="1"){
                                $status = 'Ativo';
                            }else{
                                $status = 'Inativo';
                            }
                            $tipo = $dados['tpu_ds_tipo_usuario'];


                            echo"<tr >
                                        <td class='detalhe_usuario' id='$id'>".$nome." ".$sobrenome."</td>
                                        <td class='detalhe_usuario' id='$id'>$status</td>";

                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</main>
</div>
</div>