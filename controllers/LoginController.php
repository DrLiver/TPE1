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

    function __construct() {
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->EquipoView = new EquipoView();
        $this->equipoModel = new EquipoModel();
        $this->divisionModel = new DivisionesModel();
        $this->authHelper = new AuthHelper();
    }

    public function login ($username, $password) {
        if (!empty($username) && !empty($password)) {
            $user = $this->model->traerUser($username);
            if (!empty($user)) {
                if (password_verify($password, $user->password)) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $this->view->location("admin");
                }
                else {
                    $this->EquipoView->traerHome($this->equipoModel->traerEquipos(), $this->divisionModel->traerDivisiones(), 'la contraseña es incorrecta. ');
                }
            }
            else {
                $this->EquipoView->traerHome($this->equipoModel->traerEquipos(), $this->divisionModel->traerDivisiones(), 'El usuario no existe en nuestra base de datos ');
            }
        }
        else {
            $this->EquipoView->traerHome($this->equipoModel->traerEquipos(), $this->divisionModel->traerDivisiones(), 'faltan completar campos. ');
        }
    }


    public function showUsers() {
        $this->authHelper->checkLoggedIn();
        $users = $this->model->bringUsersDB();
        $this->view->usersTable($users);
    }

    public function logout () {
        session_start();
        session_destroy();
        $this->view->location("home");
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
        }
        else{
            $this->showRegister('Faltan completar campos');
        }
    }

    public function deleteUser($userID) {
        $this->model->borrarUser($userID);
        $this->view->location("usersList");
    }

    public function admin($error='',$exito=""){
        $this->authHelper->checkLoggedIn();
        $equipos =  $this->equipoModel->traerEquipos();
        $division =  $this->divisionModel->traerDivisiones();
        $this->view->traerHomeUser($equipos,$division,$error,$exito);
    }
    
    

   

    

   

   

    

    

   
    
}