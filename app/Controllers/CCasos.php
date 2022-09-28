<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MCasos;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CCasos extends BaseController
{

    public function index()
    {
        $CasosModel = new MCasos();
        $casos = array('lista_casos' => $CasosModel->info_casos()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$casos=array('lista_casos'=>$CasosModel->paginate(20));
        echo view('header');
        echo view('asideEpi');
        echo view('/casos/VCasos', $casos);
        echo view('footer');
    }

    //VER DETALLE DEL casos
    public function DetCasos()
    {
        $CasosModel = new MCasos();
        //recuperar la parte del id de la URL
        $id_casos = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Ccasos/(1) Detallecasos/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        echo view('casos/DetalleCasos', $casos);
    }

    //IMPRIMIR REPORTE
    function ReporteCasos()
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
    function FRegCasos()
    {
        echo view('header');
        echo view('asideEpi');
        echo view('/casos/FRegistroCasos');
        echo view('footer');
    }

    function RegistroCasos()
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $diassemana = array("DOMINGO", "LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO");
        $CasosModel = new MCasos();

        $unidad = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario       
        
        $clasifiEch = strtoupper(trim($_POST['clasif']));

        $fechaEch = strtoupper(trim($_POST['fechaH']));
        $horaEch = strtoupper(trim($_POST['horaH']));
        $lugarEch = strtoupper(trim($_POST['lugarH']));
        $barrioEch = strtoupper(trim($_POST['barrioH']));
        
        $latitud = strtoupper(trim($_POST['lat']));
        $longitud = strtoupper(trim($_POST['long']));
        $naturalezaEch = strtoupper(trim($_POST['natH']));

        $claveUno = strtoupper(trim($_POST['clave1']));
        $claveDos = strtoupper(trim($_POST['clave2']));
        
        
        $denunciante = strtoupper(trim($_POST['nomD']));
        $telefonoD = strtoupper(trim($_POST['telfD']));

        $moduloP = strtoupper(trim($_POST['mod']));
        
        $patrulleroP = strtoupper(trim($_POST['patrulla']));
        $jefeP = strtoupper(trim($_POST['jp']));
        
        $novedad = strtoupper(trim($_POST['nov']));
        $unidadFin = strtoupper(trim($_POST['unifin']));
        $nombreFin = strtoupper(trim($_POST['nomfin']));
        $observaciones = strtoupper(trim($_POST['obs']));

        $fotoC1 = $_FILES['foto1'];
        //$fotoC2 = $_FILES['foto2'];

        $imagen1 = $fotoC1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen
        //$imagen2 = $fotoC2['name'];

        //Subir el nombre de la imagen al sistema        
        move_uploaded_file($fotoC1["tmp_name"], "./assest/img/casos/$imagen1");
        //move_uploaded_file($fotoC2["tmp_name"], "./assest/img/casos/$imagen2");

        if (empty($imagen1)) {
            $imagen1 = 'vacio.png';
        };
        
        //subimos los datos a la Base de Datos
        $data = array(
            'uni' => $unidad,                 //entre '' va el nombre del campo de la Base de Datos
            'tipo'=> 'CASO',
            'clase'=> 'INTERVENCION',
            'estado'=>'ACTIVO',
            'clasific'=>$clasifiEch,
            'fecha_hecho'=>$fechaEch,
            'hora_hecho'=>$horaEch,
            'dia'=>$diassemana[date('w')],
            'nat_hecho'=>$naturalezaEch,
            'clave_pri'=>$claveUno,
            'clave_sec'=>$claveDos,            
            'lug_hecho'=>$lugarEch,
            'barrio'=>$barrioEch,            
            'latitud'=>$latitud,
            'longitud'=>$longitud,
            'denun'=>$denunciante,
            'telf_d'=>$telefonoD,
            'modulo'=>$moduloP,
            'patru'=>$patrulleroP,            
            'jp'=>$jefeP,
            'novedad'=>$novedad,
            'uni_fin'=>$unidadFin,
            'nom_fin'=>$nombreFin,
            'obs'=>$observaciones,

            'foto1'=>$imagen1,
            //'foto2'=>$imagen2,

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
    function FEliCasos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        //echo view('casos/Detallecasos',$casos);
        echo view('casos/FEliminarCasos', $casos);
    }

    function EliminarCasos()
    /*{
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $CasosModel->delete($id_casos);
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADA</center>";
    }*/
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
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
    function FEdiCasos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $casos = array(
            'casos' => $CasosModel->info_detalle($id_casos)
        );
        echo view('casos/FEdicionCasos', $casos);
    }

    function EdicionCasos()
    {
        $CasosModel = new MCasos();
        $id_casos = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        

        $unidad = strtoupper(trim($_POST['unidadE']));        //entre[] va el name del input del formulario       
        
        $clasiEch = strtoupper(trim($_POST['clasifHE']));
        

        $fechaEch = strtoupper(trim($_POST['fechaHE']));
        $horaEch = strtoupper(trim($_POST['horaHE']));
        $lugarEch = strtoupper(trim($_POST['lugarHE']));
        $barrioEch = strtoupper(trim($_POST['barrioHE']));
        
        $latitud = strtoupper(trim($_POST['latE']));
        $longitud = strtoupper(trim($_POST['longE']));
        $naturalezaEch = strtoupper(trim($_POST['natHE']));

        $claveUno = strtoupper(trim($_POST['clave1E']));
        $claveDos = strtoupper(trim($_POST['clave2E']));
        
        
        $denunciante = strtoupper(trim($_POST['nomDE']));
        $telefonoD = strtoupper(trim($_POST['telfDE']));

        $moduloP = strtoupper(trim($_POST['modE']));
        
        $patrulleroP = strtoupper(trim($_POST['patrullaE']));
        $jefeP = strtoupper(trim($_POST['jpE']));
        
        $novedad = strtoupper(trim($_POST['novE']));
        $unidadFin = strtoupper(trim($_POST['unifinE']));
        $nombreFin = strtoupper(trim($_POST['nomfinE']));
        $observaciones = strtoupper(trim($_POST['obsE']));

        //subimos los datos a la Base de Datos
        $data = array(
            'uni' => $unidad,                 //entre '' va el nombre del campo de la Base de Datos
            'fecha_hecho'=>$fechaEch,
            'hora_hecho'=>$horaEch,
            
            'clasific'=>$clasiEch,

            'nat_hecho'=>$naturalezaEch,
            'clave_pri'=>$claveUno,
            'clave_sec'=>$claveDos,
            
            'lug_hecho'=>$lugarEch,
            'barrio'=>$barrioEch,
            
            'latitud'=>$latitud,
            'longitud'=>$longitud,

            'denun'=>$denunciante,
            'telf_d'=>$telefonoD,

            'modulo'=>$moduloP,
            'patru'=>$patrulleroP,
            
            'jp'=>$jefeP,

            'novedad'=>$novedad,
            'uni_fin'=>$unidadFin,
            'nom_fin'=>$nombreFin,
            'obs'=>$observaciones,

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
    function BuscarCasos()
    {
        $CasosModel = new MCasos();
        $dato_bus = trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data = array(
            "lista_casos" => $CasosModel->buscar_casos($dato_bus)
        );
        echo view('casos/ListaBuscarCasos', $data);
    }

    //IMPRIMIR REPORTE EXCEL
    function ReporteCTabla()
    {
        $CasosModel = new MCasos();        
        $casos = array('lista_casos' => $CasosModel->info_tcasos());      
        echo view('/casos/ReporteTablaC', $casos);
        
    }
}
