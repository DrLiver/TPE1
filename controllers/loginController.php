<?php
require_once 'models/LoginModel.php';
require_once 'view/RegisterView.php';

class LoginController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new LoginModel();
        $this->view = new RegisterView();
    }

    function login ($username, $password) {
    }

    function showRegister () {
        $this->view->showRegister();
    }
}