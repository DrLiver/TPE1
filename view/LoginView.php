<?php
require_once "Helpers/AuthHelper.php";
require_once "libraries/smarty-master/libs/Smarty.class.php";

class LoginView{

    private $smarty;
    private $authHelper;
    private $equipoView;

    function __construct(){
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
        $this->equipoView = new EquipoView();
    }
    
    public function showRegister($message = '') {
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('loginError');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('title', "Registrarse");
        $this->smarty->display('templates/register.tpl');
    }

   

}
    