<?php

class ComentariosModel {
    
    private $basededatos;

    function __construct(){
        $this->basededatos = new PDO('mysql:host=localhost;'.'dbname=fichajes;charse=utf8','root','');
    }

    public function getComentarios(){
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getComentario($id){
        $sentencia = $this->basededatos->prepare("SELECT * FROM comentarios WHERE id_comentario = ? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }


    public function traeruserComent($id){
        $sentencia = $this->basededatos->prepare('SELECT a.*,b.* FROM comentarios  a INNER JOIN usuarios b ON a.id_usuario = b.id_usuario  WHERE id_equipo=? ORDER BY id_comentario DESC ');
        $sentencia->execute(array($id));
        $equipos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    public function insertComent($id_usuario,$id_equipo,$comentario){
        $sentencia = $this->basededatos->prepare('INSERT INTO comentarios(id_usuario,id_equipo,comentario) VALUES(?,?,?)');
        $sentencia->execute([$id_usuario,$id_equipo,$comentario]);
    }

}