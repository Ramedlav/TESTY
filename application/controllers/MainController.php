<?php
namespace application\controllers;

use application\core\Controller;


class MainController extends Controller {

    public function indexAction()
    {
        $message = $this->route['message'];
        $link = $this->route['link'];
        $arr = $this->model->countAll();
        foreach ($arr as $ar){
            foreach ($ar as $a){
                $count = $a;
            }
        }
        $country = $this->model->getCountry();
        $this->view->render($this->route['title'] , ['country' =>$country,'message'=>$message, 'link'=> $link, 'count' => $count]);
    }

    public function registerAction()
    {
        $_POST['phone'] = '+1'.$_POST['phone'];
        $_SESSION['email'] = $_POST['email'];
        $this->model->firstRegister(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['birthdate'],
            $_POST['report_subject'],
            $_POST['country'],
            $_POST['phone']
        );
    }

    public function register_nextAction()
    {
        $uploaddir =  $_SERVER['DOCUMENT_ROOT'].'/public/images/';
        $uploadfile = $uploaddir . basename($_FILES["img"]['name']);
        $path = '/public/images/'.basename($_FILES["img"]['name']);
        echo '<pre>';
        if (move_uploaded_file($_FILES["img"]['tmp_name'], $uploadfile)) {
            echo "file is downloaded\n to ".$uploadfile;
        } else {
            echo "danger, danger\n";
        }



        $this->model->secondRegister(
            $_POST['email_2'],
            $_POST['company'],
            $_POST['position'],
            $_POST['about_me'],
            $path
        );

    }
}