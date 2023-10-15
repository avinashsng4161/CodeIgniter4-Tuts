<?php

namespace app\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class APIBlocker implements  FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // TODO: Implement before() method.
        $throttler = Services::throttler();
        if($throttler->check('testapi', 4, MINUTE) === false){
            return Services::response()->setStatusCode(429)->setBody(json_encode(['message'=>'Too many hits to server. please try after some time']));
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}