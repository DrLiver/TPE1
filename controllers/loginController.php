<?php
require_once 'models/loginModel.php';

class loginController {
    private $model;

    function __construct() {
        $this->model = new loginModel();
    }

    function login ($username, $password) {
        
    }
}