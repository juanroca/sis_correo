<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MDenuncias;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CDenuncias extends BaseController
{

    public function index()
    {
        $DenunciasModel = new MDenuncias();
        $denuncias = array('lista_denuncias' => $DenunciasModel->info_denuncias()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$denuncias=array('lista_denuncias'=>$DenunciasModel->paginate(20));
        echo view('header');
        echo view('asideFelcc');
        echo view('/denuncias/VDenuncias', $denuncias);
        echo view('footer');
    }

    //VER DETALLE DEL Denuncias
    public function DetDenuncias()
    {
        $DenunciasModel = new MDenuncias();
        //recuperar la parte del id de la URL
        $id_denuncias = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CDenuncias/(1) DetalleDenuncias/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $denuncias = array(
            'denuncias' => $DenunciasModel->detalle_denuncia($id_denuncias)
        );
        echo view('denuncias/DetalleDenuncias', $denuncias);
    }

    //IMPRIMIR REPORTE
    function ReporteDenuncias()
    {
        $DenunciasModel = new MDenuncias();
        //recuperar la parte del id de la URL
        $id_denuncias = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CDenuncias/(1) DetalleDenuncias/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $denuncias = array(
            'denuncias' => $DenunciasModel->info_denuncias($id_denuncias)
        );
        //echo view('denuncias/Reportes2',$denuncias);
        
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('denuncias/Reportes2.php', $denuncias));
        $dompdf->setPaper('legal', 'portrait');   //para orizonatal es 'landscape'
        $dompdf->render();
        $dompdf->stream('dscz_'.$id_denuncias.'.pdf', array("Attachment" => 0));
    }

    //NUEVO Denuncias
    function FormRegDenuncias()
    {
        echo view('denuncias/FRegistroDenuncias');
    }

    function RegistroDenuncias()
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $DenunciasModel = new MDenuncias();

        $unidadD = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario
        $divisionD = strtoupper(trim($_POST['division']));
        //$fechaD = strtoupper(trim($_POST['fechaR']));

        $fechaEch = strtoupper(trim($_POST['fechaE']));
        $horaEch = strtoupper(trim($_POST['horaE']));
        $lugarEch = strtoupper(trim($_POST['lugarE']));
        $naturalezaEch = strtoupper(trim($_POST['natE']));

        $nombreD = strtoupper(trim($_POST['nomD']));
        $paternoD = strtoupper(trim($_POST['patD']));
        $maternoD = strtoupper(trim($_POST['matD']));
        $ciD = trim($_POST['ciD']);
        $fechaNacD = trim($_POST['nacD']);
        $sexD = strtoupper(trim($_POST['sexoD']));
        $edD = strtoupper(trim($_POST['edadD']));
        $estCivilD = strtoupper(trim($_POST['ecivilD']));
        $nacionalidadD = strtoupper(trim($_POST['nalD']));
        $profesionD = strtoupper(trim($_POST['profD']));
        $domicilioD = strtoupper(trim($_POST['dmD']));
        $telefonoD = strtoupper(trim($_POST['telfD']));

        $tipoV = strtoupper(trim($_POST['tipV']));
        $nombreV = strtoupper(trim($_POST['nomV']));
        $paternoV = strtoupper(trim($_POST['patV']));
        $maternoV = strtoupper(trim($_POST['matV']));
        $ciV = trim($_POST['ciV']);
        $nacionalidadV = strtoupper(trim($_POST['nalV']));
        $domicilioV = strtoupper(trim($_POST['dmV']));
        $telefonoV = strtoupper(trim($_POST['telfV']));

        $tipoS = strtoupper(trim($_POST['tipS']));
        $nombreS = strtoupper(trim($_POST['nomS']));
        $paternoS = strtoupper(trim($_POST['patS']));
        $maternoS = strtoupper(trim($_POST['matS']));
        $ciS = trim($_POST['ciS']);
        $nacionalidadS = strtoupper(trim($_POST['nalS']));
        $domicilioS = strtoupper(trim($_POST['dmS']));
        $telefonoS = strtoupper(trim($_POST['telfS']));

        $detalleE = strtoupper(trim($_POST['detE']));
        $investigador = strtoupper(trim($_POST['invest']));
        $fiscal = strtoupper(trim($_POST['fiscal']));

        //subimos los datos a la Base de Datos
        $data = array(
            'estado'=>'ACTIVO',
            'unidad' => $unidadD,                 //entre '' va el nombre del campo de la Base de Datos
            'division' => $divisionD,
            'fecha_r' => $fechaActual,
            'hora_r' => $horaActual,

            'fecha_e' => $fechaEch,
            'hora_e' => $horaEch,
            'lugar_e' => $lugarEch,
            'naturaleza_e' => $naturalezaEch,

            'nombres_d' => $nombreD,
            'paterno_d' => $paternoD,
            'materno_d' => $maternoD,
            'nomcompleto_d' => $nombreD . ' ' . $paternoD . ' ' . $maternoD,
            'ci_d' => $ciD,
            'fechanac_d' => $fechaNacD,
            'sexo_d' => $sexD,
            'edad_d' => $edD,
            'ecivil_d' => $estCivilD,
            'nacionalidad_d' => $nacionalidadD,
            'profesion_d' => $profesionD,
            'domicilio_d' => $domicilioD,
            'telf_d' => $telefonoD,

            'tipo_v' => $tipoV,
            'nombres_v' => $nombreV,
            'paterno_v' => $paternoV,
            'materno_v' => $maternoV,
            'nomcompleto_v' => $nombreV . ' ' . $paternoV . ' ' . $maternoV,
            'ci_v' => $ciV,
            'nacionalidad_v' => $nacionalidadV,
            'domicilio_v' => $domicilioV,
            'telf_v' => $telefonoV,

            'tipo_s' => $tipoS,
            'nombres_s' => $nombreS,
            'paterno_s' => $paternoS,
            'materno_s' => $maternoS,
            'nomcompleto_s' => $nombreS . ' ' . $paternoS . ' ' . $maternoS,
            'ci_s' => $ciS,
            'nacionalidad_s' => $nacionalidadS,
            'domicilio_s' => $domicilioS,
            'telf_s' => $telefonoS,

            'detalle' => $detalleE,
            'asignado' => $investigador,
            'fiscal' => $fiscal,
            'autor' => session('usuario'),
            //'editor'=>$
            'fecha_edi' => $fechaActual,
            'hora_edi' => $horaActual,

            
        );
        $DenunciasModel->insert($data);
    }
    //ELIMINAR Denuncias
    function FEliminarDenuncias()
    {
        $DenunciasModel = new MDenuncias();
        $id_denuncias = $this->request->uri->getSegment(3);
        $denuncias = array(
            'denuncias' => $DenunciasModel->info_denuncias($id_denuncias)
        );
        //echo view('Denuncias/DetalleDenuncias',$Denuncias);
        echo view('denuncias/FEliminarDenuncias', $denuncias);
    }

    function EliminarDenuncias()
    {
        $DenunciasModel = new MDenuncias();
        $id_denuncias = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        
        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'delete_user'=> session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $DenunciasModel->update($id_denuncias, $data); //update actualiza los datos del id_infractor
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    //EDICIÓN Denuncias
    function FEdicionDenuncias(){
        $DenunciasModel = new MDenuncias();
        $id_denuncias = $this->request->uri->getSegment(3);
        $denuncias = array(
            'denuncias' => $DenunciasModel->info_denuncias($id_denuncias)
        );
        echo view('denuncias/FEdiDenuncias', $denuncias);
    }

    function EdicionDenuncias(){
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $DenunciasModel = new MDenuncias();
        $id_denuncias = $this->request->uri->getSegment(3);

        $unidadD = strtoupper(trim($_POST['unidadED']));        //entre[] va el name del input del formulario
        $divisionD = strtoupper(trim($_POST['divisionED']));

        $fechaEch = trim($_POST['fechaED']);
        $horaEch = trim($_POST['horaED']);
        $lugarEch = strtoupper(trim($_POST['lugarED']));
        $naturalezaEch = strtoupper(trim($_POST['natED']));

        $nombreD = strtoupper(trim($_POST['nomDE']));
        $paternoD = strtoupper(trim($_POST['patDE']));
        $maternoD = strtoupper(trim($_POST['matDE']));
        $ciD = trim($_POST['ciDE']);
        $fechaNacD = trim($_POST['nacDE']);
        $sexD = strtoupper(trim($_POST['sexoDE']));
        $edD = strtoupper(trim($_POST['edadDE']));
        $estCivilD = strtoupper(trim($_POST['ecivilDE']));
        $nacionalidadD = strtoupper(trim($_POST['nalDE']));
        $profesionD = strtoupper(trim($_POST['profDE']));
        $domicilioD = strtoupper(trim($_POST['dmDE']));
        $telefonoD = strtoupper(trim($_POST['telfDE']));

        $tipoV = strtoupper(trim($_POST['tipVE']));
        $nombreV = strtoupper(trim($_POST['nomVE']));
        $paternoV = strtoupper(trim($_POST['patVE']));
        $maternoV = strtoupper(trim($_POST['matVE']));
        $ciV = trim($_POST['ciVE']);
        $nacionalidadV = strtoupper(trim($_POST['nalVE']));
        $domicilioV = strtoupper(trim($_POST['dmVE']));
        $telefonoV = strtoupper(trim($_POST['telfVE']));

        $tipoS = strtoupper(trim($_POST['tipSE']));
        $nombreS = strtoupper(trim($_POST['nomSE']));
        $paternoS = strtoupper(trim($_POST['patSE']));
        $maternoS = strtoupper(trim($_POST['matSE']));
        $ciS = trim($_POST['ciSE']);
        $nacionalidadS = strtoupper(trim($_POST['nalSE']));
        $domicilioS = strtoupper(trim($_POST['dmSE']));
        $telefonoS = strtoupper(trim($_POST['telfSE']));

        $detalleE = strtoupper(trim($_POST['detEE']));
        $investigador = strtoupper(trim($_POST['investE']));
        $fiscal = strtoupper(trim($_POST['fiscalE']));

        //subimos los datos a la Base de Datos
        $data = array(
            'unidad' => $unidadD,                 //entre '' va el nombre del campo de la Base de Datos
            'division' => $divisionD,

            'fecha_e' => $fechaEch,
            'hora_e' => $horaEch,
            'lugar_e' => $lugarEch,
            'naturaleza_e' => $naturalezaEch,

            'nombres_d' => $nombreD,
            'paterno_d' => $paternoD,
            'materno_d' => $maternoD,
            'nomcompleto_d' => $nombreD . ' ' . $paternoD . ' ' . $maternoD,
            'ci_d' => $ciD,
            'fechanac_d' => $fechaNacD,
            'sexo_d' => $sexD,
            'edad_d' => $edD,
            'ecivil_d' => $estCivilD,
            'nacionalidad_d' => $nacionalidadD,
            'profesion_d' => $profesionD,
            'domicilio_d' => $domicilioD,
            'telf_d' => $telefonoD,

            'tipo_v' => $tipoV,
            'nombres_v' => $nombreV,
            'paterno_v' => $paternoV,
            'materno_v' => $maternoV,
            'nomcompleto_v' => $nombreV . ' ' . $paternoV . ' ' . $maternoV,
            'ci_v' => $ciV,
            'nacionalidad_v' => $nacionalidadV,
            'domicilio_v' => $domicilioV,
            'telf_v' => $telefonoV,

            'tipo_s' => $tipoS,
            'nombres_s' => $nombreS,
            'paterno_s' => $paternoS,
            'materno_s' => $maternoS,
            'nomcompleto_s' => $nombreS . ' ' . $paternoS . ' ' . $maternoS,
            'ci_s' => $ciS,
            'nacionalidad_s' => $nacionalidadS,
            'domicilio_s' => $domicilioS,
            'telf_s' => $telefonoS,

            'detalle' => $detalleE,
            'asignado' => $investigador,
            'fiscal' => $fiscal,
            //'autor'=>session('usuario'),           
            'editor' => session('usuario'),
            'fecha_edi' => $fechaActual,
            'hora_edi' => $horaActual,
        );
        $DenunciasModel->update($id_denuncias, $data); //update actualiza los datos del id_Denuncias
    }

    //Función para Buscar Denuncias
    function BuscarDenuncias()
    {
        $DenunciasModel = new MDenuncias();
        $dato_bus = trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data = array(
            "lista_Denuncias" => $DenunciasModel->buscar_Denuncias($dato_bus)
        );
        echo view('Denuncias/ListaBuscarDenuncias', $data);
    }
}
