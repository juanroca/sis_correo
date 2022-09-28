<?php

namespace App\Controllers;

use App\Models\MPerdes;
use Dompdf\Dompdf;

class CBuscados extends BaseController
{

    public function index()
    {
        $PerdesModel = new MPerdes();
        $buscados=array('lista_buscados'=>$PerdesModel->info_profugos()); //findAll() es para ver todos los registros... PAGINADOR -> paginate es para ver los registros es páginas.
        //$perdes = array('lista_buscados' => $PerdesModel->paginate(20));

        // $query="SELECT * FROM perdestrata WHERE situa='BUSCADO(A)'  order by fecha_reg";
        // $buscado =  mostrar_buscados($query,$perdes);
        // while ($registro = mysql_fetch_array($buscado))
        // {        
        echo view('header');
        echo view('asideIcia');
        echo view('/buscados/VBuscados', $buscados);
        echo view('footer');
    
    }

    //VER DETALLE DEL PERDES
    public function DetBuscados()
    {
        $PerdesModel = new MPerdes();
        //recuperar la parte del id de la URL
        $id_buscados = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CPerdes/(1) DetallePerdes/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $buscados = array(
            'buscados' => $PerdesModel->info_detalle($id_buscados)
        );
        echo view('buscados/DetalleBuscados', $buscados);
    }

    //NUEVO PERDES
    function FRegBuscados()
    {
        echo view('header');
        echo view('asideIcia');
        echo view('buscados/FRegistroBuscados');
        echo view('footer');
    }

    function RegistroBuscado()
    {
        $PerdesModel = new MPerdes();
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');

        $fechaReg = trim($_POST['fechaR']);     //entre[] va el name del input del formulario
        $horaReg = trim($_POST['horaR']);
        $situaReg = strtoupper(trim($_POST['sitR']));

        //BUSCADO
        $nombreB = strtoupper(trim($_POST['nomB']));
        $paternoB = strtoupper(trim($_POST['patB']));
        $maternoB = strtoupper(trim($_POST['matB']));
        $ciB = strtoupper(trim($_POST['ciB']));        
        $nacionalidadB = strtoupper(trim($_POST['nalB']));
        $delB = strtoupper(trim($_POST['delitoB']));        

        //MANDAMIENTO
        $fechaB = strtoupper(trim($_POST['fechaB']));
        $orden = strtoupper(trim($_POST['ordenB']));
        $entidad = strtoupper(trim($_POST['entidadB']));
        $autoridad = strtoupper(trim($_POST['autoridadB']));
        $situacionB = strtoupper(trim($_POST['sitB']));
        $observaciones = strtoupper(trim($_POST['obsB']));
        
        $fotoBus = $_FILES['fotoB'];       

        $imagenB = $fotoBus['name'];   //captura el nombre del archivo de la imagen en la variable $imagen

        //Subir el nombre de la imagen al sistema        
        move_uploaded_file($fotoBus["tmp_name"], "./assest/img/buscados/$imagenB");

        if (empty($imagenB)) {
            $imagenB = 'vacio.png';
        };

        //subimos los datos a la Base de Datos
        $data = array(
            'tipo'=> 'PROFUGO',
            'estado'=> 'ACTIVO',            
            'fecha_reg' => $fechaReg,
            'hora_reg' => $horaReg,
            'situa' => $situaReg,     //entre '' va el nombre del campo de la Base de Datos

            //DENUNCIANTE            
            'nom_des' => $nombreB,
            'pat_des' => $paternoB,
            'mat_des' => $maternoB,
            'completo_des' => $nombreB . ' ' . $paternoB . ' ' . $maternoB,
            'ci_des' => $ciB,
            'nal_des' => $nacionalidadB,
            
            'delito_b' => $delB,
            'fecha_b' => $fechaB,
            'orden_b' => $orden,
            'entidad_b' => $entidad,
            'autoridad_b' => $autoridad,
            'situ_b' => $situacionB,
            'obs_b' => $observaciones,
            'foto1' => $imagenB,            

            'autor' => session('usuario'),
            //'edit'=>$editor,
            'fecha_edit' => $fechaActual,
            'hora_edit' => $horaActual,
        );
        $PerdesModel->insert($data);
    }
    //ELIMINAR PERDES
    function FEliBuscados()
    {
        $PerdesModel = new MPerdes();
        $id_buscados = $this->request->uri->getSegment(3);
        $buscados = array(
            'buscados' => $PerdesModel->info_detalle($id_buscados)
        );
        //echo view('perdes/DetallePerdes',$Perdes);
        echo view('buscados/FEliminarBuscados', $buscados);
    }

    function EliminarBuscados()
    {
        $PerdesModel = new MPerdes();
        $id_buscados = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        
        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'delete_user'=> session('usuario'),
            'fecha_edi'=>$fechaActual,
            'hora_edi'=>$horaActual,
        );
        $PerdesModel->update($id_buscados, $data); //update actualiza los datos del id_infractor
        echo "<center class='alert alert-success' style='width:350px;'>REGISTRO ELIMINADO CORRECTAMENTE</center>";
    }

    //EDICIÓN BUSCADOS
    function FEdiBuscados()
    {
        $PerdesModel = new MPerdes();
        $id_buscados = $this->request->uri->getSegment(3);
        $buscados = array('buscados' => $PerdesModel->info_detalle($id_buscados));
        echo view('buscados/FEdicionBuscados', $buscados);
    }

    function EdicionBuscados()
    {        
        $fechaActual = date('Y-m-d');
        $horaActual = date('H:i:s');
        $PerdesModel = new MPerdes();
        $id_buscados = $this->request->uri->getSegment(3);

        $situaReg = strtoupper(trim($_POST['sitRE']));

        //BUSCADO
        $nombreB = strtoupper(trim($_POST['nomBE']));
        $paternoB = strtoupper(trim($_POST['patBE']));
        $maternoB = strtoupper(trim($_POST['matBE']));
        $ciB = strtoupper(trim($_POST['ciBE']));        
        $nacionalidadB = strtoupper(trim($_POST['nalBE']));
        $delB = strtoupper(trim($_POST['delitoBE']));        

        //MANDAMIENTO
        $fechaB = strtoupper(trim($_POST['fechaBE']));
        $orden = strtoupper(trim($_POST['ordenBE']));
        $entidad = strtoupper(trim($_POST['entidadBE']));
        $autoridad = strtoupper(trim($_POST['autoridadBE']));
        $situacionB = strtoupper(trim($_POST['sitBE']));
        $observaciones = strtoupper(trim($_POST['obsBE']));

        $data = array(

            'situa' => $situaReg,     //entre '' va el nombre del campo de la Base de Datos

            //DENUNCIANTE            
            'nom_des' => $nombreB,
            'pat_des' => $paternoB,
            'mat_des' => $maternoB,
            'completo_des' => $nombreB . ' ' . $paternoB . ' ' . $maternoB,
            'ci_des' => $ciB,
            'nal_des' => $nacionalidadB,
            
            'delito_b' => $delB,
            'fecha_b' => $fechaB,
            'orden_b' => $orden,
            'entidad_b' => $entidad,
            'autoridad_b' => $autoridad,
            'situ_b' => $situacionB,
            'obs_b' => $observaciones,

            //'autor'=>session('usuario'),
            'edit' => session('usuario'),
            'fecha_edit' => $fechaActual,
            'hora_edit' => $horaActual,

        );
        $PerdesModel->update($id_buscados, $data); //update actualiza los datos del id_perdes
    }

    //Función para Buscar Perdes
    function BuscarBuscadosCompleto()
    {
        $PerdesModel = new MPerdes();
        $dato_bus = trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data = array(
            "lista_buscados" => $PerdesModel->buscar_buscadosCompleto($dato_bus)
        );
        echo view('buscados/ListaBuscarBuscados', $data);
    }

}