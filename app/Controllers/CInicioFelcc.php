<?php

namespace App\Controllers;

use App\Filters\sesion;
//use App\Models\MCasos;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CInicioFelcc extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('asideFelcc');
        echo view('caratulaFelcc');
        
    }
}