<?php

class LoginModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    function bringUsersDB () {
        $sentencia = $this->basededatos->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function crearUsuario($username,$password){
        $sentencia = $this->basededatos->prepare("INSERT INTO usuario(nombre, password) VALUES(?, ?)");
        $sentencia->execute([$username,$password]);
    }
    
}