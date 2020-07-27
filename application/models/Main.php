<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function firstRegister($firstname, $lastname, $email, $birthdate,  $report_subject , $country , $phone)
    {
        $sql = 'INSERT INTO users (firstname , email , lastname , birthdate ,  report_subject , country , phone  ) VALUES ("'.$firstname.'" , "'.$email.'" , "'.$lastname.'" , "'.$birthdate.'"  , "'.$report_subject.'" , "'.$country.'" , "'.$phone.'")';
        $this->db->query($sql);
    }

    public function countAll()
    {
        $sql ='SELECT COUNT(*) FROM users';
        $count = $this->db->query($sql);
        return $count;
    }
    public function getCountry(){
        $sql ='SELECT * FROM country';
        $country = $this->db->query($sql);
        return $country;
    }

    public function secondRegister($email,$company,$position,$about_me,$img)
    {

        $sql = 'UPDATE users SET company = "'.$company.'" , position = "'.$position.'" , about_me = "'.$about_me.'" , img = "'.$img.'" WHERE email = "'.$email.'"';
        $this->db->query($sql);
    }
}