<?php

namespace App\Controllers;
use App\Models\MFuncionario;

date_default_timezone_set('America/La_Paz');
$fechaHoy=date('m-d-Y h:i:s');//obtener la fecha del sistema

class CFuncionario extends BaseController
{
    public function index(){
        $FuncionarioModel=new MFuncionario();
        $Funcionario=array('lista_funcionarios'=>$FuncionarioModel->lista_funcionarios());
        echo view('header');
        echo view('asideFuncionario');
        echo view('/funcionario/VFuncionario',$Funcionario);
		echo view('footer');
    }

    public function DetFuncionario(){
        $FuncionarioModel=new MFuncionario();
        //recuperar la parte del id de la URL
        $id_Funcionario=$this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CFuncionario/(1) DetalleFuncionario/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $Funcionario=array(
            'Funcionario'=>$FuncionarioModel->info_funcionario($id_Funcionario)
        );
        echo view('funcionario/DetalleFuncionario',$Funcionario);
    }

    function FRegFuncionario(){
        echo view('header');
        echo view('asideFuncionario');
        echo view('/funcionario/FRegistroFuncionario');
		echo view('footer');
    }

    function RegistroFuncionario(){
        $fechaActual=date('Y-m-d h:i:s');
        $FuncionarioModel=new MFuncionario();
        
        $ci=strtoupper(trim($_POST['ci_fun']));
        $unidad=strtoupper(trim($_POST['unidad']));
        $grado=trim($_POST['grado']);
        $nombres=strtoupper(trim($_POST['nombres']));
        $apPaterno=strtoupper(trim($_POST['apPaterno']));
        $apMaterno=strtoupper(trim($_POST['apMaterno']));    
        $escalafon=strtoupper(trim($_POST['escalafon']));
        $telefFuncionario=trim($_POST['telefono']);
        $oficina=strtoupper(trim($_POST['oficina']));
                
        $data=array(  
            'estado' => 'ACTIVO', 
            'ci_fun'=>$ci,         
            'unidad' => $unidad,
            'grado'=>$grado,
            'nombre'=>$nombres,
            'ap_paterno'=>$apPaterno,
            'ap_materno'=>$apMaterno,
            'nro_escalafon'=>$escalafon,
            'telefono'=>$telefFuncionario,
            'oficina'=>$oficina,

            'crea_fun'=>SESSION('usuario'),
            'fecha_crea'=>$fechaActual,
                       
            /*'edit_usu'=>$editor,
            'fecha_edit_usu'=>$fechaActual,*/            
        );
        $FuncionarioModel->insert($data);
    }

    function FEliFuncionario(){        
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);
        $Funcionario=array(
            'Funcionario'=>$FuncionarioModel->info_funcionario($id_Funcionario)
        );
        echo view('funcionario/FEliminarFuncionario', $Funcionario);
    }

    function EliminarFuncionario(){
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d h:i:s');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'elimina_usu' => session('usuario'),
            'fecha_eli' => $fechaActual,
        );
        $FuncionarioModel->update($id_Funcionario, $data); //update actualiza los datos del id_tic
    }

    function FEdiFuncionario(){
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);
        $Funcionario=array('Funcionario'=>$FuncionarioModel->info_funcionario($id_Funcionario));
        echo view('Funcionario/FEdicionFuncionario', $Funcionario);
    }

    function EdicionFuncionario(){
        $fechaActual=date('Y-m-d h:i:s');
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);

        $ci=strtoupper(trim($_POST['ci_fun']));
        $unidad=strtoupper(trim($_POST['unidad']));
        $grado=trim($_POST['grado']);
        $nombres=strtoupper(trim($_POST['nombres']));
        $apPaterno=strtoupper(trim($_POST['apPaterno']));
        $apMaterno=strtoupper(trim($_POST['apMaterno']));    
        $escalafon=strtoupper(trim($_POST['escalafon']));
        $telefFuncionario=trim($_POST['telefono']);
        $oficina=strtoupper(trim($_POST['oficina']));
        
        $data=array( 
            'ci_fun'=>$ci,         
            'unidad' => $unidad,
            'grado'=>$grado,
            'nombre'=>$nombres,
            'ap_paterno'=>$apPaterno,
            'ap_materno'=>$apMaterno,
            'nro_escalafon'=>$escalafon,
            'telefono'=>$telefFuncionario,
            'oficina'=>$oficina,

            //'crea_fun'=>SESSION('usuario'),
            //'fecha_crea'=>$fechaActual,
                       
            'edit_fun'=>SESSION('usuario'),
            'fecha_edit'=>$fechaActual, 
        );
        $FuncionarioModel->update($id_Funcionario, $data);
    }

    //Función para Buscar Funcionario
    function BusFuncionario(){
        $FuncionarioModel=new MFuncionario();
        $dato_bus=trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data=array(
            "lista_Funcionarios"=>$FuncionarioModel->buscar_Funcionario($dato_bus)
        );
        echo view('Funcionario/ListaBuscarFuncionario', $data);

    }
}
