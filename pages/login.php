<?php

if(isset($_SESSION["id"])){
    header('Location:'.$url_absoluta.'/home');
}

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <title>ConsulPet</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">

    <link href="<?=$url_absoluta?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?=$url_absoluta?>/js/BootStrap/bootstrap.min.js"></script>
    <script src="<?=$url_absoluta?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=$url_absoluta?>/js/script.js"></script>
    <script src="<?=$url_absoluta?>/js/ajax.js"></script>
    <link href="<?=$url_absoluta?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$url_absoluta?>/css/estilo.css" rel="stylesheet">
    <link href="<?=$url_absoluta?>/css/resposividade.css" rel="stylesheet">
    <link href="<?=$url_absoluta?>/css/login.css" rel="stylesheet">
    <script type="text/javascript">var url = '<?=$url_absoluta?>';</script>
</head>

<body>
    <form class="form-signin" method="post">
        <img class="mb-auto" src="img/logo-login.png" alt="">
        <div class="alert alert-danger" role="alert" id="alert_login"></div>
        <input type="text" class="form-control" name="user" id="user" placeholder="Usuário">
        <br>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Password">
        <br>
        <input class="btn btn-success btn-block" type="submit" id="submit" value="Login">
        <br>
    </form>
<div id="teste">

</div>
</body>

</html>