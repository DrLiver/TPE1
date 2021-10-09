<?php
require_once 'models/LoginModel.php';
require_once 'view/logRegView.php';
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
            $user = $this->model->traerUser($username);
            if (!empty($user)) {
                        if (password_verify($password, $user->password)) {
                            $this->startSession($username, password_hash($password,PASSWORD_BCRYPT));
                            header("Location:".BASE_URL."home");
                           
                        }
                        else {
                            $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'la contraseña es incorrecta. ');
                           
                        }
            }
            else {
                $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'no hay usuarios en la base. ');
            }
        }
        else {
            $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'faltan completar campos. ');
        }
    }

    public function showUsers() {
        $users = $this->model->bringUsersDB();
        $this->view->usersTable($users);
    }

    public function checkLogin () {
        $user = $this->callSession('username');
        if ($user == null) {
            $this->PageView->location();
        }
    }

    public function startSession ($username, $password) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        session_write_close();
    }
    
    public function callSession ($who) {
        error_reporting(0);
        session_start();
        $data = $_SESSION[$who];
        session_write_close();
        error_reporting(1);
        return $data;
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

    
    public function admin($error=''){
        $this->checkLogin ();
        $equipos =  $this->PageModel->traerEquipos();
        $division =  $this->PageModel->traerDivisiones();
        $this->PageView->traerHomeUser($equipos,$division,$error);
       
    }

    public function eliminarEquipo($id){
        $this->checkLogin ();
        $this->PageModel->borrarEquipoBaseDeDatos($id);
        $this->PageWiew->location();
        
    }

    public function eliminarDivision($id){
        $this->checkLogin ();
        $enUso = false;
        foreach ($this->PageModel->traerEquipos() as $equipos ) {
            if ($equipos->id_division == $id) {
                $enUso = true;
                $this->admin('No podes eliminar a una division en uso');
                break;
            }
        }
        if($enUso == false ){
            $this->PageModel->borrarDivisionBaseDeDatos($id);
            $this->admin();
        }
    }

    public function agregarEquipo(){
        $this->checkLogin ();
        if (!empty($_POST['equipo'])&&!empty($_POST['posicion'])) {
            $equipo = $_POST['equipo'];
            $posicion = $_POST['posicion'];
            $enUso = false;
            foreach ($this->PageModel->traerEquipos() as $nombre ) {
                if (($nombre->nombre) == ($equipo)) {
                    $enUso = true;
                    $this->admin('El equipo  que queres agregar ya esta en uso');
                }
            }
            if($enUso == false ){
                $division = $this->PageModel->traerIdDivisiones($_POST['division']);
                $id= $division->id_division;
                $this->PageModel->insertarEquipo($id ,$equipo,$_POST['descripcion'],$posicion);
                $this->admin();
            }

        }else{
            $this->admin('Falta completar campos ');
        }
    }

    public function agregarDivision(){
        $this->checkLogin ();
        if (!empty($_POST['division'])&&!empty($_POST['cantidad'])) {
            $divisionNueva = $_POST['division'];
            $cantidad = $_POST['cantidad'];
            
            $enUso = false;
            foreach ($this->PageModel->traerDivisiones() as $divisiones ) {
                if (($divisiones->division) == ($divisionNueva)) {
                    $enUso = true;
                    $this->admin('La division que queres agregar ya esta en uso');
                }
            }
            if($enUso == false ){
                $this->PageModel->insertarDivision($cantidad,$divisionNueva);
                $this->admin();
            }
        }else{
            $this->admin('Falta completar campos ');
        }
    }
}