<?php

require_once "models/EquipoModel.php";
require_once "view/EquipoView.php";
require_once "models/DivisionesModel.php";
require_once "Helpers/AuthHelper.php";
require_once "controllers/LoginController.php";

class EquipoController{
    private $model;
    private $view;
    private $divisionModel;
    private $LoginView;
    private $authHelper;

    function __construct(){
        $this->model = new EquipoModel();
        $this->view = new EquipoView();
        $this->divisionModel= new DivisionesModel;
        $this->LoginView = new LoginController;
        $this->authHelper = new AuthHelper();
    }

    public function home(){
        $equipos =  $this->model->traerEquipos();
        $divisiones =  $this->divisionModel->traerDivisiones();
        $this->view->traerHome($equipos,$divisiones);
    }

    public function verEquipo($id){
        $equipo =  $this->model->traerEquipo($id);
        $this->view->verUnEquipo($equipo);
    }

    public function filtrar(){
        if (!empty($_POST['division'])){
            $id_division = $_POST['division'];
        }
        $divisiones =  $this->divisionModel->traerDivisiones();
        $equipos =  $this->model->traerEquipoPorDivision($id_division);
        $this->view->traerHome($equipos,$divisiones);
    }

    public function eliminarEquipo($id){
        $this->authHelper->checkLoggedIn();
        $this->model->borrarEquipoBaseDeDatos($id);
        $this->LoginView->admin('','equipo eliminado');
    }

    public function TraerParamodificarEquipo($id){
        $this->authHelper->checkLoggedIn();
        $equipo = $this->model-> TraerParaActualizar($id);
        $id_division= $this->divisionModel->TraerParaActualizarDivision($equipo->id_division);
        $divisiones =  $this->divisionModel->traerDivisiones();
        $this->view->TraerParamodificar($divisiones,$equipo,$id_division);
    }

    public function actualizarEquipo(){
        $this->authHelper->checkLoggedIn();
        if (!empty($_POST['equipo'])&&!empty($_POST['posicion'])) {
            $nombre = $_POST['equipo'];
            $posicion = $_POST['posicion'];
            $descripcion = $_POST['descripcion'];
            $id = $_POST['id_equipo'];
            $division = $this->divisionModel->traerIdDivisiones($_POST['division']);
            $id_division= $division->id_division;
            $this->model->actualizarEquipo($id,$nombre,$descripcion,$posicion,$id_division);
            $this->LoginView->admin('',"modificado con exito el equipo");
        }else{
            $this->LoginView->admin('Falta completar campos ');
        }
    }

    public function agregarEquipo(){
        $this->authHelper->checkLoggedIn();
        if (!empty($_POST['equipo'])&&!empty($_POST['posicion'])) {
            $equipo = $_POST['equipo'];
            $posicion = $_POST['posicion'];
            $enUso = false;
            foreach ($this->model->traerEquipos() as $nombre ) {
                if (($nombre->nombre) == ($equipo)) {
                    $enUso = true;
                    $this->LoginView->admin('El equipo  que queres agregar ya esta en uso');
                }
            }
            if($enUso == false ){
                $division = $this->divisionModel->traerIdDivisiones($_POST['division']);
                $id= $division->id_division;
                $this->model->insertarEquipo($id ,$equipo,$_POST['descripcion'],$posicion);
                $this->LoginView->admin('','Agregado con exíto');
            }

        }else{
            $this->LoginView->admin('Falta completar campos ');
        }
    }
}