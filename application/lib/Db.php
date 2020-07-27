<?php

namespace application\lib;
use PDO;


class Db extends Singleton {

    protected $link;

    public function __construct()
    {

        $config = require 'application/config/db.php';
        try{
            $this->link = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['user'], $config['password'],[PDO::ATTR_ERRMODE=>TRUE]);
        }catch(PDOExeception $e){
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        return $this->link;
    }

    public function query($sql){

        $sqli = explode(' ',$sql);//получаем первое слово зпроса для проверки


        if( ! $query = $this->link->query($sql) ) {
            die(var_export($this->link->errorinfo(), TRUE));
        }

        if($sqli[0] == "SELECT") {// такая странная проверка нужна что-бы отличать
            //будет ли ответ от запроса пустой или нет
            //решил что лучше сделать проверку, чем отдельный метод

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

        }
        if(isset($result)){
            return $result;
        }

    }
}