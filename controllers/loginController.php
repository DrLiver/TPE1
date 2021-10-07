<?php
require_once 'models/LoginModel.php';
require_once 'view/RegisterView.php';
require_once 'models/PageModel.php';
require_once 'view/pageView.php';

class LoginController {
    private $model;
    private $view;
    private $PageModel;
    private $PageView;

    function __construct() {
        $this->model = new LoginModel();
        $this->view = new RegisterView();
        $this->PageModel = new PageModel();
        $this->PageView = new PageView();
    }

    public function login ($username, $password) {
        if (!empty($username) && !empty($password)) {
            $users = $this->model->bringUsersDB();
            foreach ($users as $user) {
                if($user->username == $username) {
                    if (password_verify($password, $user->password)) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = password_hash($password,PASSWORD_BCRYPT);
                        header("Location:".BASE_URL."home");
                        break;
                    }
                    else {
                        $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'la contraseña es incorrecta. ');
                        break;
                    }
                }
                else {
                    $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'el usuario es incorrecto. ');
                }

            }
        }
        else {
            $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'faltan completar campos. ');
        }
    }

    public function checkLogin () {
        session_start();
        if (!empty($_SESSION)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function logout () {
        session_start();
        session_destroy();
        header("Location:".BASE_URL."home");
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
}