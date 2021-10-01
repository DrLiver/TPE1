<?php
require_once 'pageView.php';
require_once "libraries/smarty-master/libs/Smarty.class.php";

class registerView{

    private $smarty;
    private $pageView;

    function __construct(){
        $this->smarty = new Smarty();
        $this->pageView = new pageView();
    }

    function showRegister() {
        $this->pageView->showHeaderNav("inicio");
        $this->smarty->display('templates/register.html');
    }

}