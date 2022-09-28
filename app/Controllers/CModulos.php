<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MCasos;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CModulos extends BaseController
{

    public function index()
    {
        $CasosModel = new MCasos();
        $casos = array('lista_casos' => $CasosModel->info_modulos()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$casos=array('lista_casos'=>$CasosModel->paginate(20));
        echo view('header');
        echo view('asideEpi');
        echo view('/modulos/VModulos', $casos);
        echo view('footer');
    }

    //VER DETALLE DEL casos
    public function DetModulos()
    {
        $CasosModel = new MCasos();
        //recuperar la parte del id de la URL
        $id_casos = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Ccasos/(1) Detallecasos/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        echo view('modulos/DetalleModulos', $casos);
    }

    //IMPRIMIR REPORTE
    function ReporteModulos()
    {
        $CasosModel = new MCasos();
        //recuperar la parte del id de la URL
        $id_casos = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Ccasos/(1) Detallecasos/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        //echo view('casos/Reportes2',$casos);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('casos/ReporteC.php', $casos));
        $dompdf->setPaper('legal', 'portrait');   //para orizonatal es 'landscape'
        $dompdf->render();
        $dompdf->stream('reporte_' . $id_casos . '.pdf', array("Attachment" => 1));
    }

    //NUEVO casos
    function FRegModulos()
    {
        echo view('header');
        echo view('asideEpi');
        echo view('/modulos/FRegistroModulos');
        echo view('footer');
    }
    
    function RegistroModulos()
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $diassemana = array("DOMINGO", "LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO");
        $CasosModel = new MCasos();

        $unidad = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario       
        $modulo = strtoupper(trim($_POST['mod']));
        $patru = strtoupper(trim($_POST['patrulla']));
        $fechaEch = strtoupper(trim($_POST['fechaR']));
        $horaEch = strtoupper(trim($_POST['horaR']));

        $actividad = strtoupper(trim($_POST['activ']));
        
        $clasiEch = strtoupper(trim($_POST['clasifH']));
        $lugar = strtoupper(trim($_POST['lugar']));
        $barrioEch = strtoupper(trim($_POST['barrioH']));
                

        $novedad = strtoupper(trim($_POST['noved']));
        $observacion = strtoupper(trim($_POST['obser']));
        
        //subimos los datos a la Base de Datos
        $data = array(
            'tipo'=>'ACTIVIDAD',
            'clase'=> 'PREVENTIVO',
            'estado'=>'ACTIVO',
            'uni' => $unidad,                 //entre '' va el nombre del campo de la Base de Datos
            'dia'=>$diassemana[date('w')],
            'modulo'=>$modulo,
            'patru' =>$patru,
            'fecha_hecho'=>$fechaEch,
            'hora_hecho'=>$horaEch,
            'dia'=>$diassemana[date('w')],
            'nat_hecho'=>$actividad,
            'lug_hecho'=>$lugar,
            'barrio'=>$barrioEch,
                        
            'clasific'=>$clasiEch,

            'novedad'=>$novedad,
            'obs'=>$observacion,

            'autor'=>session('usuario'),
            'fecha_reg'=>$fechaActual,
            'hora_reg'=>$horaActual,
            //'editor'=>session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,

        );
        $CasosModel->insert($data);
    }
    //ELIMINAR casos
    function FEliModulos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        //echo view('casos/Detallecasos',$casos);
        echo view('modulos/FEliminarModulos', $casos);
    }

    function EliminarModulos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        /*$CasosModel->delete($id_casos);
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO</center>";*/
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        
        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'delete_user'=> session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $CasosModel->update($id_casos, $data); //update actualiza los datos del id_infractor
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    //EDICIÓN casos
    function FEdiModulos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        echo view('modulos/FEdicionModulos', $casos);
    }

    function EdicionModulos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');        

        $unidad = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario       
        $modulo = strtoupper(trim($_POST['mod']));
        $patru = strtoupper(trim($_POST['patru']));
        $fechaEch = strtoupper(trim($_POST['fechaR']));
        $horaEch = strtoupper(trim($_POST['horaR']));

        $actividad = strtoupper(trim($_POST['activ']));
        
        $clasiE = strtoupper(trim($_POST['clasifH']));
        $lugar = strtoupper(trim($_POST['lugar']));
        $barrioE = strtoupper(trim($_POST['barrioH']));
              

        $novedad = strtoupper(trim($_POST['noved']));
        $observacion = strtoupper(trim($_POST['obser']));

        //subimos los datos a la Base de Datos
        $data = array(            
            'uni' => $unidad,                 //entre '' va el nombre del campo de la Base de Datos
            'modulo'=>$modulo,
            'patru'=>$patru,
            'fecha_hecho'=>$fechaEch,
            'hora_hecho'=>$horaEch,

            'nat_hecho'=>$actividad,            
            'clasific'=>$clasiE,
            'lug_hecho'=>$lugar,
            'barrio'=>$barrioE, 
            'novedad'=>$novedad,
            'obs'=>$observacion,

            //'autor'=>session('usuario'),
            //'fecha_reg'=>$fechaActual,
            //'hora_reg'=>$horaActual,
            'editor'=>session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $CasosModel->update($id_casos, $data); //update actualiza los datos del id_casos
    }

    //Función para Buscar casos
    function BuscarModulos()
    {
        $CasosModel = new MCasos();
        $dato_bus = trim($_POST['txt_busM']); //dato que se captura desde teclado
        $data = array(
            "lista_modulos" => $CasosModel->buscar_modulos($dato_bus)
        );
        echo view('modulos/ListaBuscarModulos', $data);
    }

    //IMPRIMIR REPORTE EXCEL
    function ReporteMTabla()
    {
        $CasosModel = new MCasos();        
        $casos = array('lista_casos' => $CasosModel->info_tmodulos());      
        echo view('/modulos/ReporteTablaM', $casos);
        
    }
}
