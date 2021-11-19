<?php
    require_once "libraries/Router.php";
    require_once "apiController/ApiUsersController.php";
    require_once "apiController/ApiComentController.php";

    $router = new Router();

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $router->addRoute('users', 'GET', 'ApiUsersController', 'getUser');
    $router->addRoute('users/:ID', 'DELETE', 'ApiUsersController', 'deleteUser');
    $router->addRoute('users/:ID', 'PUT', 'ApiUsersController', 'doAdmin');
    $router->addRoute('users/:ID', 'UPDATE', 'ApiUsersController', 'quitAdmin');
    $router->addRoute('comentarios', 'GET', 'ApiComentController', 'getComents');
    $router->addRoute('comentarios/:ID', 'GET', 'ApiComentController', 'getComents');
    $router->addRoute('comentarios/', 'POST', 'ApiComentController', 'addComent');
    $router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentController', 'deleteComents');
    $router->addRoute('comentarios/:ID/:ESTRELLAS', 'GET', 'ApiComentController', 'flitrarPorEstrellas');
   

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
