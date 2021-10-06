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

    public function showRegister($message = '') {
        $this->smarty->assign('message', $message);
        $this->pageView->showHeaderNav("Registrarse");
        $this->smarty->display('templates/register.tpl');
    }

}