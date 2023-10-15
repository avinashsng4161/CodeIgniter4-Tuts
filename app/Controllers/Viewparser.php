<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class Viewparser extends Controller {
    public $parser;
    public function __construct(){
        $this->parser = Services::parser();
    }
    public function index() {
        // Load the parser
        $parser = Services::parser();

        $data = [
            'page_title' => 'My Blog Title',
            'page_heading' => 'My Blog Heading',
            'subjects_list' => [
                ['subject' => 'HTML', 'abbr' => 'Hyper Text Markup Language'],
                ['subject' => 'CSS', 'abbr' => 'Cascading Style Sheets'],
                ['subject' => 'JSON', 'abbr' => 'JavaScript Object Notation'],
                ['subject' => 'AJAX', 'abbr' => 'Asynchronous JavaScript and XML'],
                ['subject' => 'PHP', 'abbr' => 'Hypertext Preprocessor'],
            ],
            "status" => false,
        ];

        // Set data and render the view
        return $this->parser->setData($data)->render('Viewparser');
    }

    public function viewFilters(){
        $parser = Services::parser();
        $data = [
            'page_title' => 'My Blog Title',
            'page_heading' => 'My Blog Heading Hello How are you',
            'date' => '25-05-2020',
            'price' => '500',
            'price1' => '10.53',
            'mobile' => '8595196640',
        ];
        return $this->parser->setData($data)->render('filterview');
    }
}