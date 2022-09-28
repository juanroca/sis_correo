<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class sesion implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session('usuario')==null){       //si no hay ninguna sesion activa, redireccionar a la base url
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}