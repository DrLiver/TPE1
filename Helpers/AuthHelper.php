<?php

    class AuthHelper{

        function __construct(){

        }
    
        function checkLoggedIn(){
            error_reporting(0);
            session_start();
            if(!isset($_SESSION["username"])){
                header("Location: ".BASE_URL."home");
                die();
            }
        }

        public function session() {
            error_reporting(0);
            session_start();
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