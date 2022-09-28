<?php

namespace App\Controllers;

use App\Models\MPerdes;


class CPerdes extends BaseController
{

    public function index()
    {
        $PerdesModel = new MPerdes();
        $perdes=array('lista_perdes'=>$PerdesModel->info_perdes()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$perdes = array('lista_perdes' => $PerdesModel->paginate(20));

        echo view('header');
        echo view('asideFelcc');
        echo view('/perdes/VPerdes', $perdes);
        echo view('footer');
    }

    //VER DETALLE DEL PERDES
    public function DetallePerdes()
    {
        $PerdesModel = new MPerdes();
        //recuperar la parte del id de la URL
        $id_perdes = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CPerdes/(1) DetallePerdes/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $perdes = array(
            'perdes' => $PerdesModel->info_detalle($id_perdes)
        );
        echo view('perdes/DetallePerdes', $perdes);
    }

    //NUEVO PERDES
    function FRegPerdes()
    {
        $PerdesModel = new MPerdes();
        //$perdes=array('lista_perdes'=>$PerdesModel->findAll()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.        
        echo view('header');
        echo view('asideFelcc');
        echo view('/perdes/FRegistroPerdes');
        echo view('footer');
    }

    function RegistroPerdes()
    {
        $PerdesModel = new MPerdes();
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');

        $cas = strtoupper(trim($_POST['caso']));       //entre[] va el name del input del formulario
        $unidad = strtoupper(trim($_POST['uni']));
        $fechaReg = trim($_POST['fechaR']);
        $horaReg = trim($_POST['horaR']);
        $situacion = strtoupper(trim($_POST['sit']));
        $lugarDes = strtoupper(trim($_POST['lugarDes']));
        $fDes = trim($_POST['fechaDes']);
        $hDes = trim($_POST['horaDes']);
        $asignado = strtoupper(trim($_POST['asig']));
        //DENUNCIANTE
        $nombreD = strtoupper(trim($_POST['nomD']));
        $paternoD = strtoupper(trim($_POST['patD']));
        $maternoD = strtoupper(trim($_POST['matD']));
        $ciD = strtoupper(trim($_POST['ciD']));
        $parenD = strtoupper(trim($_POST['parD']));
        $fechanacD = strtoupper(trim($_POST['fnacD']));
        $edadD = strtoupper(trim($_POST['edadD']));
        $nacionalidadD = strtoupper(trim($_POST['nalD']));
        $naturalD = strtoupper(trim($_POST['natD']));
        $provinciaD = strtoupper(trim($_POST['provD']));
        $departamentoD = strtoupper(trim($_POST['depD']));
        $ocupacionD = strtoupper(trim($_POST['ocuD']));
        $estcivilD = strtoupper(trim($_POST['ecivilD']));
        $telfD = strtoupper(trim($_POST['telfD']));
        $domD = strtoupper(trim($_POST['dmD']));

        //DESAPARECIDO
        $tipoDes = strtoupper(trim($_POST['tipoDes']));
        $nombreDes = strtoupper(trim($_POST['nomDes']));
        $paternoDes = strtoupper(trim($_POST['patDes']));
        $maternoDes = strtoupper(trim($_POST['matDes']));
        $ciDes = strtoupper(trim($_POST['ciDes']));
        $fechanacDes = trim($_POST['fnacDes']);
        $edadDes = strtoupper(trim($_POST['edadDes']));
        $sexoDes = strtoupper(trim($_POST['genDes']));
        $nacionalidadDes = strtoupper(trim($_POST['nalDes']));
        $naturalDes = strtoupper(trim($_POST['natDes']));
        $provinciaDes = strtoupper(trim($_POST['provDes']));
        $departamentoDes = strtoupper(trim($_POST['depDes']));
        $ocupacionDes = strtoupper(trim($_POST['ocuDes']));
        $estcivilDes = strtoupper(trim($_POST['ecivilDes']));
        $telfDes = strtoupper(trim($_POST['telfDes']));
        $domDes = strtoupper(trim($_POST['dmDes']));

        //RASGOS SOMATICOS
        $tezpiel = strtoupper(trim($_POST['tezDes']));
        $cabello = strtoupper(trim($_POST['cabDes']));
        $ojos = strtoupper(trim($_POST['ojoDes']));
        $contextura = strtoupper(trim($_POST['contxDes']));
        $estatura = strtoupper(trim($_POST['estDes']));
        $peso = strtoupper(trim($_POST['pesDes']));
        $lunares = strtoupper(trim($_POST['lunarDes']));
        $tatuajes = strtoupper(trim($_POST['tatuDes']));
        $cicatrices = strtoupper(trim($_POST['cicaDes']));
        $lesiones = strtoupper(trim($_POST['lesiDes']));
        $vestimentasup = strtoupper(trim($_POST['vsupDes']));
        $vestimentainf = strtoupper(trim($_POST['vinfDes']));
        $zapatos = strtoupper(trim($_POST['zapDes']));
        $efecper = strtoupper(trim($_POST['efperDes']));
        $efecaje = strtoupper(trim($_POST['efajDes']));
        $detalle = strtoupper(trim($_POST['detDes']));

        $fotoD1 = $_FILES['fotoDes1'];
        $fotoD2 = $_FILES['fotoDes2'];

        $imagen1 = $fotoD1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen
        $imagen2 = $fotoD2['name'];

        //Subir el nombre de la imagen al sistema        
        move_uploaded_file($fotoD1["tmp_name"], "./assest/img/perdes/$imagen1");
        move_uploaded_file($fotoD2["tmp_name"], "./assest/img/perdes/$imagen2");

        if (empty($imagen1)) {
            $imagen1 = 'vacio.png';
        };

        if (empty($imagen2)) {
            $imagen2 = 'vacio.png';
        };


        //subimos los datos a la Base de Datos
        $data = array(
            'tipo'=> 'TRATA',
            'estado'=> 'ACTIVO',
            'caso_reg' => $cas,
            'unidad' => $unidad,
            'fecha_reg' => $fechaReg,
            'hora_reg' => $horaReg,
            'situa' => $situacion,
            'lugar_des' => $lugarDes,
            'fecha_des' => $fDes,
            'hora_des' => $hDes,
            'asig' => $asignado,     //entre '' va el nombre del campo de la Base de Datos

            //DENUNCIANTE
            'paren_d' => $parenD,
            'nom_d' => $nombreD,
            'pat_d' => $paternoD,
            'mat_d' => $maternoD,
            'completo_d' => $nombreD . ' ' . $paternoD . ' ' . $maternoD,
            'ci_d' => $ciD,
            'fnac_d' => $fechanacD,
            'edad_d' => $edadD,
            'nat_d' => $naturalD,
            'prov_d' => $provinciaD,
            'dpto_d' => $departamentoD,
            'nal_d' => $nacionalidadD,
            'ocup_d' => $ocupacionD,
            'eciv_d' => $estcivilD,
            'dm_d' => $domD,
            'telf_d' => $telfD,

            //DESAPARECIDO
            'tipo_des' => $tipoDes,
            'edad_des' => $edadDes,
            'genero_des' => $sexoDes,
            'nom_des' => $nombreDes,
            'pat_des' => $paternoDes,
            'mat_des' => $maternoDes,
            'completo_des' => $nombreDes . ' ' . $paternoDes . ' ' . $maternoDes,
            'ci_des' => $ciDes,
            'fnac_des' => $fechanacDes,
            'eciv_des' => $estcivilDes,
            'dm_des' => $domDes,
            'nat_des' => $naturalDes,
            'prov_des' => $provinciaDes,
            'dpto_des' => $departamentoDes,
            'nal_des' => $nacionalidadDes,
            'ocup_des' => $ocupacionDes,
            'telf_des' => $telfDes,

            //RASGOS SOMÁTICOS
            'tez_des' => $tezpiel,
            'cab_des' => $cabello,
            'ojo_des' => $ojos,
            'contex_des' => $contextura,
            'esta_des' => $estatura,
            'peso_des' => $peso,
            'lun_des' => $lunares,
            'cic_des' => $cicatrices,
            'tatu_des' => $tatuajes,
            'lesi_des' => $lesiones,
            'vsup_des' => $vestimentasup,
            'vinf_des' => $vestimentainf,
            'zap_des' => $zapatos,
            'epers_des' => $efecper,
            'eaje_des' => $efecaje,
            'det_des' => $detalle,

            'foto1' => $imagen1,
            'foto2' => $imagen2,

            'autor' => session('usuario'),
            //'edit'=>$editor,
            'fecha_edit' => $fechaActual,
            'hora_edit' => $horaActual,

        );
        $PerdesModel->insert($data);
    }
    //ELIMINAR PERDES
    function FEliminarPerdes()
    {
        $PerdesModel = new MPerdes();
        $id_perdes = $this->request->uri->getSegment(3);
        $perdes = array(
            'perdes' => $PerdesModel->info_detalle($id_perdes)
        );
        //echo view('perdes/DetallePerdes',$Perdes);
        echo view('perdes/FEliminarPerdes', $perdes);
    }

    function EliminarPerdes()
    {
        $PerdesModel = new MPerdes();
        $id_perdes = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        
        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'delete_user'=> session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $PerdesModel->update($id_perdes, $data); //update actualiza los datos del id_infractor
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    //EDICIÓN PERDES
    function FEdicionPerdes()
    {
        $PerdesModel = new MPerdes();
        $id_perdes = $this->request->uri->getSegment(3);
        $perdes = array('perdes' => $PerdesModel->info_detalle($id_perdes));
        echo view('perdes/FEdicionPerdes', $perdes);
    }

    function EdicionPerdes()
    {
        $PerdesModel = new MPerdes();
        $id_perdes = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');

        $cas = strtoupper(trim($_POST['caso']));       //entre[] va el name del input del formulario
        $unidad = strtoupper(trim($_POST['uni']));
        $situacion = strtoupper(trim($_POST['sit']));
        $lugarDes = strtoupper(trim($_POST['lugarDes']));
        $fDes = trim($_POST['fechaDes']);
        $hDes = trim($_POST['horaDes']);
        $asignado = strtoupper(trim($_POST['asig']));
        //DENUNCIANTE
        $nombreD = strtoupper(trim($_POST['nomD']));
        $paternoD = strtoupper(trim($_POST['patD']));
        $maternoD = strtoupper(trim($_POST['matD']));
        $ciD = strtoupper(trim($_POST['ciD']));
        $parenD = strtoupper(trim($_POST['parD']));
        $fechanacD = strtoupper(trim($_POST['fnacD']));
        $edadD = strtoupper(trim($_POST['edadD']));
        $nacionalidadD = strtoupper(trim($_POST['nalD']));
        $naturalD = strtoupper(trim($_POST['natD']));
        $provinciaD = strtoupper(trim($_POST['provD']));
        $departamentoD = strtoupper(trim($_POST['depD']));
        $ocupacionD = strtoupper(trim($_POST['ocuD']));
        $estcivilD = strtoupper(trim($_POST['ecivilD']));
        $telfD = strtoupper(trim($_POST['telfD']));
        $domD = strtoupper(trim($_POST['dmD']));

        //DESAPARECIDO
        $tipoDes = strtoupper(trim($_POST['tipoDes']));
        $nombreDes = strtoupper(trim($_POST['nomDes']));
        $paternoDes = strtoupper(trim($_POST['patDes']));
        $maternoDes = strtoupper(trim($_POST['matDes']));
        $ciDes = strtoupper(trim($_POST['ciDes']));
        $fechanacDes = trim($_POST['fnacDes']);
        $edadDes = strtoupper(trim($_POST['edadDes']));
        $sexoDes = strtoupper(trim($_POST['genDes']));
        $nacionalidadDes = strtoupper(trim($_POST['nalDes']));
        $naturalDes = strtoupper(trim($_POST['natDes']));
        $provinciaDes = strtoupper(trim($_POST['provDes']));
        $departamentoDes = strtoupper(trim($_POST['depDes']));
        $ocupacionDes = strtoupper(trim($_POST['ocuDes']));
        $estcivilDes = strtoupper(trim($_POST['ecivilDes']));
        $telfDes = strtoupper(trim($_POST['telfDes']));
        $domDes = strtoupper(trim($_POST['dmDes']));

        //RASGOS SOMATICOS
        $tezpiel = strtoupper(trim($_POST['tezDes']));
        $cabello = strtoupper(trim($_POST['cabDes']));
        $ojos = strtoupper(trim($_POST['ojoDes']));
        $contextura = strtoupper(trim($_POST['contxDes']));
        $estatura = strtoupper(trim($_POST['estDes']));
        $peso = strtoupper(trim($_POST['pesDes']));
        $lunares = strtoupper(trim($_POST['lunarDes']));
        $tatuajes = strtoupper(trim($_POST['tatuDes']));
        $cicatrices = strtoupper(trim($_POST['cicaDes']));
        $lesiones = strtoupper(trim($_POST['lesiDes']));
        $vestimentasup = strtoupper(trim($_POST['vsupDes']));
        $vestimentainf = strtoupper(trim($_POST['vinfDes']));
        $zapatos = strtoupper(trim($_POST['zapDes']));
        $efecper = strtoupper(trim($_POST['efperDes2']));
        $efecaje = strtoupper(trim($_POST['efajDes']));
        $detalle = strtoupper(trim($_POST['detDes']));

        $data = array(
            'caso_reg' => $cas,
            'unidad' => $unidad,
            'situa' => $situacion,
            'lugar_des' => $lugarDes,
            'fecha_des' => $fDes,
            'hora_des' => $hDes,
            'asig' => $asignado,     //entre '' va el nombre del campo de la Base de Datos

            //DENUNCIANTE
            'paren_d' => $parenD,
            'nom_d' => $nombreD,
            'pat_d' => $paternoD,
            'mat_d' => $maternoD,
            'completo_d' => $nombreD . ' ' . $paternoD . ' ' . $maternoD,
            'ci_d' => $ciD,
            'fnac_d' => $fechanacD,
            'edad_d' => $edadD,
            'nat_d' => $naturalD,
            'prov_d' => $provinciaD,
            'dpto_d' => $departamentoD,
            'nal_d' => $nacionalidadD,
            'ocup_d' => $ocupacionD,
            'eciv_d' => $estcivilD,
            'dm_d' => $domD,
            'telf_d' => $telfD,

            //DESAPARECIDO
            'tipo_des' => $tipoDes,
            'edad_des' => $edadDes,
            'genero_des' => $sexoDes,
            'nom_des' => $nombreDes,
            'pat_des' => $paternoDes,
            'mat_des' => $maternoDes,
            'completo_des' => $nombreDes . ' ' . $paternoDes . ' ' . $maternoDes,
            'ci_des' => $ciDes,
            'fnac_des' => $fechanacDes,
            'eciv_des' => $estcivilDes,
            'dm_des' => $domDes,
            'nat_des' => $naturalDes,
            'prov_des' => $provinciaDes,
            'dpto_des' => $departamentoDes,
            'nal_des' => $nacionalidadDes,
            'ocup_des' => $ocupacionDes,
            'telf_des' => $telfDes,

            //RASGOS SOMÁTICOS
            'tez_des' => $tezpiel,
            'cab_des' => $cabello,
            'ojo_des' => $ojos,
            'contex_des' => $contextura,
            'esta_des' => $estatura,
            'peso_des' => $peso,
            'lun_des' => $lunares,
            'cic_des' => $cicatrices,
            'tatu_des' => $tatuajes,
            'lesi_des' => $lesiones,
            'vsup_des' => $vestimentasup,
            'vinf_des' => $vestimentainf,
            'zap_des' => $zapatos,
            'epers_des' => $efecper,
            'eaje_des' => $efecaje,
            'det_des' => $detalle,

            //'autor'=>session('usuario'),
            'edit' => session('usuario'),
            'fecha_edit' => $fechaActual,
            'hora_edit' => $horaActual,

        );
        $PerdesModel->update($id_perdes, $data); //update actualiza los datos del id_perdes
    }

    //Función para Buscar Perdes
    function BuscarPerdesCompleto()
    {
        $PerdesModel = new MPerdes();
        $dato_bus = trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data = array(
            "lista_perdes" => $PerdesModel->buscar_perdesCompleto($dato_bus)
        );
        echo view('perdes/ListaBuscarPerdes', $data);
    }

    //IMPRIMIR REPORTE COMPLETO
    function ReportePerdes()
    {
        $PerdesModel = new MPerdes();
        //recuperar la parte del id de la URL
        $id_perdes = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cperdes/(1) Detalleperdes/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $perdes = array(
            'perdes' => $PerdesModel->info_detalle($id_perdes)
        );  
        //echo view('perdes/ReportePerdes',$perdes);
        
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('perdes/ReportePerdes.php', $perdes));
        $dompdf->setPaper('legal', 'portrait');   //para orizonatal es 'landscape'
        $dompdf->render();
        $dompdf->stream('tratascz_' . $id_perdes . '.pdf', array("Attachment" => 1));
    }

    //IMPRIMIR REPORTE AFICHE
    function Reporte()
    {
        $PerdesModel = new MPerdes();
        //recuperar la parte del id de la URL
        $id_perdes = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cperdes/(1) Detalleperdes/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $perdes = array(
            'perdes' => $PerdesModel->info_detalle($id_perdes)
        );
        // echo view('perdes/Reportes2',$perdes);


        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('perdes/ReporteP.php', $perdes));
        $dompdf->setPaper('letter', 'portrait');   //para orizonatal es 'landscape'
        $dompdf->render();
        $dompdf->stream('reportrata_' . $id_perdes . '.pdf', array("Attachment" => 1));
    }

   
}
