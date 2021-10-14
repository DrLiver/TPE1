<?php
require_once 'controllers/PageController.php';
require_once 'controllers/loginController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_REQUEST['operacion'])) {
    $operacion = $_REQUEST['operacion'];
} 
else {
    $operacion = 'home';
}

$Controller = new PageController();
$LoginController = new LoginController();

$parametros = explode('/', $operacion);

switch ($parametros[0]) {
    case 'home': 
        $Controller->home();
        break;
    case 'admin':
        if($LoginController->checkLogin()) {
            $Controller->admin();
        }
        else {
            $Controller->home();
        }
        break;
    case 'usersList':
        if ($LoginController->checkLogin()) {
           $LoginController->showUsers();  
        }
        else {
            $Controller->home();
<<<<<<< HEAD
        }
    case 'filtrar': 
        $Controller->filtrar($_REQUEST["division"]);
        break;
    case 'equipo': 
        $Controller->verEquipo($parametros[1]);
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
        $Controller->eliminarEquipo($parametros[1]);
        break;  
    case 'eliminarDivision': 
        $Controller->eliminarDivision($parametros[1]);
        break; 
    case 'agregarEquipo': 
        $Controller->agregarEquipo();
        break;  
    case 'agregarDivision': 
        $Controller->agregarDivision();
        break;
    case 'logout':
        $LoginController->logout();
        break;
/*
    case "modificar":
        $controller->modifyToDb($parametros[1], 'CAMBIO', 'CAMBIO', '666');
        var_dump($operacion);
        break;
=======
            break;
        case 'admin':
                $LoginController->admin();
            break;
        case 'usersList':
               $LoginController->showUsers();  
               break;
        case 'filtrar': 
            $Controller->filtrar($_REQUEST["division"]);
            break;
        case 'equipo': 
            $Controller->verEquipo($parametros[1]);
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
            $LoginController->eliminarEquipo($parametros[1]);
            break;  
        case 'eliminarDivision': 
            $LoginController->eliminarDivision($parametros[1]);
            break; 
        case 'agregarEquipo': 
            $LoginController->agregarEquipo();
            break;  
        case 'agregarDivision': 
            $LoginController->agregarDivision();
            break;
        case 'logout':
            $LoginController->logout();
            break;
 /*
        case "modificar":
            $controller->modifyToDb($parametros[1], 'CAMBIO', 'CAMBIO', '666');
            var_dump($operacion);
            break;
>>>>>>> 3037cc9b27ca014da2b49832ab39b8757148154d
*/
    default:
        echo"page not found";
        break;
}

