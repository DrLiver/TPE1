<?php

class PageModel{

private $basededatos;

function __construct(){
    $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
}


function traerEquipos(){
    $sentencia = $this-> basededatos->prepare('SELECT * FROM equipos');
    $sentencia->execute();
    $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $equipos;
}

}