<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MCasos;
use App\Models\MConflicto;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CExcel extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('asideEpi');
        echo view('/excel/VExcel');
        echo view('footer');
    }

    //IMPRIMIR REPORTE EXCEL CASOS
    function ReporteExcelCasos()
    {
        $CasosModel = new MCasos();  
        //$dato_bus = htmlspecialchars($_POST['unidad']);
        $dato_bus = trim($_POST['unidad']);
        $casos = array(
            "lista_casos" => $CasosModel->excel_casos($dato_bus)
        );
        echo view('excel/ReporteTablaC', $casos);
    }

    //IMPRIMIR REPORTE EXCEL ACTIVIDADES
    function ReporteExcelActividades()
    {
        $CasosModel = new MCasos();  
        //$dato_bus = htmlspecialchars($_POST['unidad']);
        $dato_bus = trim($_POST['unidad']);
        $casos = array(
            "lista_casos" => $CasosModel->excel_actividades($dato_bus)
        );
        echo view('excel/ReporteTablaM', $casos);
    }

    public function VistaIcia()
    {        
        echo view('header');
        echo view('asideIcia');
        echo view('/excel/VExcelIcia');
        echo view('footer');
    }
    //IMPRIMIR REPORTE EXCEL    CONFLICTO
    public function ReporteExcelConflictos()
    {
        $ConflictoModel = new MConflicto();  
        $dato_bus = trim($_POST['dpto']);
        $conflicto = array(
            "lista_conflicto" => $ConflictoModel->excel_conflictos($dato_bus)
        );
        echo view('excel/ReporteTablaConflictos', $conflicto);
    }
}
