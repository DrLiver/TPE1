<?php
require_once 'controllers/PageController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['operacion'])) {
    $operacion = $_GET['operacion'];
} else {
    $operacion = 'home';     // acción por defecto si no envían
}

    $Controller = new PageController();

    $parametros = explode('/', $operacion);

    switch ($parametros[0]) {
        case "home": 
            $Controller->home();
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
