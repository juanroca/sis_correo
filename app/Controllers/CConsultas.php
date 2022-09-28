<?php

namespace App\Controllers;

use App\Models\MPerdes;

class CConsultas extends BaseController
{

    public function index()
    {
        $PerdesModel = new MPerdes();       
             
        echo view('header');
        echo view('asideConsultas');
        echo view('/consultas/VConsultas');
        echo view('footer');
    
    }

//BUSCAR CONSULTAS
function BuscarConsultas()
{
    $PerdesModel = new MPerdes();
    $dato_bus = trim($_POST['txt_bus']); //dato que se captura desde teclado
    $data = array(        
        "lista_consultas" => $PerdesModel->buscar_consultas($dato_bus)    
    );
    echo view('consultas/ListaBuscar', $data);

}

    //VER DETALLE DEL PERDES
    public function DetConsultas()
    {
        $PerdesModel = new MPerdes();
        //recuperar la parte del id de la URL
        $id = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CPerdes/(1) DetallePerdes/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $buscados = array(
            'buscados' => $PerdesModel->info_detalle($id),
            'consulta'=> session('usuario'),
            'fecha_c'=>$fechaActual,
            'hora_c'=>$horaActual,
        );
        echo view('consultas/DetalleConsultas', $buscados);
        $PerdesModel->update($id, $buscados);
    }   



}