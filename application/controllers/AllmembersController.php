<?php
namespace application\controllers;

use application\core\Controller;


class AllmembersController extends Controller {

    public function showAction(){
        $users = $this->model->getAll();
        $this->view->render($this->route['title'], $users);
    }
}