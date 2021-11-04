<?php
    require_once "models/ComentariosModel.php";
    require_once "view/ApiView.php";

    class ApiComentController  {

        private $model;
        private $view;

        public function __construct() {
            $this->model = new ComentariosModel();
            $this->view = new APIView();
        }

        public function getComents($operacion = []) {
            if (empty($operacion)) {
                $users = $this->model->getComentarios();
                $this->view->response($users, 200);
            }
            else {
                $id = $operacion[":ID"];
                $user = $this->model->traeruserComent($id);
                if ($user) {
                    $this->view->response($user, 200);
                }
                else {
                    $this->view->response("no existe el objeto de la posicion $id", 404);
                }
            }
        }


        public function addComent($params = []) {   
            $coments = $this->getBody(); // la obtengo del body
            // inserta la tarea
            $comentId = $this->model->insertComent($coments->id_usuario,$coments->id_equipo,$coments->comentario);
            // obtengo la recien creada
            $comentarioNueva = $this->model->getComentario($comentId);
            if ($comentarioNueva)
                $this->view->response($comentarioNueva, 200);
            else
                $this->view->response("Error al insertar tarea", 500);
        }

        public function getBody () {
            $bodyString =file_get_contents("php://input");
            return json_decode($bodyString);
        }
    

    }
