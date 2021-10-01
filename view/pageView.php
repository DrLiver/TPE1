<?php
require_once "libraries/smarty-master/libs/Smarty.class.php";

class PageView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHeaderNav($title) {
        $this->smarty->assign('title',"{$title}");
        $this->smarty->assign('loginForm', '<h4>iniciar sesión</h4>
        <form action="login" method="post" id="form">
            <label for="username">usuario:</label>
            <input type="text" name="username" id="inputLogin">
            <label for="password">contraseña:</label>
            <input type="text" name="password" id="inputLogin">
            <input type="submit" value="Login">
        </form>
        <p id="register">no tienes una cuenta? Registrate <a href="register">aquí</a></p>');
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->display("templates/header.tpl");
        $this->smarty->display("templates/nav.tpl");

    }

    function traerHome($equipos){
        $this->smarty->assign('equipo',$equipos);
        $this->showHeaderNav("inicio");
        $this->smarty->display("templates/home.tpl");
    }

    function verUnEquipo($equipo){
            $this->smarty->assign('equipo',$equipo);
            $this->showHeaderNav("Detalle de la Tarea");
            $this->smarty->display("templates/detalleEquipo.tpl");
        }

    
}
    