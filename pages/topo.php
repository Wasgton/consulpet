<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>ConsulPet</title>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/BootStrap/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
<!--NAVBAR DO TOPO-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <!--BOTÃO QUE ABRE O MENU-->
<!--    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#Menu" aria-controls="Menu" aria-expanded="false" aria-label="Menu">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--LOGO-->
    <a class="navbar-brand" href="index.php">ConsulPET</a>
        <button class="btn btn-link" type="button">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </button>
</nav>

<div class="container-fluid" id="containerBody">
    <div class="row">
        <!--MENU-->
        <?php include_once 'menu.php'?>
        <main role="main" class="col-md-9 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Agendamentos</h1>
            </div>
        </main>
    </div>
</div>