<?php
require_once "libraries/smarty-master/libs/Smarty.class.php";

class PageView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }


     function traerHome($equipos){
        $this->smarty->assign('titulo',"inicio");
        $this->smarty->assign('equipo',$equipos);
        $this->smarty->display("templates/home.tpl");
    }

}
    