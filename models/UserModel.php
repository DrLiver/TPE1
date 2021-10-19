<?php

class UserModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    public function bringUsersDB () {
        $sentencia = $this->basededatos->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function borrarUser ($userID) {
        $sentencia = $this->basededatos->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $sentencia->execute(array($userID)); 
    }
}
