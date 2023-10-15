<?php

namespace app\Controllers;

use CodeIgniter\Controller;

class TestMail extends Controller
{
    public function index(){
      $to = 'avinash.webintern@gmail.com';
      $subject = 'Account Activation';
      $message = 'Hi Ram, <br><br>Thanks your account created successfully. Please click the below link to activate your account<br>' . '<a href="">Activate Now</a><br><br>Thanks<br>Team';

      $email = \config\Services::email();
      $email->setTo($to);
      $email->setSubject($subject);
      $email->setMessage($message);
      $filepath = 'public/assets/images/1.png';
      $email->attach($filepath);
      if($email->send()){
          echo 'Account created successfully';
      }else{
          $data = $email->printDebugger(['headers']);
          print_r($data);
      }
    }
}