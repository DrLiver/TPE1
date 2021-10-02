<?php
require_once 'pageView.php';
require_once "libraries/smarty-master/libs/Smarty.class.php";

class RegisterView{

    private $smarty;
    private $pageView;

    function __construct(){
        $this->smarty = new Smarty();
        $this->pageView = new PageView();
    }

    function showRegister() {
        $this->pageView->showHeaderNav("Registrarse");
        $this->smarty->display('templates/register.tpl');
    }

}