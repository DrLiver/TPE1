
<?php

class EquipoModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    public function traerEquipos(){
        $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM equipos a INNER JOIN divisiones b ON a.id_division = b.id_division');
        $sentencia->execute();
        $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function traerEquipo($id){
        $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM equipos a INNER JOIN divisiones b ON a.id_division = b.id_division WHERE id_equipo=?');
        $sentencia->execute(array($id));
        $equipo = $sentencia->fetch(PDO::FETCH_OBJ);
        return $equipo;
    }

    public function traerEquipoPorDivision($division){
        $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM equipos a LEFT JOIN divisiones b ON a.id_division = b.id_division WHERE division =?');
        $sentencia->execute(array($division));
        $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function borrarEquipoBaseDeDatos($id){
        $sentencia = $this->basededatos->prepare("DELETE FROM equipos WHERE id_equipo=?");
        $sentencia->execute(array($id)); 
    }

    public function insertarEquipo($division,$equipo,$descripcion,$posicion){
        $sentencia = $this->basededatos->prepare("INSERT INTO equipos( id_division, nombre, descripcion,posicion) /* nombre de la base de datos */VALUES(?,?,?,?)");
        $sentencia->execute(array($division,$equipo,$descripcion,$posicion));   

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
}    
