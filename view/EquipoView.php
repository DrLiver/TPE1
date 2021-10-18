<?php

require_once "Helpers/AuthHelper.php";
require_once "libraries/smarty-master/libs/Smarty.class.php";

class EquipoView {

    private $smarty;
    private $authHelper;

    function __construct(){
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
    }

    public function traerHome($equipos,$divisiones,$loginError = ''){
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('equipo',$equipos);
        $this->smarty->assign('division',$divisiones);
        $this->smarty->assign('title',"Inicio");
        $this->smarty->assign('loginError',$loginError);
        $this->smarty->display("templates/home.tpl");
    }

    public function verUnEquipo($equipo){
        $this->smarty->assign('equipo',$equipo);
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('title', "Detalle del equipo");
        $this->smarty->display("templates/detalleEquipo.tpl");
    }

    public function TraerParamodificar($divisiones,$equipo='',$id_division=""){
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('divisiones', $divisiones);
        $this->smarty->assign('contador', $id_division);
        $this->smarty->assign('equipo', $equipo);
        $this->smarty->assign('title', "Modificar");
        $this->smarty->display('templates/actualizar.tpl');
    }


}
