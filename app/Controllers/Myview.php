<?php

    namespace App\Controllers;

    use CodeIgniter\Controller;

    class Myview extends Controller{
        public function index(){
            echo view('Header');
            echo view('myview');
            echo view('Footer');
        }
    }