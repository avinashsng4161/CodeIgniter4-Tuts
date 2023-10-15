<?php

namespace app\Controllers;

use CodeIgniter\Controller;

class Users extends Controller
{
    public function index(){
        $db = \Config\Database::connect();
        $query = $db->query('select username,email,mobile from users');
        $result = $query->getResult();
        echo"<pre>";
        print_r($result);
        echo"</pre>";
    }
}