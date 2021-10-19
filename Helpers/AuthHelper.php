<?php

class AuthHelper{

    function __construct(){
    }

    public function islogin(){
        if(!isset($_SESSION)){ 
            session_start();
        }
    }

    public function checkLoggedIn(){
        $this->islogin();
        if(!isset($_SESSION["username"])){
            header("Location: ".BASE_URL."equipos");
            die();
        }
    }

    public function session() {
        $this->islogin();
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