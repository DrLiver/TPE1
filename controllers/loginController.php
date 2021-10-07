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
            $this->model->verifyLogin($username, $password);
        }
        else {
            $equipos =  $this->PageModel->traerEquipos();
            $division =  $this->PageModel->traerDivisiones();
            $this->PageView->traerHome($equipos, $division, 'faltan completar campos!!!');
        }
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