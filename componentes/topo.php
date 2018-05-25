<?php

include_once '../_controller/config.php';

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>ConsulPet</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper/umd/popper.min.js"></script>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?=$url_absoluta?>/img/phpThumb_generated_thumbnail.ico" />
    <link href="css/resposividade.css" rel="stylesheet">


    <script src="js/BootStrap/bootstrap.min.js"></script>
    <script src="js/script.js" charset="utf-8"></script>
    <script src="js/ajax.js" charset="utf-8"></script>
    <script src="js/ajax_usuario.js" charset="utf-8"></script>
    <script src="js/ajax_cliente.js" charset="utf-8"></script>
    <script src="js/ajax_animais.js" charset="utf-8"></script>
    <script src="js/ajax_especie.js" charset="utf-8"></script>
    <script src="js/ajax_raca.js" charset="utf-8"></script>
    <script src="js/ajax_cidade.js" charset="utf-8"></script>
    <script src="js/ajax_agenda.js" charset="utf-8"></script>


    <link href='js/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='js/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='js/fullcalendar/lib/moment.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/fullcalendar/locale/pt-br.js'></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script type="text/javascript">var url = '<?=$url_absoluta?>';</script>
</head>
<body>

<?php include_once 'modais_agenda.php'?>

<!--DIV GIF CARREGAMENTO-->
<div id="load" style="display: none">
    <img src="<?=$url_absoluta?>/img/loading3.gif">
</div>
<!--NAVBAR DO TOPO-->
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
<!--BOTÃO QUE ABRE O MENU-->
    <button class="navbar-toggler collapsed btn-link" type="button" data-toggle="collapse" data-target="#Menu" aria-controls="Menu" aria-expanded="false" aria-label="Menu">
        <span class="navbar-toggler-icon" style="color: black;"></span>
    </button>
<!--LOGO-->
    <div class="logo">
        <a class="navbar-brand" href="home">
            <img id="logo" src="<?=$url_absoluta?>/img/logo.png">
        </a>
    </div>
    <button class="btn btn-link" type="button" id="logout">
       <a href="_controller/logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>
    </button>
</nav>

<div class="container-fluid" id="containerBody">
    <div class="row">
        <!--MENU-->
        <?php if($url !== 'home'){ include_once 'menu.php';} ?>
