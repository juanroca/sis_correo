<?php

namespace App\Controllers;
use App\Models\MHt;
//use App\Models\MDocumento;

date_default_timezone_set('America/La_Paz');
$fechaHoy=date('m-d-Y h:i:s');//obtener la fecha del sistema

class CHt extends BaseController
{
    public function index(){
        $HtModel=new MHt();
        $ht=array('lista_hts'=>$HtModel->lista_hts());
        echo view('header');
        echo view('asideAdmin');
        echo view('/ht/VHt',$ht);
		echo view('footer');
    }

    public function Detht(){
        $HtModel=new MHt();
        //recuperar la parte del id de la URL
        $id_ht=$this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cht/(1) Detalleht/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $ht=array(
            'ht'=>$HtModel->info_ht($id_ht)
        );
        echo view('ht/DetalleHt',$ht);
    }

    function FRegHt(){
        echo view('header');
        echo view('/ht/FRegistroHt');
		echo view('footer');
    }

    function RegistroHt(){
        $fechaActual=date('Y-m-d h:i:s');
        $HtModel=new MHt();
        
        $fechaRecep=trim($_POST['fecha_recep']);
        $tipoDoc=trim($_POST['tipo_doc']);
        $origenDoc=strtoupper(trim($_POST['origen_doc']));
        $refDoc=strtoupper(trim($_POST['ref_doc']));
        $fechaDoc=trim($_POST['fecha_doc']);        
        $pagDoc=trim($_POST['pag']);
        $obsDoc=strtoupper(trim($_POST['obs_doc']));    
        $situaDoc=strtoupper(trim($_POST['situa_doc']));        
                
        $data=array(  
            'estado'=>'ACTIVO',
            'fecha_recibido'=>$fechaRecep,            
            'tipo'=>$tipoDoc,
            'origen'=>$origenDoc,
            'referencia'=>$refDoc,
            'fecha_doc'=>$fechaDoc,
            'cant_pag'=>$pagDoc,
            'obs'=>$obsDoc,
            'situa'=>$situaDoc,
                    
            'crea_doc'=>SESSION('usuario'),            
           
        );
        $HtModel->insert($data);
    }

    function FEliht(){        
        $HtModel=new MHt();
        $id_ht=$this->request->uri->getSegment(3);
        $ht=array(
            'ht'=>$HtModel->info_ht($id_ht)
        );
        echo view('ht/FEliminarht', $ht);
    }

    function Eliminarht(){
        $HtModel=new MHt();
        $id_ht=$this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d h:i:s');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'eli_doc' => session('usuario'),
            'fecha_eli' => $fechaActual,
        );
        $HtModel->update($id_ht, $data); //update actualiza los datos del id_tic
    }

    function FEdiht(){
        $HtModel=new MHt();
        $id_ht=$this->request->uri->getSegment(3);
        $ht=array('ht'=>$HtModel->info_ht($id_ht));
        echo view('ht/FEdicionht', $ht);
    }

    function Edicionht(){
        $fechaActual=date('Y-m-d h:i:s');
        $HtModel=new MHt();
        $id_ht=$this->request->uri->getSegment(3);

        $fechaRecep=trim($_POST['fecha_recep']);
        $tipoDoc=trim($_POST['tipo_doc']);
        $origenDoc=strtoupper(trim($_POST['origen_doc']));
        $refDoc=strtoupper(trim($_POST['ref_doc']));
        $fechaDoc=trim($_POST['fecha_doc']);        
        $pagDoc=trim($_POST['pag']);
        $obsDoc=strtoupper(trim($_POST['obs_doc']));    
        $situaDoc=strtoupper(trim($_POST['situa_doc']));        
                
        $data=array(  
            'estado'=>'ACTIVO',
            'fecha_recibido'=>$fechaRecep,            
            'tipo'=>$tipoDoc,
            'origen'=>$origenDoc,
            'referencia'=>$refDoc,
            'fecha_doc'=>$fechaDoc,
            'cant_pag'=>$pagDoc,
            'obs'=>$obsDoc,
            'situa'=>$situaDoc,
                       
            'edit_doc'=>SESSION('usuario'),
            'fecha_edit'=>$fechaActual, 
        );
        $HtModel->update($id_ht, $data);
    }
}
