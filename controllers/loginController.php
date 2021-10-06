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

    public function login ($username, $password) {
        
    }

    public function showRegister ($error ="") {
        $this->view->showRegister($error);
    }

    public function completeRegister ($username, $password) {
        if (!empty($username)&&!empty($password)) {
            $passwordHash = password_hash($password,PASSWORD_BCRYPT);
            $alreadyRegistered = false;
            foreach ($this->model->bringUsersDB() as $user) {
                if ($username == $user->username && $password !="") {
                    $alreadyRegistered = true;
                    $this->showRegister('Usuario en uso');
                }
            }
            if($alreadyRegistered == false ){
                $this->model->crearUsuario($username,$passwordHash);
                $this->showRegister("Registro Exitoso!");
               
            }
        }else{
            $this->showRegister('Faltan completar campos');
            }
    }
}