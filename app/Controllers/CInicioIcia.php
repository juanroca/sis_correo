<?php

namespace App\Controllers;

use App\Filters\sesion;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CInicioIcia extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('asideIcia');
        echo view('caratulaIcia');
        echo view('footer');
        
    }
}