<?php


if($_SESSION['tipo']=='4' || $_SESSION['tipo']=='3'){

    $url_direcionamento = $url_absoluta.'/home';

    echo "<script>location.href='$url_direcionamento'</script>";

}
?>