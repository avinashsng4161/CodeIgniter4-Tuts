<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => 'Welcome to CodeIgniter 4',
            'page_heading' => 'CodeIgniter 4 Training',
        ];
        return view('Homeview', $data);
    }
    public function about()
    {
        $data = [
            'page_title' => 'Welcome to CodeIgniter 4 | About',
            'page_heading' => 'About Us',
        ];
        return view('Aboutview', $data);

    }
    public function training()
    {
        return view('trainingview');

    }
    public function onlinetraining()
    {
        return view('onlinetrainingview');

    }
    public function bootcamp()
    {
        return view('bootcampview');

    }
    public function blog()
    {
        return view('blogview');

    }
    
}
