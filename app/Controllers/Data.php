<?php

namespace app\Controllers;

use CodeIgniter\Controller;
use app\Models\UserModel;

class Data extends Controller
{
    public function index(){
        $userModel = new UserModel();
        $data ['subjects'] = $userModel->getData();
        return view('Dataview', $data);
    }

    public function userList(){
        return view('userlist_view');
    }
}
