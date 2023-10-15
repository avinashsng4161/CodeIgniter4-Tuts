<?php

namespace app\Controllers;

use CodeIgniter\Controller;

class Sample extends Controller
{
    public function create($name, $two){
        echo "This is create method: " . $name. " , " . $two;
    }
}