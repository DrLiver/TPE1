<?php

class UserModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    public function bringUsersDB() {
        $sentencia = $this->basededatos->prepare('SELECT * FROM usuarios');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function bringUserByNameDB ($nombre) {
        $sentencia = $this->basededatos->prepare("SELECT * FROM usuarios WHERE username =?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function bringUserDB ($userID) {
        $sentencia = $this->basededatos->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $sentencia->execute(array($userID));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function borrarUser ($userID) {
        $sentencia = $this->basededatos->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $sentencia->execute(array($userID)); 
    }

    public function volverloAdmin ($userID) {
        $sentencia = $this->basededatos->prepare("UPDATE usuarios SET privilege_level=? WHERE id_usuario=?");
        $sentencia->execute(array(1,$userID)); 
    }

    public function quitarAdmin ($userID) {
        $sentencia = $this->basededatos->prepare("UPDATE usuarios SET privilege_level =? WHERE id_usuario=?");
        $sentencia->execute(array(0,$userID)); 
    }

    public function bringComentarioDB($userID) {
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios WHERE id_comentario = ?");
        $sentencia->execute(array($userID));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function bringAllComentariosDB(){
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

}