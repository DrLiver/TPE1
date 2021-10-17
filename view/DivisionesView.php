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

    function traerHomeDivision($division){
            $this->smarty->assign('division',$division);
            $this->smarty->assign('SESSION', $this->authHelper->session());
            $this->smarty->assign('loginError');
            $this->smarty->display("templates/detalleEquipo.tpl");
        
    }

}