<?php

require_once 'models/UserModel.php';
require_once 'view/UserView.php';
require_once "Helpers/AuthHelper.php";

class UserController {
    private $model;
    private $view;
    private $authHelper;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new AuthHelper();
    }
/*
    public function showUsers() {                VER SI DEJAMOS ESTO O NO YA QUE NO SE USA, LO PASAMOS
        $this->authHelper->checkLoggedIn();      TODO A API REST
        $users = $this->model->bringUsersDB();
        $this->view->usersTable($users);
    }
*/
    public function showUsersAPI() {
        $this->authHelper->checkLoggedIn();
        $this->view->usersTable();
    }
/*
    public function deleteUser($userID) {
        $this->authHelper->checkLoggedIn();
        $this->model->borrarUser($userID);
        $this->authHelper->location("usersList");
    }
    */
  
}