<?php

class PageModel{

private $basededatos;

function __construct(){
    $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
}


function traerEquipos(){
    $sentencia = $this-> basededatos->prepare('SELECT a.*,b.* FROM equipos a LEFT JOIN divisiones b ON a.id_division = b.id_division');
    $sentencia->execute();
    $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $equipos;
}


function traerEquipo($id){
    $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM equipos a LEFT JOIN divisiones b ON a.id_division = b.id_division WHERE id_equipo=?');
    $sentencia->execute(array($id));   
    $equipo = $sentencia->fetch(PDO::FETCH_OBJ);
    return $equipo;
}
}