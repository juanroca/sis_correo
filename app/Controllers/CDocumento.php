<?php

namespace App\Controllers;
use App\Models\MDocumento;
use App\Models\MListaEstado;


date_default_timezone_set('America/La_Paz');
$fechaHoy=date('m-d-Y h:i:s');//obtener la fecha del sistema

class CDocumento extends BaseController
{
    public function index(){
        $DocumentoModel=new MDocumento();
        $documento=array('lista_documentos'=>$DocumentoModel->lista_documentos());
        echo view('header');
        echo view('asideAdmin');
        echo view('/documento/Vdocumento',$documento);
		echo view('footer');
    }

    public function DetDocumento(){
        $DocumentoModel=new MDocumento();
        //recuperar la parte del id de la URL
        $id_documento=$this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) Cdocumento/(1) Detalledocumento/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $documento=array(
            'documento'=>$DocumentoModel->info_documento($id_documento)
        );
        echo view('documento/Detalledocumento',$documento);
    }

    function FRegDocumento(){
        echo view('header');
        echo view('asideAdmin');
        echo view('/documento/FRegistroDocumento');
		echo view('footer');
    }

    function RegistroDocumento(){
        $fechaActual=date('Y-m-d h:i:s');
        $DocumentoModel=new MDocumento();
        
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
        $DocumentoModel->insert($data);
    }

    function FElidocumento(){        
        $DocumentoModel=new MDocumento();
        $id_documento=$this->request->uri->getSegment(3);
        $documento=array(
            'documento'=>$DocumentoModel->info_documento($id_documento)
        );
        echo view('documento/FEliminardocumento', $documento);
    }

    function Eliminardocumento(){
        $DocumentoModel=new MDocumento();
        $id_documento=$this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d h:i:s');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'eli_doc' => session('usuario'),
            'fecha_eli' => $fechaActual,
        );
        $DocumentoModel->update($id_documento, $data); //update actualiza los datos del id_tic
    }

    function FEdiDocumento(){
        $DocumentoModel=new MDocumento();
        $id_documento=$this->request->uri->getSegment(3);
        $documento=array('documento'=>$DocumentoModel->info_documento($id_documento));
        echo view('documento/FEdicionDocumento', $documento);
    }

    function Ediciondocumento(){
        $fechaActual=date('Y-m-d h:i:s');
        $DocumentoModel=new MDocumento();
        $id_documento=$this->request->uri->getSegment(3);

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
        $DocumentoModel->update($id_documento, $data);
    }
}
