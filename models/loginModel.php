<?php

class LoginModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    public function bringUsersDB () {
        $sentencia = $this->basededatos->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function crearUsuario($username,$password){
        $sentencia = $this->basededatos->prepare("INSERT INTO usuario(username, password) VALUES(?, ?)");
        $sentencia->execute([$username,$password]);
    }

    public function traerUser ($username) {
        $sentencia = $this->basededatos->prepare("SELECT * FROM usuario WHERE username=?");
        $sentencia->execute([$username]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}