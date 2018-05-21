<main role="main" class="col-md-9 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1><span>
    </div>

    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
        </div>
        <div class='row'>
            <div class='col-md-9'>
                <table class='table table-hover'>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Excluir</th>
                    </tr>

                    <?php

                    $query_user = "SELECT cli_id_cliente,
                                          pes_nm_pessoa,
                                          pes_sbnm_pessoa,
                                          pes_sexo_pessoa
                                   FROM cli_cliente
                                   INNER JOIN pes_pessoa on pes_id_pessoa = cli_id_pessoa";

                    if($res = mysqli_query(connect(),$query_user)){

                        while($dados = mysqli_fetch_array($res)){
                            $id = $dados['cli_id_cliente'];
                            $nome = $dados['pes_nm_pessoa'];
                            $sobrenome = $dados['pes_sbnm_pessoa'];
                            $sexo = $dados['pes_sexo_pessoa'];

                            echo"<tr >
                        <td class='cli_id' id='$id'>$id</td>
                        <td class='cli_id' id='$id'>".$nome." ".$sobrenome."</td>
                        <td><button class='delete_cliente btn-link' id='$id'><i class='fa fa-ban' aria-hidden='true'></i></button></td>
                   </tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <div class='col-md-2'>
                <button id='novo_cliente' type='button' class='btn btn-success'>
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</main>
</div>
</div>