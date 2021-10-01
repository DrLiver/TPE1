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
        
        //mas adelante esta funcion se cambiara luego de hacer la verificacion del login...
        $this->smarty->assign('loginForm', '<h4>iniciar sesión</h4>
                                            <form action="" method="post" id="form">
                                                <label for="username">usuario:</label>
                                                <input type="text" name="username" id="inputLogin">
                                                <label for="password">contraseña:</label>
                                                <input type="text" name="password" id="inputLogin">
                                                <input type="submit" value="Login">
                                            </form>');

        $this->smarty->display("templates/header.tpl");
        $this->smarty->display("templates/nav.tpl");
        $this->smarty->display("templates/home.tpl");
    }

    function verUnEquipo($equipo){
            $this->smarty->assign('equipo',$equipo);
            $this->smarty->assign('titulo',"Detalle de la Tarea");
            $this->smarty->display("templates/detalleEquipo.tpl");
        }

    
}
    