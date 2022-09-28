<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MTic;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CTic extends BaseController
{
    public function index()
    {
        $TicModel = new MTic();
        $tic = array('lista_tic' => $TicModel->lista_tic()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$tic=array('lista_tic'=>$TicModel->paginate(20));
        echo view('header');
        echo view('asideTransito');
        echo view('/tic/VTic', $tic);
        echo view('footer');
    }

    //*********NUEVO tic************
    public function FRegTic()
    {
        echo view('header');
        echo view('asideTransito');
        echo view('/tic/FRegistroTic');
        echo view('footer');
    }

    function RegistroTic()
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $TicModel = new MTic();

        $depa = strtoupper(trim($_POST['dpto']));
        $munic = strtoupper(trim($_POST['municipio']));        //entre[] va el name del input del formulario       
        $uni = strtoupper(trim($_POST['unidad']));
        $tic = strtoupper(trim($_POST['tic']));

        $nombres = strtoupper(trim($_POST['nom']));
        $paterno = strtoupper(trim($_POST['pat']));
        $materno = strtoupper(trim($_POST['mat']));
        $licencia = strtoupper(trim($_POST['lic']));
        $categoria = strtoupper(trim($_POST['cat']));
        $lugar_nac = strtoupper(trim($_POST['lug_nac']));
        $fechaNac = trim($_POST['f_nac']);
        $sexo = strtoupper(trim($_POST['sexo']));        
        $edad = strtoupper(trim($_POST['edad']));
        $e_civil = strtoupper(trim($_POST['civil']));
        $domicilio = strtoupper(trim($_POST['dm']));
        $telefono = trim($_POST['telf']);
        $tipo_sangre = trim($_POST['sangre']);
        
        $clase = strtoupper(trim($_POST['clase_v']));
        $placa = strtoupper(trim($_POST['placa_v']));
        $crpva = strtoupper(trim($_POST['crpva']));
        $sindi = strtoupper(trim($_POST['sindicato']));
        $interno = strtoupper(trim($_POST['int_v']));
        $servicio = strtoupper(trim($_POST['servi']));
        $fecha_reg = strtoupper(trim($_POST['f_reg']));

        $fotoC1 = $_FILES['foto_1'];
        $fotoC2 = $_FILES['foto_2'];

        $imagen1 = $fotoC1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen
        $imagen2 = $fotoC2['name'];

        //Subir el nombre de la imagen al sistema        
        move_uploaded_file($fotoC1["tmp_name"], "./assest/img/tic/$imagen1");
        move_uploaded_file($fotoC2["tmp_name"], "./assest/img/tic/$imagen2");

        if (empty($imagen1)) {
            $imagen1 = 'vacio.png';
        };

        if (empty($imagen2)) {
            $imagen2 = 'vacio.png';
        };


        //subimos los datos a la Base de Datos
        $data = array(
            'estado' => 'ACTIVO',
            'dpto'=> $depa,
            'munic'=> $munic,
            'uni'=> $uni,
            'num_tic' => $tic,
                        
            'nombres'=> $nombres,
            'paterno'=> $paterno,
            'materno'=> $materno,
            'completo'=> $nombres . ' ' . $paterno . ' ' . $materno,
            'lic'=> $licencia,
            'cat_lic'=> $categoria,
            'lugarnac'=> $lugar_nac,
            'fechanac'=> $fechaNac,
            'sexo'=> $sexo,
            'edad'=> $edad,
            'ecivil'=> $e_civil,
            'domicilio'=> $domicilio,
            'telf'=> $telefono,
            't_sangre'=> $tipo_sangre,
            
            'clase_v'=> $clase,
            'placa_v'=> $placa,
            'crpva_v'=> $crpva,
            'interno'=> $interno,
            'asociacion'=> $sindi,
            'tipo'=> $servicio,

            'foto1'=> $imagen1,
            'foto2'=> $imagen2,

            'fecha_ini'=> $fecha_reg,
            'fecha_fin'=> date("Y-m-d",strtotime($fecha_reg."6 month")),

            'autor' => session('usuario'),
            'fecha_crea' => $fechaActual,
            'hora_crea' => $horaActual,
            //'editor'=>session('usuario'),
            //'fecha_edi' => $fechaActual,
            //'hora_edi' => $horaActual,
        );
        $TicModel->insert($data);
    }

    //*********VER DETALLE DEL tic************
    public function DetTic()
    {
        $TicModel = new MTic();
        //recuperar la parte del id de la URL
        $id_tic = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Ctic/(1) Detalletic/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $tic = array(
            'tic' => $TicModel->info_detalle($id_tic)
        );
        echo view('tic/DetalleTic', $tic);
    }

    //*********IMPRIMIR REPORTE DEL tic************
    function PrintTic()
    {
        $TicModel = new MTic();
        //recuperar la parte del id de la URL
        $id_tic = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Ctic/(1) Detalletic/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $tic = array(
            'tic' => $TicModel->info_detalle($id_tic)
        );
        //echo view('tic/Reportes2',$tic);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('tic/RepPDF.php', $tic));
        $dompdf->setPaper('letter', 'portrait');   //para orizontal es 'landscape'
        $dompdf->render();
        $dompdf->stream('reporte_' . $id_tic . '.pdf', array("Attachment" => 1));
    }


    //*********ELIMINAR tic************
    function FEliTic()
    {
        $TicModel = new MTic();
        $id_tic = $this->request->uri->getSegment(3);
        $tic = array(
            'tic' => $TicModel->info_detalle($id_tic)
        );
        echo view('tic/FEliminarTic', $tic);
    }

    function EliminarTic()
    {
        $TicModel = new MTic();
        $id_tic = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'borrar' => session('usuario'),
            'fecha_del' => $fechaActual,
            'hora_del' => $horaActual,
        );
        $TicModel->update($id_tic, $data); //update actualiza los datos del id_tic
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    //*********EDITAR DATOS DEL tic************
    function FEditarTic()
    {
        $TicModel = new MTic();
        $id_tic = $this->request->uri->getSegment(3);
        $tic = array(
            'tic' => $TicModel->info_detalle($id_tic)
        );        
        echo view('tic/FEdicionTic', $tic);       
        
    }

    function EditarTic()
    {
        $TicModel = new MTic();
        $id_tic = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');

        $depa = strtoupper(trim($_POST['depa']));
        $munic = strtoupper(trim($_POST['municipio']));        //entre[] va el name del input del formulario       
        $uni = strtoupper(trim($_POST['unidad']));
        $tic = strtoupper(trim($_POST['tic']));

        $nombres = strtoupper(trim($_POST['nom']));
        $paterno = strtoupper(trim($_POST['pat']));
        $materno = strtoupper(trim($_POST['mat']));
        $licencia = strtoupper(trim($_POST['lic']));
        $categoria = strtoupper(trim($_POST['cat']));
        $lugar_nac = strtoupper(trim($_POST['lug_nac']));
        $fechaNac = trim($_POST['f_nac']);
        $sexo = strtoupper(trim($_POST['sexo']));        
        $edad = strtoupper(trim($_POST['edad']));
        $e_civil = strtoupper(trim($_POST['civil']));
        $domicilio = strtoupper(trim($_POST['dm']));
        $telefono = trim($_POST['telf']);
        $tipo_sangre = trim($_POST['sangre']);
        
        $clase = strtoupper(trim($_POST['clase_v']));
        $placa = strtoupper(trim($_POST['placa_v']));
        $crpva = strtoupper(trim($_POST['crpva']));
        $sindi = strtoupper(trim($_POST['sindicato']));
        $interno = strtoupper(trim($_POST['int_v']));
        $servicio = strtoupper(trim($_POST['servi']));
        $fecha_reg = strtoupper(trim($_POST['f_reg']));

        /* *****ACTUALIZAR FOTO****** */
        $fotoC1 = $_FILES['foto_1'];
        if($fotoC1['name']==""){           
            $nomFoto1=$_POST['foto1Actual']; //recuperamos la información del formulario
        }else{            
            $nomFoto1 = $fotoC1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen 
            //$rutaFoto1 = $fotoC1['tmp_name'];
            //$rutaSave1 = './assest/img/tic/';
            move_uploaded_file($fotoC1["tmp_name"], "./assest/img/tic/$nomFoto1"); //Subir el nombre de la imagen al sistema
            //move_uploaded_file($rutaFoto1, $rutaSave1 . $nomFoto1);
        };

        $fotoC2 = $_FILES['foto_2'];
        if($fotoC2['name']==""){           
            $nomFoto2=$_POST['foto2Actual']; //recuperamos la información del formulario
        }else{            
            $nomFoto2 = $fotoC2['name'];   //captura el nombre del archivo de la imagen en la variable $imagen 
            //$rutaFoto2 = $fotoC2['tmp_name'];
            //$rutaSave2 = './assest/img/tic/';
            move_uploaded_file($fotoC2["tmp_name"], "./assest/img/tic/$nomFoto2");
            //move_uploaded_file($rutaFoto2, $rutaSave2 . $nomFoto2); //Subir el nombre de la imagen al sistema
        };

        //subimos los datos a la Base de Datos
        $data = array(
            'dpto'=> $depa,
            'munic'=> $munic,
            'uni'=> $uni,
            'num_tic' => $tic,
                        
            'nombres'=> $nombres,
            'paterno'=> $paterno,
            'materno'=> $materno,
            'completo'=> $nombres . ' ' . $paterno . ' ' . $materno,
            'lic'=> $licencia,
            'cat_lic'=> $categoria,
            'lugarnac'=> $lugar_nac,
            'fechanac'=> $fechaNac,
            'sexo'=> $sexo,
            'edad'=> $edad,
            'ecivil'=> $e_civil,
            'domicilio'=> $domicilio,
            'telf'=> $telefono,
            't_sangre'=> $tipo_sangre,
            
            'clase_v'=> $clase,
            'placa_v'=> $placa,
            'crpva_v'=> $crpva,
            'interno'=> $interno,
            'asociacion'=> $sindi,
            'tipo'=> $servicio,

            'foto1'=> $nomFoto1,
            'foto2'=> $nomFoto2,

            'fecha_ini'=> $fecha_reg,
            'fecha_fin'=> date("Y-m-d",strtotime($fecha_reg."6 month")),

            'editor'=>session('usuario'),
            'fecha_edit' => $fechaActual,
            'hora_edit' => $horaActual,
        );
        $TicModel->update($id_tic, $data); //update actualiza los datos del id_tic
    }
}
