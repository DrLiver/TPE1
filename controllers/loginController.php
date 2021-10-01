<?php
require_once 'models/loginModel.php';
require_once 'view/registerView.php';

class loginController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new loginModel();
        $this->view = new registerView();
    }

    function login ($username, $password) {
        
    }

    function showRegister () {
        $this->view->showRegister();
    }
}