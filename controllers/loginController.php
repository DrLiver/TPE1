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
                    session_start();
                    $_SESSION['username'] = $username;
                    $this->PageView->location();
                }
                else {
                    $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'la contraseña es incorrecta. ');
                }
            }
            else {
                $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'El usuario no existe en nuestra base de datos ');
            }
        }
        else {
            $this->PageView->traerHome($this->PageModel->traerEquipos(), $this->PageModel->traerDivisiones(), 'faltan completar campos. ');
        }
    }

    private function checkLogin() {
       error_reporting(0);
        session_start();
        $user = $_SESSION['username'];
        if ($user == '') {
            $this->PageView->location();
        }
    }

    public function showUsers() {
        $this->checkLogin ();
        $users = $this->model->bringUsersDB();
        $this->view->usersTable($users);
    }

    public function logout () {
        session_start();
        session_destroy();
        $this->PageView->location();
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
        $this->model->borrarEquipoBaseDeDatos($id);
        $this->admin();
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
            $this->model->borrarDivisionBaseDeDatos($id);
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
                $division = $this->model->traerIdDivisiones($_POST['division']);
                $id= $division->id_division;
                $this->model->insertarEquipo($id ,$equipo,$_POST['descripcion'],$posicion);
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
                $this->model->insertarDivision($cantidad,$divisionNueva);
                $this->admin();
            }
        }else{
            $this->admin('Falta completar campos ');
        }
    }

    public function TraerParamodificar($id){
        $this->checkLogin ();
        $equipo = $this->model-> TraerParaActualizar($id);
        $divisiones =  $this->PageModel->traerDivisiones();
        $this->view->TraerParamodificar($divisiones,$equipo);
    }

    public function actualizarEquipo($id,$nombre,$descripcion,$posicion,$division){
        $this->checkLogin ();
        $division = $this->model->traerIdDivisiones($_POST['division']);
        $id_division= $division->id_division;
        $this->model->actualizarEquipo($id,$nombre,$descripcion,$posicion,$id_division);
        $this->admin();
    }

    public function TraerParamodificarDivision($id){
        $this->checkLogin ();
        $divisiones =  $this->model-> TraerParaActualizarDivision($id);
        $this->view->TraerParamodificar($divisiones);
    }

    public function actualizarDivision($id,$cantidad,$division){
        $this->checkLogin ();
        $this->model->actualizarDivision($id,$cantidad,$division);
        $this->admin();

    }
}