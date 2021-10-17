<?php

class DivisionesModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    public function traerDivisiones(){
        $sentencia = $this->basededatos->prepare('SELECT * FROM divisiones');
        $sentencia->execute();
        $divisiones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $divisiones;
    }

    public function traerIdDivisiones($division){
        $sentencia = $this->basededatos->prepare('SELECT * FROM divisiones WHERE division=?');
        $sentencia->execute(array($division));
        $divisiones = $sentencia->fetch(PDO::FETCH_OBJ);
        return $divisiones;
    }

    public function borrarDivisionBaseDeDatos($id){
        $sentencia = $this->basededatos->prepare("DELETE FROM divisiones WHERE id_division=?");
        $sentencia->execute(array($id));   
    }

    public function insertarDivision($cantidad,$division){
        $sentencia = $this->basededatos->prepare("INSERT INTO divisiones( division,cantidad_equipos) /* nombre de la base de datos */VALUES(?,?)");
        $sentencia->execute(array($division,$cantidad));   
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