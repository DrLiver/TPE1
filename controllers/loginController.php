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

    function showRegister ($error ="") {
        $this->view->showRegister($error);
    }

    function completeRegister ($username, $password) {
        $alreadyRegistered = false;
        foreach ($this->model->bringUsersDB() as $user) {
            if ($username == $user->username && $password !="") {
                $alreadyRegistered = true;
                $this->showRegister('otro usuario ya tiene el mismo nombre');
            }
        }   
        if ($alreadyRegistered == false) {
            if (!empty($username)&&!empty($password)) {
                $passwordHash = password_hash($password,PASSWORD_BCRYPT);
                $this->model->crearUsuario($username,$passwordHash);
                header('Location:' . BASE_URL . 'registerCompleted');
            }else{
                $this->showRegister('Faltan completar campos');
            }
        }
    }
}