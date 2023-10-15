<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Define routes using an associative array
$myroutes = [
    '/' => 'Home::index',
    'about' => 'Home::about',
    'training' => 'Home::training',
    'onlinetraining' => 'Home::onlinetraining',
    'bootcamp' => 'Home::bootcamp',
    'blog' => 'Home::blog',
    'contact' => 'Contact::index',
    'register' => 'Register::index',
    'register/activate' => 'Register::activate',
    'register/activate/(:any)' => 'Register::activate/$1',
    'login' => 'Login::index',
    'login/forgot_password' => 'Login::forgot_password',
    'login/reset_password' => 'Login::reset_password',
    'login/reset_password/(:any)' => 'Login::reset_password/$1',
    'dashboard'=> 'Dashboard::index',
    'dashboard/logout'=> 'Dashboard::logout',
    'dashboard/logout/(:any)'=> 'Dashboard::logout/$1',
    'dashboard/login_activity'=> 'Dashboard::login_activity',
    'dashboard/avatar'=> 'Dashboard::avatar',
    'dashboard/change_password'=> 'Dashboard::change_password',
    'dashboard/edit'=> 'Dashboard::edit',
    'fileupload' => 'FileUpload::index',
    'mfileupload' => 'MFileUpload::index',

];

// Map the routes
$routes->map($myroutes);

$routes->group('',['filter'=>'isLoggedIn'],function($routes){
    $routes->get('/','Dashboard::index');
    $routes->get('index','Dashboard::index');
    $routes->get('dashboard/edit','Dashboard::edit');
    $routes->get('dashboard/avatar','Dashboard::avatar');
    $routes->get('dashboard/login_activity','Dashboard::login_activity');
    $routes->get('dashboard/change_password','Dashboard::change_password');
    $routes->get('dashboard/edit','Dashboard::edit');
});

// You can also define a 404 override if needed
// $routes->set404Override(function (){
//     echo view('errors/custom_error');
// });
