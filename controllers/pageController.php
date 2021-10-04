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

    function home(){
        $equipos =  $this->model->traerEquipos();
        $division =  $this->model->traerDivisiones();
        $this->view->traerHome($equipos,$division);
    }

    function verEquipo($id){
        $equipo =  $this->model->traerEquipo($id);
        $this->view->verUnEquipo($equipo);
    }

    function filtrar($id_division){
        $divisiones =  $this->model->traerDivisiones();
        $equipos =  $this->model->traerEquipoPorDivision($id_division);
        $this->view->traerHome($equipos,$divisiones);
    }

    function pageUser(){
        $equipos =  $this->model->traerEquipos();
        $division =  $this->model->traerDivisiones();
        $this->view->traerHomeUser($equipos,$division);
    }

    function eliminarEquipo($id){
        $this->model->borrarEquipoBaseDeDatos($id);
        $this->view->userLocation();
        
    }

    function eliminarDivision($id){
        $enUso = false;
        foreach ($this->model->traerEquipos() as $equipos ) {
            if ($equipos->id_division == $id) {
                $enUso = true;
                $this->view->PageError('No podes eliminar a una division en uso');
                break;
            }
        }
        if($enUso == false ){
            $this->model->borrarDivisionBaseDeDatos($id);
            $this->pageUser();
        }
    }

    function agregarEquipo(){
        $division = $this->model->traerIdDivisiones($_POST['division']);
        $id= $division->id_division;
        $this->model->insertarEquipo($id ,$_POST['equipo'],$_POST['descripcion'],$_POST['posicion']);
        $this->view->UserLocation();
    }

    function agregarDivision(){
        $this->model->insertarDivision($_POST['cantidad'],$_POST['division']);
        $this->view->UserLocation();
    }
}