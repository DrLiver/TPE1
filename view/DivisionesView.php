<?php

require_once "Helpers/AuthHelper.php";
require_once "libraries/smarty-master/libs/Smarty.class.php";

class DivisionesView {

    private $smarty;
    private $authHelper;

    function __construct(){
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
    }

    public function traerDivisiones($divisiones,$loginError = ''){
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('division',$divisiones);
        $this->smarty->assign('title',"Divisiones");
        $this->smarty->assign('loginError',$loginError);
        $this->smarty->display("templates/divisiones.tpl");
    }


    public function adminDivisiones($divisiones,$error,$exito){
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('division',$divisiones);
        $this->smarty->assign('error',$error);
        $this->smarty->assign('exito',$exito);
        $this->smarty->assign('title',"Administrador Divisiones");
        $this->smarty->display("templates/adminDivisiones.tpl");
      
    }

    public function TraerParamodificarDivision($divisiones,$id_division=""){
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('divisiones', $divisiones);
        $this->smarty->assign('contador', $id_division);
        $this->smarty->assign('title', "Modificar Division");
        $this->smarty->display('templates/actualizar.tpl');
    }

}
