<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
class Login extends Controller {
    public $loginModel;
    public $session;
    public function __construct() {
        helper('form','array');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [];
        //site login
        if ($this->request->getMethod() == 'post') {
            $throttler = \Config\Services::throttler();
            if($throttler->check($this->request->getIPAddress(), 4, MINUTE)) {
            }
            $rules = [
                'email' => 'required|valid_email',
                'pass' => 'required|min_length[6]|max_length[16]',
            ];
            if ($this->validate($rules)) {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('pass');

                    $userdata = $this->loginModel->verifyEmail($email);
                    if ($userdata) {
                        if (password_verify($password, $userdata['password'])) {
                            if ($userdata['status'] == 'active') {
                                $loginInfo = [
                                    'uniid' => $userdata['uniid'],
                                    'agent' => $this->getUserAgentInfo(),
                                    'ip' => $this->request->getIPAddress(),
                                    'login_time' => date('Y-m-d h:i:s'),
                                ];
                                $la_id = $this->loginModel->saveLoginInfo($loginInfo);
                                if ($la_id) {
                                    $this->session->set('logged_info', $la_id);
                                }
                                $this->session->set('logged_user', $userdata['uniid']);
                                return redirect()->to(base_url() . '/dashboard');
                            } else {
//                                $data['error'] = 'Please activate your account. Contact Admin';
                                 $this->session->setTempdata('error','Please activate your account. Contact Admin',3);
                                return redirect()->to(current_url());
                            }
                        } else {
//                            $data['error'] = 'Sorry! Wrong password entered for that email';
                            $this->session->setTempdata('error','Sorry! Wrong password entered for that email',3);
                            return redirect()->to(current_url());
                        }
                    } else {
//                        $data['error'] = 'Sorry! Email does not exists';
                        $this->session->setTempdata('error','Sorry! Email does not exists',3);
                        return redirect()->to(current_url());
                    }
                }

            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view("login_view",$data);
    }

    public function getUserAgentInfo() {
        $agent = $this->request->getUserAgent();
        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser();
        } elseif ($agent->isRobot()) {
            $currentAgent = $this->agent->robot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    }

    public function forgot_password(){
        $data = [];
        if($this->request->getMethod()=='post'){
            $rules = [
                'email'=>[
                    'label' => 'Email',
                    'rules'=> 'required|valid_email',
                    'errors' => [
                        'required' =>'{field} field required',
                        'valid_email' => 'Valid {field} required'
                    ]
                ],
            ];
            if($this->validate($rules)){
                $email = $this->request->getVar('email',FILTER_SANITIZE_EMAIL);
                $userdata = $this->loginModel->verifyEmail($email);
                if(!empty($userdata)){
                    if($this->loginModel->updatedAt($userdata['uniid'])){
                        $to = $email;
                        $subject = 'Reset Password Link';
                        $token = $userdata['uniid'];
                        $message = 'Hi '.$userdata['username'].'<br><br>'
                            . 'Your reset password request has been received. Please click'
                            . 'the below link to reset your password.<br><br>'
                            . '<a href="'. base_url().'/login/reset_password/'.$token.'">Click here to Reset Password</a><br><br>'
                            . 'Thanks<br>GoPHP';
                        $email = \Config\Services::email();
                        $email->setTo($to);
                        $email->setFrom('info@gophp.in','GoPHP');
                        $email->setSubject($subject);
                        $email->setMessage($message);
                        if($email->send())
                        {
                            session()->setTempdata('success','Reset password link sent to your registred email. Please verify with in 15mins',3);
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    }
                    else
                    {
                        $this->session->setTempdata('error','Sorry! Unable yo update. try again',3);
                        return redirect()->to(current_url());
                    }
                }
                else{
                    $this->session->setTempdata('error','Email does not exists',3);
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation']=$this->validator;
            }
        }
        return view("forgot_password_view",$data);
    }

    public function reset_password($token=null){
        $data = [];
        if(!empty($token)){
            $userdata = $this->loginModel->verifyToken($token);
            if(!empty($userdata)){
                if($this->checkExpiryDate($userdata['updated_at'])){
                    if($this->request->getMethod()=='post'){
                        $rules = [
                            'pwd' => [
                                'label' =>'Password',
                                'rules' => 'required|min_length[6]|max_length[16]',
                            ],
                            'cpwd' => [
                                'label' => 'Confirm Password',
                                'rules' => 'required|matches[pwd]'
                            ],
                        ];
                        if($this->validate($rules)){
                            $pwd = password_hash($this->request->getVar('pwd'),PASSWORD_DEFAULT);
                            if($this->loginModel->updatePassword($token,$pwd)){
                                session()->setTempdata('success','Password updated successfully, Login now',3);
                                return redirect()->to(base_url().'/login');
                            }
                            else{
                                session()->setTempdata('error','Sorry! Unablr to update Password. try again',3);
                                return redirect()->to(current_url());
                            }
                        }
                        else{
                            $data['validation'] = $this->validator;
                        }
                    }
                }
                else
                {
                    $data['error'] = 'Reset password link was expired.';
                }
            }
            else
            {
                $data['error'] = 'Unable to find user account';
            }
        }
        else{
            $data['error'] = 'Sorry! Unauthourized access';
        }
        return view('reset_passowrd_view',$data);

    }
    public function checkExpiryDate($time){
        $timeDiff = strtotime(date("Y-m-d h:i:s"))- strtotime($time);
        if($timeDiff < 900){
            return true;
        }
        else
        {
            return false;
        }
    }
}
