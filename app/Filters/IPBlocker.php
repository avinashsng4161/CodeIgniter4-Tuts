<?php

namespace app\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IPBlocker implements  FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // TODO: Implement before() method.
        $throttler = Services::throttler();
        if($throttler->check($request->getIPAddress(), 4, MINUTE) === false){
            return Services::response()->setStatusCode(429)->setBody('Too many Hits');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}