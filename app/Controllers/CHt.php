<?php

namespace App\Controllers;


use App\Models\MHt;
use App\Models\MRel_htofi;
//use App\Models\MDocumento;

date_default_timezone_set('America/La_Paz');
$fechaHoy = date('m-d-Y h:i:s'); //obtener la fecha del sistema

class CHt extends BaseController
{
    public function index()
    {
        $HtModel = new MHt();
        $ht = array('lista_hts' => $HtModel->lista_hts());
        echo view('header');
        echo view('asideAdmin');
        echo view('/ht/VHt', $ht);
        echo view('footer');
    }

    public function Detht()
    {
        $HtModel = new MHt();
        //recuperar la parte del id de la URL
        $id_ht = $this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cht/(1) Detalleht/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $ht = array(
            'ht' => $HtModel->info_ht($id_ht)
        );
        echo view('ht/DetalleHt', $ht);
    }

    function FRegHt()
    {
        echo view('header');
        echo view('asideAdmin');
        echo view('/ht/FRegistroHt');
        echo view('footer');
    }

    function FRegHtID()
    {
        echo view('header');
        echo view('asideAdmin');
        echo view('/ht/FRegistroHt');
        echo view('footer');
    }

    function RegistroHt()
    {
        $fechaActual = date('Y-m-d h:i:s');
        $HtModel = new MHt();
        //$cnx =mysqli_connect('localhost', 'root', '', 'sis_correo');

        $fechaHt = trim($_POST['fecha_ht']);
        $idDoc = strtoupper(trim($_POST['id_doc']));
        $situaHt = strtoupper(trim($_POST['situa_ht']));
        
        /*CAPTURAR VALORES DE CHECKBOX */        
        $oficinas = '';
        if (isset($_POST['OfiOption'])) {
            $oficinas = implode(', ', $_POST['OfiOption']);
        }
        $instrucciones = '';
        if (isset($_POST['InstOption'])) {
            $instrucciones = implode(', ', $_POST['InstOption']);
        }

        $otraOficina = strtoupper(trim($_POST['otraOfi']));
        $otraInstruccion = strtoupper(trim($_POST['otraInst']));
        
        $obsHT = strtoupper(trim($_POST['obsHt']));

        $data = array(
            'estado' => 'ACTIVO',
            'id_documento' => $idDoc,
            'fecha_ht' => $fechaHt,
            'oficina' => $oficinas,
            'otra_ofi' => $otraOficina,
            'instruccion' => $instrucciones,
            'otra_inst' => $otraInstruccion,    
            'obs_ht' => $obsHT,        
            'situa_ht' => $situaHt,            

            'crea_ht' => SESSION('usuario'),
        );
        $HtModel->insert($data);        
        
        //$id_ht_insertado = mysqli_insert_id($HtModel);

        $MRelhoModel = new MRel_htofi();
        foreach ($_POST['OfiOption'] as $idOficina){          
            
            $data2 = array(
                'id_ht' => $id_ht_insertado,
                'id_oficina' => $idOficina,

                'autor'=> SESSION('usuario'),
            );
            $MRelhoModel->insert($data2);
        }        
    }

    function FEliht()
    {
        $HtModel = new MHt();
        $id_ht = $this->request->uri->getSegment(3);
        $ht = array(
            'ht' => $HtModel->info_ht($id_ht)
        );
        echo view('ht/FEliminarht', $ht);
    }

    function Eliminarht()
    {
        $HtModel = new MHt();
        $id_ht = $this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d h:i:s');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'eli_doc' => session('usuario'),
            'fecha_eli' => $fechaActual,
        );
        $HtModel->update($id_ht, $data); //update actualiza los datos del id_tic
    }

    function FEdiht()
    {
        $HtModel = new MHt();
        $id_ht = $this->request->uri->getSegment(3);
        $ht = array('ht' => $HtModel->info_ht($id_ht));
        echo view('ht/FEdicionht', $ht);
    }

    function Edicionht()
    {
        $fechaActual = date('Y-m-d h:i:s');
        $HtModel = new MHt();
        $id_ht = $this->request->uri->getSegment(3);

        $fechaRecep = trim($_POST['fecha_recep']);
        $tipoDoc = trim($_POST['tipo_doc']);
        $origenDoc = strtoupper(trim($_POST['origen_doc']));
        $refDoc = strtoupper(trim($_POST['ref_doc']));
        $fechaDoc = trim($_POST['fecha_doc']);
        $pagDoc = trim($_POST['pag']);
        $obsDoc = strtoupper(trim($_POST['obs_doc']));
        $situaDoc = strtoupper(trim($_POST['situa_doc']));

        $data = array(
            'estado' => 'ACTIVO',
            'fecha_recibido' => $fechaRecep,
            'tipo' => $tipoDoc,
            'origen' => $origenDoc,
            'referencia' => $refDoc,
            'fecha_doc' => $fechaDoc,
            'cant_pag' => $pagDoc,
            'obs' => $obsDoc,
            'situa' => $situaDoc,

            'edit_doc' => SESSION('usuario'),
            'fecha_edit' => $fechaActual,
        );
        $HtModel->update($id_ht, $data);
    }
}
