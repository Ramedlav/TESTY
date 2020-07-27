<?php

namespace application\lib;
class Singleton{

    private static $instances = [];

    protected function __construct(){
        //
    }

    protected function __clone(){
        //
    }

    public function __wakeup()
    {
        throw new \Exception("you can't do this");
    }

    public static function getInstanse(){
        $subclass = static::class;//static::class возвращает имя текущего класса (не знал что так можно:))
        if(!isset(self::$instances[$subclass])){//если данного экзепляра нет в нашем масиве
            self::$instances[$subclass] = new static;// мы его туда закинем
//            debug(self::$instances[$subclass]);
        }
        return self::$instances[$subclass];//и вернем!
//        debug(self::$instances[$subclass]);
    }
}