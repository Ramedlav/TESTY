<?php

namespace application\core;

use application\core\View;

abstract class Controller {

    public $route;
    public $view;

    public function __construct($route){ //при вызове в Router.php получаем параметры из routs.php
        $this->route = $route;//присвоим суда, будем использовать в других методах
        $this->view = new  View($route);
        $this->model = $this->loadModel($route['controller']);//модель имеет одинаковое название с контроллером
        //по этому передаем в функцыю загрузки его название
    }


    public function checkData(){// проверяемданные формы, дополнительная проверка
                                // помимо той, что реализована с помощью Bootstrap
        if(isset($_POST['email'])&&!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $vars = 'application/messages/forgetEmail.php';//все сообщения лежат тут
            $this->view->render($this->route['title'], ['message' => $vars]);
            exit();
        }

        if(isset($_POST['name'])&&empty($_POST['name'])){
            $vars = 'application/messages/forgetName.php';//все сообщения лежат тут
            $this->view->render($this->route['title'], ['message' => $vars]);
            exit();
        }

        if(isset($_POST['email'])&&empty($_POST['email'])){
            $vars = 'application/messages/forgetEmail.php';
            $this->view->render($this->route['title'], ['message' => $vars]);
            exit();
        }
    }

    
    public function loadModel($name){
        $path = 'application\models\\'.ucfirst($name);//формируем маршрут к необходимой модели
        if(class_exists($path)){
            return new $path;
        }

    }


}
