<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use app\Libraries\TestLibrary;
class Blog extends Controller
{
    public function index(){
        $data = [
            "page_title" => "Welcome to CodeIgniter 4",
            "page_heading" => "CodeIgniter 4 Views",
            "subjects" => [
                "html",
                "CSS",
                "Bootstrap",
                "Java",
                "PHP"]
        ];
        echo view("Myview", $data);
    }
}