<?php
    $operacion = $_REQUEST['operacion'];

    require_once 'controllers/pageController.php';
    $controller = new controller();

    $parametros = explode('/', $operacion);

    switch ($parametros[0]) {
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

        default:
            $controller->showPage();
            break;
    }