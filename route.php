<?php
require_once 'controllers/PageController.php';
require_once 'controllers/loginController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_REQUEST['operacion'])) {
    $operacion = $_REQUEST['operacion'];
} else {
    $operacion = 'home';     // acción por defecto si no envían
}


    $Controller = new PageController();
    $LoginController = new LoginController();

    $parametros = explode('/', $operacion);

    switch ($parametros[0]) {
        case 'home': 
            $Controller->home();
            break;
        case 'filtrar': 
            $Controller->filtrar($_REQUEST['division']);
            break;
        case 'equipo': 
            $Controller->verEquipo($parametros[1]);
            break;     
        case 'login':
            $LoginController->login($_REQUEST['username'], $_REQUEST['password']);
            break;
        case 'register':
            $LoginController->showRegister();
            break;
             /*
        case "agregar":
            $controller->addToDb($_REQUEST["name"], $_REQUEST["apellido"], $_REQUEST["tel"]);
            break;

        case "eliminar":
            $controller->removeToDb($parametros[1]);
            break;

        case "modificar":
            $controller->modifyToDb($parametros[1], 'CAMBIO', 'CAMBIO', '666');
            var_dump($operacion);
            break;
*/
        default:
            echo"page not found";
            break;
    }
