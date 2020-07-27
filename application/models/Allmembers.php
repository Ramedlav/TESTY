<?php

namespace application\models;

use application\core\Model;

class Allmembers extends Model {

    public function getAll(){
        $result = $this->db->query('SELECT * FROM users');
//        $result = $this->db->query($sql);
        return $result;
}

}