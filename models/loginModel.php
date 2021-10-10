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

    public function borrarEquipoBaseDeDatos($id){
        $sentencia = $this->basededatos->prepare("DELETE FROM equipos WHERE id_equipo=?");
        $sentencia->execute(array($id)); 
    }

    public function borrarDivisionBaseDeDatos($id){
        $sentencia = $this->basededatos->prepare("DELETE FROM divisiones WHERE id_division=?");
        $sentencia->execute(array($id));   
    }
    
    public function traerIdDivisiones($division){
        $sentencia = $this->basededatos->prepare('SELECT * FROM divisiones WHERE division=?');
        $sentencia->execute(array($division));
        $divisiones = $sentencia->fetch(PDO::FETCH_OBJ);
        return $divisiones;
    }
    
    public function insertarEquipo($division,$equipo,$descripcion,$posicion){
            $sentencia = $this->basededatos->prepare("INSERT INTO equipos( id_division, nombre, descripcion,posicion) /* nombre de la base de datos */VALUES(?,?,?,?)");
            $sentencia->execute(array($division,$equipo,$descripcion,$posicion));   
    
        }
        
    public function insertarDivision($cantidad,$division){
        $sentencia = $this->basededatos->prepare("INSERT INTO divisiones( division,cantidad_equipos) /* nombre de la base de datos */VALUES(?,?)");
        $sentencia->execute(array($division,$cantidad));   
    }

    public function TraerParaActualizar($id){
        $sentencia = $this->basededatos->prepare('SELECT * FROM equipos WHERE id_equipo=?');
        $sentencia->execute(array($id));
        return  $sentencia->fetch(PDO::FETCH_OBJ);
        
    }

    function actualizarEquipo($id,$nombre,$descripcion,$posicion,$division){
        $sentencia = $this->basededatos->prepare('UPDATE  equipos SET nombre=?,descripcion=?,posicion=?,id_division=?  WHERE id_equipo = ?' );
        $sentencia->execute(array($nombre,$descripcion,$posicion,$division,$id));  

    }

    public function TraerParaActualizarDivision($id){
        $sentencia = $this->basededatos->prepare('SELECT * FROM divisiones WHERE id_division=?');
        $sentencia->execute(array($id));
        return  $sentencia->fetch(PDO::FETCH_OBJ);

    }

    public function actualizarDivision($id,$cantidad,$division){
        $sentencia = $this->basededatos->prepare('UPDATE  divisiones SET cantidad_equipos=?, division=?  WHERE id_division = ?' );
        $sentencia->execute(array($cantidad,$division,$id));  
    }
}