<?php

require_once 'models/LoginModel.php';
require_once 'view/LoginView.php';
require_once "Helpers/AuthHelper.php";

class LoginController {
    private $model;
    private $view;
    private $equipoModel;
    private $divisionModel;
    private $EquipoView;
    private $authHelper;
    private $userModel;

    function __construct() {
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->EquipoView = new EquipoView();
        $this->equipoModel = new EquipoModel();
        $this->divisionModel = new DivisionesModel();
        $this->userModel = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    public function login () {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->model->traerUser($username);
            if (!empty($user)) {
                if (password_verify($password, $user->password)) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $this->authHelper->location("adminEquipo");
                }
                else {
                    $this->EquipoView->traerHome($this->equipoModel->traerEquipos(), $this->divisionModel->traerDivisiones(), 'La contraseña es incorrecta. ');
                }
            }
            else {
                $this->EquipoView->traerHome($this->equipoModel->traerEquipos(), $this->divisionModel->traerDivisiones(), 'El usuario no existe. ');
            }
        }
        else {
            $this->EquipoView->traerHome($this->equipoModel->traerEquipos(), $this->divisionModel->traerDivisiones(), 'Faltan completar campos. ');
        }
    }

    public function logout () {
        session_start();
        session_destroy();
        $this->authHelper->location("equipos");
    }

    public function showRegister ($error ="") {
        $this->view->showRegister($error);
    }

    public function completeRegister () {
        if (!empty($_POST['registerUsername'])&&!empty( $_POST['registerPassword'])) {
            $username = $_POST['registerUsername'];
            $password =  $_POST['registerPassword'];
            $passwordHash = password_hash($password,PASSWORD_BCRYPT);
            $alreadyRegistered = false;
            foreach ($this->userModel->bringUsersDB() as $user) {
                if ($username == $user->username && $password !="") {
                    $alreadyRegistered = true;
                    $this->showRegister('Usuario en uso');
                }
            }
            if($alreadyRegistered == false ){
                $this->model->crearUsuario($username,$passwordHash);
                $this->showRegister("Registro Exitoso!");
            }
        }
        else{
            $this->showRegister('Faltan completar campos');
        }
    }

   
    

}