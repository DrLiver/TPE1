<?php
require_once "Helpers/AuthHelper.php";
require_once "libraries/smarty-master/libs/Smarty.class.php";

class LoginView{

    private $smarty;
    private $authHelper;

    function __construct(){
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
    }

    public function location($where){
        header("Location:".BASE_URL."$where");
    }

    public function traerHomeUser($equipos,$divisiones,$error,$exito){
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('equipo',$equipos);
        $this->smarty->assign('division',$divisiones);
        $this->smarty->assign('error',$error);
        $this->smarty->assign('exito',$exito);
        $this->smarty->assign('title',"Administrador");
        $this->smarty->display("templates/userHome.tpl");
      
    }

    public function showRegister($message = '') {
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('loginError');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('title', "Registrarse");
        $this->smarty->display('templates/register.tpl');
    }

    public function usersTable ($users) {
        $this->smarty->assign('SESSION', $this->authHelper->session());
        $this->smarty->assign('users', $users);
        $this->smarty->assign('title', "Usuarios");
        $this->smarty->display('templates/usersList.tpl');
    }

}
    