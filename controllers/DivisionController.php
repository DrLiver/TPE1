<?php

require_once "models/DivisionesModel.php";
require_once "controllers/LoginController.php";

class DivisionController{
    private $model;
    private $equipoView;
    private $equipoModel; 
    private $LoginView;
    private $authHelper;
  

    function __construct(){
        $this->model = new DivisionesModel();
        $this->equipoView = new EquipoView;
        $this->equipoModel = new EquipoModel;
        $this->LoginView = new LoginController;
        $this->authHelper = new AuthHelper();
    }
   

    public function TraerParamodificarDivision($id){
        $this->authHelper->checkLoggedIn();
        $divisiones =  $this->model-> TraerParaActualizarDivision($id);
        $this->equipoView->TraerParamodificar($divisiones);
    }

    public function actualizarDivision(){
        $this->authHelper->checkLoggedIn();
        if (!empty($_POST['cantidad'])&&!empty($_POST['division'])) {
            $cantidad = $_POST['cantidad'];
            $division = $_POST['division'];
            $id =  $_POST['id_division'];
        $this->model->actualizarDivision($id,$cantidad,$division);
        $this->LoginView->admin('','Se modifico exitosamente la division');
        }else{
            $this->LoginView->admin('Falta completar campos ');
        }
    }

    public function eliminarDivision($id){
        $this->authHelper->checkLoggedIn();
        $enUso = false;
        foreach ($this->equipoModel->traerEquipos() as $equipos ) {
            if ($equipos->id_division == $id) {
                $enUso = true;
                $this->LoginView->admin('No podes eliminar a una division en uso');
                break;
            }
        }
        if($enUso == false ){
            $this->model->borrarDivisionBaseDeDatos($id);
            $this->LoginView->admin('','division eliminada');
        }
    }

    public function agregarDivision(){
        $this->authHelper->checkLoggedIn();
        if (!empty($_POST['division'])&&!empty($_POST['cantidad'])) {
            $divisionNueva = $_POST['division'];
            $cantidad = $_POST['cantidad'];
            $enUso = false;
            foreach ($this->model->traerDivisiones() as $divisiones ) {
                if (($divisiones->division) == ($divisionNueva)) {
                    $enUso = true;
                    $this->LoginView->admin('La division que queres agregar ya esta en uso');
                }
            }
            if($enUso == false ){
                $this->model->insertarDivision($cantidad,$divisionNueva);
                $this->LoginView->admin('','Agregado con exíto');
            }
        }else{
            $this->LoginView->admin('Falta completar campos ');
        }
    }
}