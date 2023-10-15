<?php
namespace App\Filters;

use \CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class DateFilter implements FilterInterface {
   public function before(RequestInterface $request, $arguments = null)
   {
       // TODO: Implement before() method.
       echo date('Y-m-d h:i:s a');
   }
   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
       // TODO: Implement after() method.
       echo "Bye";
   }
}