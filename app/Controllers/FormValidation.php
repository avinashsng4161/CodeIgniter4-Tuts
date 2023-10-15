<?php

namespace app\Controllers;

use CodeIgniter\Controller;

class FormValidation extends Controller
{
    public function __construct(){
        helper('form');
    }
    public function index(){
        $data = [];
        $data['validation'] = null;
//        $rules =[
//          'username' => 'required',
//          'email' => 'required|valid_email',
//          'mobile' => 'required|numeric|exact_length[10]',
//        ];
        $rules =[
          'username' => [
              'rules' =>'required',
              'errors' =>[
                  'required' => 'Username is required',
              ],
            ],
              'email' => [
              'rules' =>'required|valid_email',
              'errors' =>[
                  'required' => 'Email is required',
                  'valid_email'=> "Enter valid email only",
              ],
          ],
              'mobile' => [
                  'rules' =>'required|exact_length[10]|numeric',
                  'errors' =>[
                      'required' => 'Mobile is required',
                      'numeric'=> 'Mobile {value} should be numbers',
                      'exact_length' => 'Mobile {value} contains exactly {param} digits',
                  ],
              ],
        ];
        if($this->request->getMethod() == 'post'){
            if($this->validate($rules)){
                echo "Ready to Save";
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('FormValidation', $data);
    }
}