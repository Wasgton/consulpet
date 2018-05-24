<?php

include_once '_controller/init_calendar.php';


?>
<main role="main" class="col-md-9 pt-3">
    <div class="alert alert-success" role="alert" id="alert_sucesso"></div>
    <div class="alert alert-danger" role="alert" id="alert_erro"></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Agenda</h1><span><a href="home">Home</a></span>
    </div>
    <div class='container' style='padding-top: 3%;'>
        <div class='row'>
            <div class="col-md-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</main>
