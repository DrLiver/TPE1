<?php
require_once "models/PageModel.php";
require_once "view/PageView.php";

class PageController{
    private $model;
    private $vista;

    function __construct(){
        $this->model = new PageModel();
        $this->vista = new PageView();
    }

    function home(){
        $equipos =  $this->model->traerEquipos();
        $division =  $this->model->traerDivisiones();
        $this->vista->traerHome($equipos,$division);
    }

    function verEquipo($id){
        $equipo =  $this->model->traerEquipo($id);
        $this->vista->verUnEquipo($equipo);
    }

    function filtrar($id_division){
        $divisiones =  $this->model->traerDivisiones();
        $equipos =  $this->model->traerEquipoPorDivision($id_division);
        $this->vista->traerHome($equipos,$divisiones);
    }

}