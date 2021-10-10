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

}