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
    
    function completeRegister($username, $password, $view) {
        $alreadyRegistered = false;
        foreach ($this->bringUsersDB() as $user) {
            if ($username == $user->username) {
                $alreadyRegistered = true;
                $view->showRegister('otro usuario ya tiene el mismo nombre');
            }
        }
        if ($alreadyRegistered == false) {
            if ($username == '' && $password == '') {
                $view->showRegister('falta completar campos');
            }
            else {
                $sentencia = $this->basededatos->prepare("INSERT INTO usuario(username, password) VALUES(?, ?)");
                $sentencia->execute(array($username, password_hash($password, PASSWORD_BCRYPT)));
                header('Location:' . BASE_URL . 'registerCompleted');
            }
        }
    }
}