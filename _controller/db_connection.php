<?php


function connect(){
    $host ="localhost";
    $user="id5871108_root";
    $password ="123456";
    $bd = "id5871108_consulpet";

    $con = new mysqli($host,$user,$password,$bd) or die("Erro ao conectar com o banco");

    return $con;
}