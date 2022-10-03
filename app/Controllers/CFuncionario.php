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
            'Funcionario'=>$FuncionarioModel->info_Funcionario($id_Funcionario)
        );
        echo view('Funcionario/DetalleFuncionario',$Funcionario);
    }

    function FRegFuncionario(){
        echo view('header');
        echo view('asideFuncionario');
        echo view('/Funcionario/FRegistroFuncionario');
		echo view('footer');
    }

    function RegistroFuncionario(){
        $fechaActual=date('m-d-Y h:i:s');
        $FuncionarioModel=new MFuncionario();
        
        $Funcionario=trim($_POST['login']);
        $password=password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
        $rol=strtoupper(trim($_POST['rol']));
        $grado=trim($_POST['grado']);
        $nombres=strtoupper(trim($_POST['nombres']));
        $apPaterno=strtoupper(trim($_POST['apPaterno']));
        $apMaterno=strtoupper(trim($_POST['apMaterno']));    
        $ci=trim($_POST['ci']);
        $telefFuncionario=trim($_POST['telefono']);
        $unidad=strtoupper(trim($_POST['unidad']));
                
        $data=array(  
            'estado' => 'ACTIVO',          
            
            'grado_usu'=>$grado,
            'nombres_usu'=>$nombres,
            'paterno_usu'=>$apPaterno,
            'materno_usu'=>$apMaterno,
            'ci_usu'=>$ci,
            'telefono_usu'=>$telefFuncionario,
            'unidad_usu'=>$unidad,

            'login_usu'=>$Funcionario,
            'password'=>$password,
            'rol_usu'=>$rol,

            'crea_usu'=> session('Funcionario'),
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
            'Funcionario'=>$FuncionarioModel->info_Funcionario($id_Funcionario)
        );
        echo view('Funcionario/FEliminarFuncionario', $Funcionario);
    }

    function EliminarFuncionario(){
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'elimina_usu' => session('Funcionario'),
            'fecha_eli' => $fechaActual,
        );
        $FuncionarioModel->update($id_Funcionario, $data); //update actualiza los datos del id_tic
    }

    function FEdiUsaurio(){
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);
        $Funcionario=array('Funcionario'=>$FuncionarioModel->info_Funcionario($id_Funcionario));
        echo view('Funcionario/FEdicionFuncionario', $Funcionario);
    }

    function EdicionFuncionario(){
        $fechaActual=date('m-d-Y h:i:s');
        $FuncionarioModel=new MFuncionario();
        $id_Funcionario=$this->request->uri->getSegment(3);

        $password=password_hash(trim($_POST['password']),PASSWORD_DEFAULT);     
        $rol=strtoupper(trim($_POST['rol']));
        $grado=trim($_POST['grado']);
        $nombres=strtoupper(trim($_POST['nombres']));
        $apPaterno=strtoupper(trim($_POST['apPaterno']));
        $apMaterno=strtoupper(trim($_POST['apMaterno']));    
        $ci=trim($_POST['ci']);
        $telefFuncionario=trim($_POST['telefono']);
        $unidad=strtoupper(trim($_POST['unidad']));
        
        $data=array(
            'password'=>$password,
            'rol_usu'=>$rol,
            'grado_usu'=>$grado,
            'nombres_usu'=>$nombres,
            'paterno_usu'=>$apPaterno,
            'materno_usu'=>$apMaterno,
            'ci_usu'=>$ci,
            'telefono_usu'=>$telefFuncionario,
            'unidad_usu'=>$unidad,

            'edit_usu'=> session('Funcionario'),
            'fecha_edit_usu'=>$fechaActual, 
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
