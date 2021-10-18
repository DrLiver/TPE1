<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        if(!isset($_SESSION)){ 
            session_start(); 
            if(!isset($_SESSION["username"])){
                header("Location: ".BASE_URL."equipos");
                die();
            }
        }
    }

    public function session() {
        if(!isset($_SESSION)){ 
            session_start();
        }
        $session = null;
        if (!empty($_SESSION)) {
            $session = $_SESSION['username'];
        }
        return $session;
    }

    public function location($where){
        header("Location:".BASE_URL."$where");
    }
}