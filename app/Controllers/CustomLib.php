<?php

namespace app\Controllers;

use CodeIgniter\Controller;
use app\Libraries\TestLibrary;

class CustomLib extends Controller
{
    public $t1;
    public function __construct(){
        $this->t1 = new TestLibrary();
    }
    public function index(){
        return $this->t1->getData();
    }
}