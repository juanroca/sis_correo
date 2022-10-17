<?php

namespace App\Controllers;
use App\Models\MUsuario;
use App\Models\MFuncionario;

date_default_timezone_set('America/La_Paz');
$fechaHoy=date('m-d-Y h:i:s');//obtener la fecha del sistema

class CUsuario extends BaseController
{
    public function index(){
        $usuarioModel=new MUsuario();
        //$usuario=array('lista_usuarios'=>$usuarioModel->lista_usuarios());
        $usuario=array('lista_usuarios'=>$usuarioModel->lista_estructurada_consulta());
        //var_dump($usuario);
        echo view('header');
        echo view('asideAdmin');
        echo view('/usuario/VUsuario',$usuario);
		echo view('footer');
    }

    public function DetUsuario(){
        $usuarioModel=new MUsuario();
        //recuperar la parte del id de la URL
        $id_usuario=$this->request->uri->getSegment(3);      //http://localhost/unipol_proyectos/index.php/(0) CUsuario/(1) DetalleUsuario/(2)"+id(3)
        //enviando el id al modelo para hacer la consulta
        $usuario=array(
            'usuario'=>$usuarioModel->info_usuario($id_usuario)
        );
        echo view('usuario/DetalleUsuario',$usuario);
    }

    function FRegUsuario(){
        echo view('header');
        echo view('asideUsuario');
        echo view('/usuario/FRegistroUsuario');
		echo view('footer');
    }

    function RegistroUsuario(){
        $fechaActual=date('m-d-Y h:i:s');
        $usuarioModel=new MUsuario();
        
        $usuario=trim($_POST['login']);
        $password=password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
        $rol=strtoupper(trim($_POST['rol']));
        $grado=trim($_POST['grado']);
        $nombres=strtoupper(trim($_POST['nombres']));
        $apPaterno=strtoupper(trim($_POST['apPaterno']));
        $apMaterno=strtoupper(trim($_POST['apMaterno']));    
        $ci=trim($_POST['ci']);
        $telefUsuario=trim($_POST['telefono']);
        $unidad=strtoupper(trim($_POST['unidad']));
                
        $data=array(  
            'estado' => 'ACTIVO',          
            
            'grado_usu'=>$grado,
            'nombres_usu'=>$nombres,
            'paterno_usu'=>$apPaterno,
            'materno_usu'=>$apMaterno,
            'ci_usu'=>$ci,
            'telefono_usu'=>$telefUsuario,
            'unidad_usu'=>$unidad,

            'login_usu'=>$usuario,
            'password'=>$password,
            'rol_usu'=>$rol,

            'crea_usu'=> session('usuario'),
            'fecha_crea'=>$fechaActual,
            /*'edit_usu'=>$editor,
            'fecha_edit_usu'=>$fechaActual,*/            
        );
        $usuarioModel->insert($data);
    }

    function FEliUsuario(){        
        $usuarioModel=new MUsuario();
        $id_usuario=$this->request->uri->getSegment(3);
        $usuario=array(
            'usuario'=>$usuarioModel->info_usuario($id_usuario)
        );
        echo view('usuario/FEliminarUsuario', $usuario);
    }

    function EliminarUsuario(){
        $usuarioModel=new MUsuario();
        $id_usuario=$this->request->uri->getSegment(3);
        $fechaActual = date('Y-m-d');

        $data = array(
            'estado' => 'ELIMINADO',                 //entre '' va el nombre del campo de la Base de Datos
            'elimina_usu' => session('usuario'),
            'fecha_eli' => $fechaActual,
        );
        $usuarioModel->update($id_usuario, $data); //update actualiza los datos del id_tic
    }

    function FEdiUsaurio(){
        $usuarioModel=new MUsuario();
        $id_usuario=$this->request->uri->getSegment(3);
        $usuario=array('usuario'=>$usuarioModel->info_usuario($id_usuario));
        echo view('usuario/FEdicionUsuario', $usuario);
    }

    function EdicionUsuario(){
        $fechaActual=date('m-d-Y h:i:s');
        $usuarioModel=new MUsuario();
        $id_usuario=$this->request->uri->getSegment(3);

        $password=password_hash(trim($_POST['password']),PASSWORD_DEFAULT);     
        $rol=strtoupper(trim($_POST['rol']));
        $grado=trim($_POST['grado']);
        $nombres=strtoupper(trim($_POST['nombres']));
        $apPaterno=strtoupper(trim($_POST['apPaterno']));
        $apMaterno=strtoupper(trim($_POST['apMaterno']));    
        $ci=trim($_POST['ci']);
        $telefUsuario=trim($_POST['telefono']);
        $unidad=strtoupper(trim($_POST['unidad']));
        
        $data=array(
            'password'=>$password,
            'rol_usu'=>$rol,
            'grado_usu'=>$grado,
            'nombres_usu'=>$nombres,
            'paterno_usu'=>$apPaterno,
            'materno_usu'=>$apMaterno,
            'ci_usu'=>$ci,
            'telefono_usu'=>$telefUsuario,
            'unidad_usu'=>$unidad,

            'edit_usu'=> session('usuario'),
            'fecha_edit_usu'=>$fechaActual, 
        );
        $usuarioModel->update($id_usuario, $data);
    }

    //Función para Buscar Usuario
    function BusUsuario(){
        $usuarioModel=new MUsuario();
        $dato_bus=trim($_POST['txt_bus']); //dato que se captura desde teclado
        $data=array(
            "lista_usuarios"=>$usuarioModel->buscar_usuario($dato_bus)
        );
        echo view('usuario/ListaBuscarUsuario', $data);

    }
}
