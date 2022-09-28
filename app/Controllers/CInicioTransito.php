<?php

namespace App\Controllers;

use App\Filters\sesion;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CInicioTransito extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('asideTransito');
        echo view('caratulaTransito');
        echo view('footer');
        
    }
}