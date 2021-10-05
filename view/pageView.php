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
    
 

    function traerHomeUser($equipos,$divisiones,$error){
        $this->smarty->assign('equipo',$equipos);
        $this->smarty->assign('division',$divisiones);
        $this->smarty->assign('error',$error);
        $this->showHeaderNav("Administrador");
        $this->smarty->display("templates/userHome.tpl");
      
    }


   
}
    