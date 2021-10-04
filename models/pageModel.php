<?php

class PageModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;' . 'dbname=fichajes;charse=utf8', 'root', '');
    }

    function traerEquipos(){
        $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM equipos a LEFT JOIN divisiones b ON a.id_division = b.id_division');
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

    function traerDivisiones(){
        $sentencia = $this->basededatos->prepare('SELECT * FROM divisiones');
        $sentencia->execute();
        $divisiones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $divisiones;
    }

    function traerEquipoPorDivision($division){
        $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM equipos a LEFT JOIN divisiones b ON a.id_division = b.id_division WHERE division =?');
        $sentencia->execute(array($division));
        $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    /* funciones de adminstrador -- quizas deberia ir en UserModel ? */

    function borrarEquipoBaseDeDatos($id){
        $sentencia = $this->basededatos->prepare("DELETE FROM equipos WHERE id_equipo=?");
        $sentencia->execute(array($id)); 
    }

    function borrarDivisionBaseDeDatos($id){
            $sentencia = $this->basededatos->prepare("DELETE FROM divisiones WHERE id_division=?");
            $sentencia->execute(array($id));   
        }
    
    function traerIdDivisiones($division){
        $sentencia = $this->basededatos->prepare('SELECT * FROM divisiones WHERE division=?');
        $sentencia->execute(array($division));
        $divisiones = $sentencia->fetch(PDO::FETCH_OBJ);
        return $divisiones;
    }
    
        function insertarEquipo($division,$equipo,$descripcion,$posicion){
            $sentencia = $this->basededatos->prepare(
                "INSERT INTO equipos( id_division, nombre, descripcion,posicion) /* nombre de la base de datos */VALUES(?,?,?,?)");
            $sentencia->execute(array($division,$equipo,$descripcion,$posicion));   
    
        }
        
        function insertarDivision($cantidad,$division){
            $sentencia = $this->basededatos->prepare(
                "INSERT INTO divisiones( division,cantidad_equipos) /* nombre de la base de datos */VALUES(?,?)");
            $sentencia->execute(array($division,$cantidad));   
        }
}
