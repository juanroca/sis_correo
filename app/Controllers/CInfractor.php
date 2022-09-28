<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MInfractor;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CInfractor extends BaseController
{

    public function index()
    {
        $InfractorModel = new MInfractor();
        $infractor = array('lista_infractor' => $InfractorModel->info_infractor()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$infractor=array('lista_infractor'=>$InfractorModel->paginate(20));
        echo view('header');
        echo view('asideEpi');
        echo view('/infractor/VInfractor', $infractor);
        echo view('footer');
    }

    //*********NUEVO INFRACTOR************
    public function FRegInfractor()
    {
        echo view('header');
        echo view('asideEpi');
        echo view('/infractor/FRegistroInfractor');
        echo view('footer');
    }

    function RegistroInfractor()
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $InfractorModel = new MInfractor();

        $uni = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario       
        
        $nombres = strtoupper(trim($_POST['nom']));

        $paterno = strtoupper(trim($_POST['pat']));
        $materno = strtoupper(trim($_POST['mat']));
        $cedula = strtoupper(trim($_POST['ci']));
        $sex = strtoupper(trim($_POST['sex']));
        $alias = strtoupper(trim($_POST['alias']));
        
        $especialidad = strtoupper(trim($_POST['espec']));
        $fechaNac = trim($_POST['f_nac']);
        $domicilio = strtoupper(trim($_POST['dm']));
        $telefono = trim($_POST['telf']);

        $tatuaje = strtoupper(trim($_POST['tatu']));
        $cicatrices = strtoupper(trim($_POST['cica']));
        
        
        $otros = strtoupper(trim($_POST['obs']));
        

        $fotoC1 = $_FILES['foto1'];
        $fotoC2 = $_FILES['foto2'];

        $imagen1 = $fotoC1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen
        $imagen2 = $fotoC2['name'];

        //Subir el nombre de la imagen al sistema        
        move_uploaded_file($fotoC1["tmp_name"], "./assest/img/infractor/$imagen1");
        move_uploaded_file($fotoC2["tmp_name"], "./assest/img/infractor/$imagen2");

        //subimos los datos a la Base de Datos
        $data = array(
            'unidad' => $uni,                 //entre '' va el nombre del campo de la Base de Datos
            'ci'=> $cedula,
            'nombres'=> $nombres,
            'ap_paterno'=>$paterno,
            'ap_materno'=>$materno,
            'completo_nom'=> $nombres.' '.$paterno.' '.$materno,
            'alias'=>$alias,
            'sexo'=> $sex,
            'especialidad'=> $especialidad,
            'fecha_nac'=> $fechaNac,
            'domicilio'=> $domicilio,
            'telf'=>$telefono,
            'tatuajes'=>$tatuaje,
            'cicatriz'=>$cicatrices,
            'otros'=>$otros,
            'foto1'=>$imagen1,
            'foto2'=>$imagen2,

            'usuario_crea'=>session('usuario'),
            'fecha_crea'=>$fechaActual,
            'hora_crea'=>$horaActual,
            //'editor'=>session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
            'estado'=>'ACTIVO',

        );
        $InfractorModel->insert($data);
    }

    //*********VER DETALLE DEL INFRACTOR************
    public function DetInfractor()
    {
        $InfractorModel = new MInfractor();
        //recuperar la parte del id de la URL
        $id_infractor = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cinfractor/(1) Detalleinfractor/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $infractor = array(
            'infractor' => $InfractorModel->info_detalle($id_infractor)
        );
        echo view('infractor/DetalleInfractor', $infractor);
    }

    //*********IMPRIMIR REPORTE DEL INFRACTOR************
    function PrintInfractor()
    {
        $InfractorModel = new MInfractor();
        //recuperar la parte del id de la URL
        $id_infractor = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cinfractor/(1) Detalleinfractor/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $infractor = array(
            'infractor' => $InfractorModel->info_detalle($id_infractor)
        );
        //echo view('infractor/Reportes2',$infractor);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('infractor/ReporteInfractor.php', $infractor));
        $dompdf->setPaper('letter', 'portrait');   //para orizontal es 'landscape'
        $dompdf->render();
        $dompdf->stream('reporte_' . $id_infractor . '.pdf', array("Attachment" => 1));
    }


    //*********ELIMINAR INFRACTOR************
    function FEliInfractor()
    {
        $InfractorModel = new MInfractor();
        $id_infractor = $this->request->uri->getSegment(3);
        $infractor = array(
            'infractor' => $InfractorModel->info_detalle($id_infractor)
        );
        //echo view('infractor/Detalleinfractor',$infractor);
        echo view('infractor/FEliminarInfractor', $infractor);
    }

    function EliminarInfractor()
    {
        $InfractorModel = new MInfractor();
        $id_infractor = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'delete_user'=> session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $InfractorModel->update($id_infractor, $data); //update actualiza los datos del id_infractor
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    /*function Eliminarinfractor()
    {
        $InfractorModel = new MInfractor();
        $id_infractor = $this->request->uri->getSegment(3);
        $InfractorModel->delete($id_infractor);
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADA</center>";
    }*/

    //*********EDITAR DATOS DEL INFRACTOR************
    function FEditarInfractor()
    {
        $InfractorModel = new MInfractor();
        $id_infractor = $this->request->uri->getSegment(3);
        $infractor = array(
            'infractor' => $InfractorModel->info_detalle($id_infractor)
        );
        echo view('infractor/FEdicionInfractor', $infractor);
    }

    function EditarInfractor()
    {
        $InfractorModel = new MInfractor();
        $id_infractor = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');        

        $uniE = strtoupper(trim($_POST['unidadE']));        //entre[] va el name del input del formulario       
        $nombresE = strtoupper(trim($_POST['nomE']));
        $paternoE = strtoupper(trim($_POST['patE']));
        $maternoE = strtoupper(trim($_POST['matE']));
        $cedulaE = strtoupper(trim($_POST['ciE']));
        $sexE = strtoupper(trim($_POST['sexE']));
        $aliasE = strtoupper(trim($_POST['aliasE']));
        $especialidadE = strtoupper(trim($_POST['especE']));
        $fechaNacE = trim($_POST['f_nacE']);
        $domicilioE = strtoupper(trim($_POST['dmE']));
        $telefonoE = trim($_POST['telfE']);
        $tatuajeE = strtoupper(trim($_POST['tatuE']));
        $cicatricesE = strtoupper(trim($_POST['cicaE']));
        $otrosE = strtoupper(trim($_POST['obsE']));
        

        //subimos los datos a la Base de Datos
        $data = array(
            'unidad' => $uniE,                 //entre '' va el nombre del campo de la Base de Datos
            'ci'=> $cedulaE,
            'nombres'=> $nombresE,
            'ap_paterno'=>$paternoE,
            'ap_materno'=>$maternoE,
            'completo_nom'=> $nombresE.' '.$paternoE.' '.$maternoE,
            'alias'=>$aliasE,
            'sexo'=> $sexE,
            'especialidad'=> $especialidadE,
            'fecha_nac'=> $fechaNacE,
            'domicilio'=> $domicilioE,
            'telf'=>$telefonoE,
            'tatuajes'=>$tatuajeE,
            'cicatriz'=>$cicatricesE,
            'otros'=>$otrosE,
            //'foto1'=>$imagen1,
            //'foto2'=>$imagen2,

            //'usuario_crea'=>session('usuario'),
            //'fecha_crea'=>$fechaActual,
            //'hora_crea'=>$horaActual,
            'editor'=>session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $InfractorModel->update($id_infractor, $data); //update actualiza los datos del id_infractor
    }

    //*********BUSCAR INFRACTOR************
    function BuscarInfractor()
    {
        $InfractorModel = new MInfractor();
        $dato_bus = trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data = array(
            "lista_infractor" => $InfractorModel->buscar_infractor($dato_bus)
        );
        echo view('infractor/ListaBusInfractor', $data);
    }
}
