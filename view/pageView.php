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

    function traerHome($equipos){
        $this->smarty->assign('equipo',$equipos);
        $this->showHeaderNav("inicio");
        $this->smarty->display("templates/home.tpl");
    }

    function verUnEquipo($equipo){
            $this->smarty->assign('equipo',$equipo);
            $this->showHeaderNav("Detalle de la Tarea");
            $this->smarty->display("templates/detalleEquipo.tpl");
        }

    
}
    