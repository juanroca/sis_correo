<?php

namespace App\Controllers;

use App\Models\MAcceso;
use Mpdf\Tag\Footer;

class CAcceso extends BaseController
{
	public function index()
	{			
		echo view('index.php');	
	}

	public function acceder(){
		$loginModel=new MAcceso(); //crear instancia de MAcceso
		
		//Validación de usuario y contraseña
		if (!$this->validate(	
			['usuario'=>'required', 
			'password'=>'required|min_length[2]']))
			{
				return redirect()->to(base_url('/'))->with('errors', $this->validator->getErrors());
			}

		//recuperar datos del formulario
		$usuario=trim($_POST['usuario']); //el método trim elimina espacios
		$password=trim($_POST['password']);

		//convertir los datos de usuario y password en array
		$dato=array(
			"usuario"=>$usuario,
			//"password"=>$password
		);

		//instanciamos la clase modelo MAcceso
		$modelo=new MAcceso();
		$consulta=$modelo->ingresar($dato);
		//var_dump($consulta);
		
		//cuando $res sea null, volvemos atras
		if($consulta==null){
			return redirect()->to(base_url('/'))->with('errors', 
				[ //conjunto de errores
					"credenciales"=>"Credenciales de acceso invalidas..."
				]);
		}
		//cuando el conteo de los caracteres de $res es mayor a 0, vamos a otra vista
		if(sizeof($consulta)>0 && password_verify($password,$consulta['password'])){ //en la base de datos el valor de varchar debe estar en 255		
			$session=session(); //inicializando la sesión
			$session->set($dato);
			if ($consulta['rol_usu']=='ADMINISTRADOR'){
				echo view('header');
				echo view('asideAdmin');
				echo view('inicioAdmin');
				echo view('footer');
				
			}
			if ($consulta['rol_usu']=='ADMIN EPI'){
				echo view('header');
				//echo view('asideEpi');
				echo view('inicioEpi');
							
			}
			if ($consulta['rol_usu']=='ADMIN FELCC'){
				echo view('header');
				//echo view('asideEpi');
				echo view('inicioFelcc');
			}
			if ($consulta['rol_usu']=='ADMIN ICIA'){
				echo view('header');
        		echo view('asideIcia');
				echo view('caratulaIcia');
			}
			if ($consulta['rol_usu']=='CONSULTOR'){
				echo view('header');
				//echo view('asideEpi');
				echo view('inicioConsulta');				
			}else{
				//echo view('consulta/header2');
				//echo view('aside2');
				//echo view('consulta/inicio2');
				//echo view('consulta/footer2');
			}			
		}else{
			return redirect()->to(base_url('/'))->with('errors', 
				[ //conjunto de errores
					"credenciales"=>"Credenciales de acceso invalidas..."
				]);
			}
	}

	public function panelInicioAdmin(){
		echo view('header');
		//echo view('asideAdmin');
		echo view('inicioAdmin');
		echo view('footer');
	}

	public function salir(){
		$session=session();
		$session->destroy(); //destruye los datos de session
		return redirect()->to(base_url('/'));
	}
}