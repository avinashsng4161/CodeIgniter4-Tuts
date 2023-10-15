<?php

namespace app\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getData(){
        $subjects = [
            ['subject' =>'HTML', 'abbr' => 'Hyper Text Markup Language'],
            ['subject' =>'CSS', 'abbr' => 'Cascading Style Sheet'],
            ['subject' =>'JSON', 'abbr' => 'JavaScript Object Notation'],
            ['subject' =>'AJAX', 'abbr' => 'Asynchronous JavaScript & XML'],
            ['subject' =>'PHP', 'abbr' => 'Hypertext Preprocessor'],
        ];
        return $subjects;
    }
}