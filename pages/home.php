<main role="main" class="col-md-9 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <div class="container">
            <div class="row">
                <?php
                if($_SESSION['tipo']!=4) {
                    $page = "";
                    if ($_SESSION['tipo'] != 3) {
                        $page = 'clientes';
                    } else {
                        $page = 'v_clientes';
                    }
                if($_SESSION['tipo']!=4 && $_SESSION['tipo']!=3){
                    echo '
                        <div class="col-md-4">
                            <div class="card">
                                <a href="usuarios" class="link-full">
                                    <div class="card-header">
                                        <h5 class="card-title">Usuários</h5>
                                    </div>
                                    <div class="card-body" style="text-align: center">
                                        <i class="fa fa-users  menu-icon" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>';
                }
                     echo '<div class="col-md-4">
                                    <div class="card">
                                        <a href="' . $page . '" class="link-full">
                                            <div class="card-header">
                                                <h5 class="card-title">Clientes</h5>
                                            </div>
                                            <div class="card-body" style="text-align: center">
                                                <i class="fa fa-user-circle-o  menu-icon" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>';
                    if ($_SESSION['tipo'] != 4) {

                        echo '<div class="col-md-4">
                                    <div class="card">
                                        <a href="animais" class="link-full">
                                            <div class="card-header">
                                                <h5 class="card-title">Animais</h5>
                                            </div>
                                            <div class="card-body">
                                                <i class="fa fa-paw  menu-icon" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                </div>
                                <div class="row">';
                    }
                }
                        ?>


                <div class="col-md-4">
                    <div class="card">
                        <a href="agenda" class="link-full">
                            <div class="card-header">
                                <h5 class="card-title">Agenda</h5>
                            </div>
                            <div class="card-body">
                                <i class="fa fa-calendar-check-o  menu-icon" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
</div>
</div>