<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Animais</h1><span><a href="home">Home</a></span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th scope="col">Animal</th>
                        <th scope="col">Dono</th>
                        <th scope="col">Espécie</th>
                        <th scope="col">Excluir</th>
                    </tr>

                    <?php

                    $query_animais = "SELECT ani_nm_animal,
                                           ani_id_animal,
                                           ani_id_cliente,
                                           concat(pes_nm_pessoa,' ', pes_sbnm_pessoa) as nome_cliente,
                                           rac_ds_raca,
                                           tpa_ds_tipo
                                    FROM ani_animal
                                    INNER JOIN cli_cliente ON cli_id_cliente = ani_id_cliente
                                    INNER JOIN pes_pessoa ON pes_id_pessoa = cli_id_pessoa
                                    INNER JOIN rac_raca on rac_id_raca = ani_id_raca
                                    INNER JOIN tpa_tipo_animal on tpa_id_tipo = rac_id_tipo
                                    INNER JOIN usr_usuario on pes_id_pessoa = usr_id_usuario
                                    WHERE usr_st_usuario = 1";

                    if($res = mysqli_query(connect(),$query_animais)){

                        while($dados = mysqli_fetch_array($res)){
                            $id_animal      = $dados['ani_id_animal'];
                            $id_cliente     = $dados['ani_id_cliente'];
                            $nome_animal    = $dados['ani_nm_animal'];
                            $nome_dono      = $dados['nome_cliente'];
                            $raca           = $dados['rac_ds_raca'];
                            $tipo_animal    = $dados['tpa_ds_tipo'];

              echo"<tr >
                        <td class='ani_id' id='$id_animal'>$nome_animal</td>
                        <td class='ani_id' id='$id_animal'>$nome_dono</td>
                        <td class='ani_id' id='$id_animal'>$tipo_animal</td>
                        <td><button class='delete_animal btn-link' id='$id_animal'><i class='fa fa-ban' aria-hidden='true'></i></button></td>
                   </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div class='col-md-2'>
                <button id='novo_animal' type='button' class='btn btn-success'>
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</main>
</div>
</div>