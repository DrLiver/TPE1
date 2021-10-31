<?php
    require_once "models/UserModel.php";
    require_once "view/ApiView.php";

    class ApiUsersController {

        private $model;
        private $view;


        public function __construct() {
            $this->model = new UserModel();
            $this->view = new ApiView();
        }

        public function getUser($operacion = []) {

            if (empty($operacion)) {
                $users = $this->model->bringUsersDB();
                $this->view->respuesta($users, 200);
            }
            else {
                $id = $operacion[":ID"];
                $user = $this->model->bringUserDB($id);
                if ($user) {
                    $this->view->respuesta($user, 200);
                }
                else {
                    $this->view->respuesta("no existe el objeto de la posicion $id", 404);
                }
            }
        }

        public function deleteUser ($operacion = null) {
            $id = $operacion[":ID"];
            $this->model->borrarUser($id);
            $this->view->respuesta("usuario $id borrado con exito", 200);
        }

        public function doAdmin ($operacion = null) {
            $id = $operacion[":ID"];
            $this->model->volverloAdmin($id);
            $this->view->respuesta("usuario $id convertido en admin", 200);
        }

        public function quitAdmin ($operacion = null) {
            $id = $operacion[":ID"];
            $this->model->quitarAdmin($id);
            $this->view->respuesta("usuario $id convertido en cliente", 200);
        }

        public function getBody () {
            $bodyString =file_get_contents("php://input");
            return json_decode($bodyString);
        }



    }






