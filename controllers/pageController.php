<?php
require_once "models/PageModel.php";
require_once "view/PageView.php";

class PageController{
    private $vista;

    function __construct(){
        $this->model = new PageModel();
        $this->vista = new PageView();
    }


    function home(){
        $equipos =  $this->model->traerEquipos();
        $this->vista->traerHome($equipos);
    }

    function verEquipo($id){
        $equipo =  $this->model->traerEquipo($id);
        $this->vista->verUnEquipo($equipo);
    }

}