<?php
require_once "libraries/smarty-master/libs/Smarty.class.php";

class PageView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHeaderNav($title) {
        $this->smarty->assign('title',"{$title}");
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->display("templates/header.tpl");
        $this->smarty->display("templates/nav.tpl");

    }

    function userLocation(){
        header("Location:".BASE_URL."user");
    }

    function traerHome($equipos,$divisiones){
        $this->smarty->assign('equipo',$equipos);
        $this->smarty->assign('division',$divisiones);
        $this->showHeaderNav("inicio");
        $this->smarty->display("templates/home.tpl");
    }

    function verUnEquipo($equipo){
        $this->smarty->assign('equipo',$equipo);
        $this->showHeaderNav("Detalle de la Tarea");
        $this->smarty->display("templates/detalleEquipo.tpl");
    }
    
 

    function traerHomeUser($equipos,$divisiones){
        $this->smarty->assign('equipo',$equipos);
        $this->smarty->assign('division',$divisiones);
        $this->showHeaderNav("Administrador");
        $this->smarty->display("templates/userHome.tpl");
      
    }

    function pageError($error=''){
        $this->smarty->assign('error',$error);
        $this->showHeaderNav("Error al eliminar una division");
        $this->smarty->display("templates/errorDivision.tpl");

    }

   
}
    