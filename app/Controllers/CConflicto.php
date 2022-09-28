<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MConflicto;

$fechaActual = date("Y") . "-" . date("m") . "-" . date("d"); //obtener la fecha del sistema

class CConflicto extends BaseController
{ 
    public function index()
    {
        $ConflictoModel = new MConflicto();
        $conflicto = array('lista_conflictos' => $ConflictoModel->lista_conflicto()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$conflicto=array('lista_conflicto'=>$ConflictoModel->paginate(20));
        echo view('header');
        echo view('asideIcia');
        echo view('/conflicto/VConflicto', $conflicto);
        echo view('footer');
    }

    //VER DETALLE DEL CONFLICTO
    public function DetConflicto()
    {
        $ConflictoModel = new MConflicto();
        //recuperar la parte del id de la URL
        $id_conflicto = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cconflicto/(1) Detalleconflicto/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $conflicto = array(
            'conflicto' => $ConflictoModel->detalle_conflicto($id_conflicto)
        );
        echo view('conflicto/DetalleConflicto', $conflicto);
    }

    //NUEVO CONFLICTO
    function FRegConflicto()
    {
        echo view('header');
        echo view('asideIcia');
        echo view('/Conflicto/FRegistroConflicto');
        echo view('footer');
    }
    
    function RegistroConflicto()
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        //$diassemana = array("DOMINGO", "LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO");
        $ConflictoModel = new MConflicto();

        $unidad = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario       
        $dpto = strtoupper(trim($_POST['dpto']));
        $municipio = strtoupper(trim($_POST['municipio']));
        $organizacion = strtoupper(trim($_POST['org_social']));
        $medida = strtoupper(trim($_POST['medida']));
        $lugar = strtoupper(trim($_POST['lugar']));
        $demanda = strtoupper(trim($_POST['demanda']));
        
        $f_inicio = trim($_POST['fecha_i']);
        $f_fin = trim($_POST['fecha_f']);
        $duracion = trim($_POST['dura']);
        $situacion = strtoupper(trim($_POST['situa']));
        $intensidad = strtoupper(trim($_POST['intensidad']));

        $personas = trim($_POST['cant_per']);
        $policias = trim($_POST['cant_pol']);
        $heridos = trim($_POST['cant_her']);
        $muertos = trim($_POST['cant_muer']);
        $material = strtoupper(trim($_POST['dano_mat']));
        $economico = strtoupper(trim($_POST['dano_eco']));
        $observacion = strtoupper(trim($_POST['obs']));
        
        $fotoC1 = $_FILES['foto_1'];
        $fotoC2 = $_FILES['foto_2'];

        $imagen1 = $fotoC1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen
        $imagen2 = $fotoC2['name'];

        //Subir el nombre de la imagen al sistema        
        move_uploaded_file($fotoC1["tmp_name"], "./assest/img/conflictos/$imagen1");
        move_uploaded_file($fotoC2["tmp_name"], "./assest/img/conflictos/$imagen2");

        if (empty($imagen1)) {
            $imagen1 = 'vacio.png';
        };
        if (empty($imagen2)) {
            $imagen2 = 'vacio.png';
        };        
        
        //subimos los datos a la Base de Datos
        $data = array(
            'estado'=> 'ACTIVO',
            'uni'=> $unidad,
            'dpto'=> $dpto,
            'munic'=> $municipio,
            'orga_social'=> $organizacion,
            'medida'=> $medida,
            'lugar'=> $lugar,
            'demanda'=> $demanda,

            'fecha_ini'=> $f_inicio,
            'fecha_fin'=> $f_fin,
            'dias_dura'=> $duracion,
            'situa'=> $situacion,

            'heridos'=> $heridos,
            'muertos'=> $muertos,

            'intensidad'=> $intensidad,
            'cant_perso'=> $personas,
            'cant_poli'=> $policias,

            'dano_mat'=> $material,
            'dano_eco'=> $economico,
            'obs'=> $observacion,
            'foto1'=> $imagen1,
            'foto2'=> $imagen2,


            'autor'=>session('usuario'),
            'fecha_crea'=>$fechaActual,
            'hora_crea'=>$horaActual,
            //'editor'=>session('usuario'),
            'fecha_edit'=>$fechaActual,
            'hora_edit'=>$horaActual,

        );
        $ConflictoModel->insert($data);
    }

    //IMPRIMIR REPORTE
    function ReporteConflicto()
    {
        $conflictoModel = new MConflicto();
        //recuperar la parte del id de la URL
        $id_conflicto = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cconflicto/(1) Detalleconflicto/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $conflicto = array(
            'conflicto' => $conflictoModel->detalle_conflicto($id_conflicto)
        );
        //echo view('conflicto/Reportes2',$conflicto);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('conflicto/RepPDF.php', $conflicto));
        $dompdf->setPaper('legal', 'portrait');   //para orizonatal es 'landscape'
        $dompdf->render();
        $dompdf->stream('repConflicto_' . $id_conflicto . '.pdf', array("Attachment" => 1));
    }

    //ELIMINAR conflicto
    function FEliConflicto()
    {
        $ConflictoModel = new MConflicto();
        $id_conflicto = $this->request->uri->getSegment(3);
        $conflicto = array(
            'conflicto' => $ConflictoModel->detalle_conflicto($id_conflicto)
        );
        //echo view('conflicto/Detalleconflicto',$conflicto);
        echo view('conflicto/FEliminarConflicto', $conflicto);
    }

    function EliminarConflicto()
    {
        $ConflictoModel = new MConflicto();
        $id_conflicto = $this->request->uri->getSegment(3);
        /*$ConflictoModel->delete($id_conflicto);
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO</center>";*/
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        
        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'borrar'=> session('usuario'),
            'fecha_del'=>$fechaActual,
            'hora_del'=>$horaActual,
        );
        $ConflictoModel->update($id_conflicto, $data); //update actualiza los datos del id_infractor
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    //EDICIÓN conflicto
    function FEdiConflicto()
    {
        $ConflictoModel = new MConflicto();
        $id_conflicto = $this->request->uri->getSegment(3);
        $conflicto = array(
            'conflicto' => $ConflictoModel->detalle_conflicto($id_conflicto)
        );
        echo view('conflicto/FEdicionConflicto', $conflicto);
    }

    function EdicionConflicto()
    {
        $ConflictoModel = new MConflicto();
        $id_conflicto = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $editor=session('usuario');       

        $unidad = strtoupper(trim($_POST['unidad']));        //entre[] va el name del input del formulario       
        $dpto = strtoupper(trim($_POST['dpto']));
        $municipio = strtoupper(trim($_POST['municipio']));
        $organizacion = strtoupper(trim($_POST['org_social']));
        $medida = strtoupper(trim($_POST['medida']));
        $lugar = strtoupper(trim($_POST['lugar']));
        $demanda = strtoupper(trim($_POST['demanda']));
        
        $f_inicio = trim($_POST['fecha_i']);
        $f_fin = trim($_POST['fecha_f']);
        $duracion = trim($_POST['dura']);
        $situacion = strtoupper(trim($_POST['situa']));
        $intensidad = strtoupper(trim($_POST['intensidad']));

        $personas = trim($_POST['cant_per']);
        $policias = trim($_POST['cant_pol']);
        $heridos = trim($_POST['cant_her']);
        $muertos = trim($_POST['cant_muer']);
        $material = strtoupper(trim($_POST['dano_mat']));
        $economico = strtoupper(trim($_POST['dano_eco']));
        $observacion = strtoupper(trim($_POST['obs']));
        
        $foto_1 = $_FILES['foto_1'];
        if($foto_1['name']==""){           
            $nomFoto1=$_POST['fotoActual1']; //recuperamos la información del formulario
        }else{            
            $nomFoto1 = $foto_1['name'];   //captura el nombre del archivo de la imagen en la variable $imagen             
            move_uploaded_file($foto_1["tmp_name"], "./assest/img/conflictos/$nomFoto1");
        };        

        $foto_2 = $_FILES['foto_2'];
        if($foto_2['name']==""){           
            $nomFoto2=$_POST['fotoActual2']; //recuperamos la información del formulario
        }else{            
            $nomFoto2 = $foto_2['name'];   //captura el nombre del archivo de la imagen en la variable $imagen             
            move_uploaded_file($foto_2["tmp_name"], "./assest/img/conflictos/$nomFoto2");
        };

        //subimos los datos a la Base de Datos
        $data = array(            
            'uni'=> $unidad,
            'dpto'=> $dpto,
            'munic'=> $municipio,
            'orga_social'=> $organizacion,
            'medida'=> $medida,
            'lugar'=> $lugar,
            'demanda'=> $demanda,

            'fecha_ini'=> $f_inicio,
            'fecha_fin'=> $f_fin,
            'dias_dura'=> $duracion,
            'situa'=> $situacion,

            'heridos'=> $heridos,
            'muertos'=> $muertos,

            'intensidad'=> $intensidad,
            'cant_perso'=> $personas,
            'cant_poli'=> $policias,

            'dano_mat'=> $material,
            'dano_eco'=> $economico,
            'obs'=> $observacion,
            'foto1'=> $nomFoto1,
            'foto2'=> $nomFoto2,
            
            'editor'=> $editor,
            'fecha_edit'=>$fechaActual,
            'hora_edit'=>$horaActual,
        );
        $ConflictoModel->update($id_conflicto, $data); //update actualiza los datos del id_conflicto
    }


    //IMPRIMIR REPORTE EXCEL
    function ReporteMTabla()
    {
        $ConflictoModel = new MConflicto();        
        $conflicto = array('lista_conflicto' => $ConflictoModel->info_tConflicto());      
        echo view('/Conflicto/ReporteTablaM', $conflicto);
        
    }
}
