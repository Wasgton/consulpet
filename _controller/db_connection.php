<?php


function connect(){
    $host ="localhost";
    $user="root";
    $password ="123456";
    $bd = "consulpet";

    $con = new mysqli($host,$user,$password,$bd) or die("Erro ao conectar com o banco");

    return $con;
}