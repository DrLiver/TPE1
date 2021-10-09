<?php
require_once "models/PageModel.php";
require_once "view/PageView.php";

class PageController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new PageModel();
        $this->view = new PageView();
    }

    public function home(){
        $equipos =  $this->model->traerEquipos();
        $division =  $this->model->traerDivisiones();
        $this->view->traerHome($equipos,$division);
    }

    public function verEquipo($id){
        $equipo =  $this->model->traerEquipo($id);
        $this->view->verUnEquipo($equipo);
    }

    public function filtrar($id_division){
        $divisiones =  $this->model->traerDivisiones();
        $equipos =  $this->model->traerEquipoPorDivision($id_division);
        $this->view->traerHome($equipos,$divisiones);
    }

    public function admin($error=''){
        $equipos =  $this->model->traerEquipos();
        $division =  $this->model->traerDivisiones();
        $this->view->traerHomeUser($equipos,$division,$error);
       
    }

    public function eliminarEquipo($id){
        $this->model->borrarEquipoBaseDeDatos($id);
        $this->view->userLocation();
        
    }

    public function eliminarDivision($id){
        $enUso = false;
        foreach ($this->model->traerEquipos() as $equipos ) {
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
        if (!empty($_POST['equipo'])&&!empty($_POST['posicion'])) {
            $equipo = $_POST['equipo'];
            $posicion = $_POST['posicion'];
            $enUso = false;
            foreach ($this->model->traerEquipos() as $nombre ) {
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
        if (!empty($_POST['division'])&&!empty($_POST['cantidad'])) {
            $divisionNueva = $_POST['division'];
            $cantidad = $_POST['cantidad'];
            
            $enUso = false;
            foreach ($this->model->traerDivisiones() as $divisiones ) {
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
}