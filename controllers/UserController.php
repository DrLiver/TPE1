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

    public function showUsers() {
        $this->authHelper->checkLoggedIn();
        $users = $this->model->bringUsersDB();
        $this->view->usersTable($users);
    }

    public function showUsersAPI() {
        $this->authHelper->checkLoggedIn();
        $this->view->usersTable();
        $this->view->JSFooterUsers();
    }

    public function deleteUser($userID) {
        $this->authHelper->checkLoggedIn();
        $this->model->borrarUser($userID);
        $this->authHelper->location("usersList");
    }

  
}