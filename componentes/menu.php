<nav class="col-md-2 d-none sidebar fechado" id="sidebar">
<!--    d-md-block-->
<!--    <button class="btn-link btn-menu">-->
<!--        <i class="fa fa-times" aria-hidden="true"></i>-->
<!--    </button>-->
    <button type="button" class="close btn-menu" aria-label="Close">
        <span aria-hidden="true" style="color:white;">&times;</span>
    </button>
    <div class="sidebar-header">
        <h3 class="title">Menu</h3>
    </div>
    <div class="sidebar-sticky">
        <!--LISTA COM OS ITENS DO MENU-->
        <ul class="nav flex-column">
            <li class="nav-item list-group-item">
                <div class="row">
                    <div class="col-md-12">
                        <a class="nav-link link-full active" href="home"><span>Home</span></a>
                        <i class="fa fa-home menu-icon" aria-hidden="true"></i>
                    </div>
                </div>
            </li>
            <?php

            if($_SESSION['tipo']!='4' && $_SESSION['tipo']!='3') {

                echo '<li class="nav-item list-group-item" >
                        <div class="row" >
                            <div class="col-md-12" >
                                <a class="nav-link link-full" href = "usuarios" ><span > Usuários</span ></a >
                                <i class="fa fa-users  menu-icon" aria-hidden="true" ></i >
                            </div >
                        </div >
                    </li >';
            }
            ?>

            <?php
                $page_cliente = "clientes";
                if ($_SESSION['tipo'] != 3) {
                    $page_cliente = 'clientes';
                } else {
                    $page_cliente = 'v_clientes';
                }

            if($_SESSION['tipo']!='4'){
                echo'<li class="nav-item list-group-item" >
                        <div class="row">
                            <div class="col-md-12" >
                                <a class="nav-link link-full" href ="<?=$page_cliente?>" ><span > Clientes </span ></a >
                                <i class="fa fa-user-circle-o  menu-icon" aria-hidden = "true" ></i >
                            </div >
                        </div >
                    </li >
                    <li class="nav-item list-group-item" >
                        <div class="row" >
                            <div class="col-md-12" >
                                <a class="nav-link link-full" href = "animais" ><span > Animais</span ></a >
                                <i class="fa fa-paw  menu-icon" aria-hidden="true" ></i >
                            </div >
                        </div >
                    </li >';
            }
?>
            <li class="nav-item list-group-item">
                <div class="row">
                    <div class="col-md-12">
                        <a class="nav-link link-full" href="agenda"><span>Agenda</span></a>
                        <i class="fa fa-calendar-check-o  menu-icon" aria-hidden="true"></i>
                    </div>
                </div>
            </li>
        <?php

        if($_SESSION['tipo']!='4' && $_SESSION['tipo']!='3') {

            echo '<li class="nav-item list-group-item">
                <div class="row">
                    <div class="col-md-12">
                        <a class="nav-link link-full" href="tabelas"><span>Tabelas</span></a>
                        <i class="fa fa-table  menu-icon" aria-hidden="true"></i>
                    </div>
                </div>
            </li>';
        }
        ?>
        </ul>
    </div>
</nav>