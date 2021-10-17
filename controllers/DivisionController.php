<?php

require_once "models/DivisionesModel.php";
require_once "view/DivisionesView.php";
require_once "controllers/LoginController.php";

class DivisionController{
    private $model;
    private $view;
    private $equipoView;
    private $equipoModel; 
    private $LoginView;
    private $authHelper;
  

    function __construct(){
        $this->model = new DivisionesModel();
        $this->view = new DivisionesView();
        $this->equipoView = new EquipoView;
        $this->equipoModel = new EquipoModel;
        $this->LoginView = new LoginController;
        $this->authHelper = new AuthHelper();
    }

    public function traerDivisiones(){
        $divisiones =  $this->model->traerDivisiones();
        $this->view->traerHomeDivision($divisiones);
    }

    public function TraerParamodificarDivision($id){
        $this->authHelper->checkLoggedIn();
        $divisiones =  $this->model-> TraerParaActualizarDivision($id);
        $this->equipoView->TraerParamodificar($divisiones);
    }

    public function actualizarDivision($id,$cantidad,$division){
        $this->authHelper->checkLoggedIn();
        $this->model->actualizarDivision($id,$cantidad,$division);
        $this->LoginView->admin();

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
            $this->LoginView->admin();
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
                $this->LoginView->admin();
            }
        }else{
            $this->LoginView->admin('Falta completar campos ');
        }
    }
    
}