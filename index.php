<?php

include '_controller/config.php';

error_reporting(1);

session_start();

if(isset($_SESSION["id"])){

    $url = ltrim( parse_url( $_SERVER['REQUEST_URI'] , PHP_URL_PATH ) , '/' );

    $rotas = explode( '/' , $url );
    $rotas[1];

    if($rotas[1]==""){
        $rotas[1] = 'home';
    }

    include_once 'componentes/topo.php';

    $rota = 'pages/'.$rotas[1].'.php';

    include_once $rota;

    include_once 'componentes/rodape.php';

}else{

        include_once 'pages/login.php';

}