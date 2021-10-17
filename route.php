<?php

require_once 'controllers/LoginController.php';
require_once 'controllers/EquipoController.php';
require_once 'controllers/DivisionController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_REQUEST['operacion'])) {
    $operacion = $_REQUEST['operacion'];
} else {
    $operacion = 'home';     // acción por defecto si no envían
}

    $EquipoController = new EquipoController(); 
    $DivisionController = new DivisionController(); 
    $LoginController = new LoginController();
    
    $parametros = explode('/', $operacion);

    switch ($parametros[0]) {
        case 'home': 
            $EquipoController->home();
            break;
        case 'equipo': 
            $EquipoController->verEquipo($parametros[1]);
            break; 
        case 'filtrar': 
            $EquipoController->filtrar($_REQUEST["division"]);
            break;  
        case 'admin':
            $LoginController->admin();
            break;
        case 'usersList':
            $LoginController->showUsers();  
            break;
       
         
        case 'register':
            $LoginController->showRegister();
            break;
        case 'registerMesage':
            $LoginController->completeRegister($_REQUEST['registerUsername'], $_REQUEST['registerPassword']);
            break;
        case 'login':
            $LoginController->login($_REQUEST['username'], $_REQUEST['password']);
            break;
        case 'eliminarEquipo': 
            $EquipoController->eliminarEquipo($parametros[1]);
            break;  
        case 'eliminarDivision': 
            $DivisionController->eliminarDivision($parametros[1]);
            break; 
        case 'agregarEquipo': 
            $EquipoController->agregarEquipo();
            break;  
        case 'agregarDivision': 
            $DivisionController->agregarDivision();
            break;
        case 'logout':
            $LoginController->logout();
            break;
        case 'eliminarUser':
            $LoginController->deleteUser($parametros[1]);
        case "modificarEquipo":
            $EquipoController->TraerParamodificarEquipo($parametros[1]);
            break;
        case "actualizarEquipo":
            $EquipoController->actualizarEquipo();
            break;
        case "modificarDivision":
            $DivisionController->TraerParamodificarDivision($parametros[1]);
            break;
        case "actualizarDivision":
            $DivisionController->actualizarDivision($_REQUEST['id_division'],$_REQUEST['cantidad'],$_REQUEST['division']);
            break;
        default:
            echo"page not found";
            break;
    }
