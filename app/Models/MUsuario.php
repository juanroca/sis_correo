<?php
namespace App\Models;
use CodeIgniter\Model;

class MUsuario extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'estado',
        'id_funcionario',
        'ci_fun',
        'login_usu',
        'password',
        'rol_usu',
        'id_oficina',

        'crea_usu',
        'fecha_crea',
        'edit_usu',
        'fecha_edi',
        'eli_usu',
        'fecha_eli',
        ];

        public function lista_usuarios(){
            $this->select('*');
            $this->where('estado', 'ACTIVO');
            $this->orderBy('id_usuario', 'ASC');
            $resultado=$this->findAll();
            return $resultado;        
        }

        public function lista_estructurada_consulta(){
            $this-> select('usuario.id_usuario, usuario.login_usu, usuario.rol_usu, funcionario.grado, funcionario.nombre, funcionario.ap_paterno, funcionario.ap_materno, funcionario.ci_fun, oficina.oficina');
            $this->join('funcionario', 'funcionario.id_funcionario=usuario.id_funcionario');
            $this->join('oficina', 'oficina.id_oficina=usuario.id_oficina');
            $resultado=$this->findAll();
            //var_dump($resultado);
            return $resultado;
        }

        public function info_usuario($idUsuario){
            $this->select('*');
            $this->where('id_usuario', $idUsuario);
            $resultado=$this->first();
            return $resultado;
        }

        public function contar_u_admin(){
            $this->select('*');
            $this->where('rol_usu', 'ADMINISTRADOR');
            $resultado=$this->countAllResults();
            return $resultado;        
        }
    
        public function contar_u_consu(){
            $this->select('*');
            $this->where('rol_usu', 'CONSULTOR');
            $resultado=$this->countAllResults();
            return $resultado;        
        }
    
        public function totalU(){
            $this->select('*');
            //$this->where('id_perdes', '');
            $resultado=$this->countAllResults();
            return $resultado;        
        }


    public function ingresar($datos){
        //var_dump($datos);
        $this->select('*');
        $this->where('login_usu', $datos['usuario']);
        $resultado=$this->first();
        return $resultado;
    }
    public function buscar_usuario($txt_buscar){
        
        $this->select('*');
        $this->like('ci_usu', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('paterno_usu', $txt_buscar);
        $this->orLike('materno_usu', $txt_buscar);
        $this->orLike('nombres_usu', $txt_buscar);
        $this->orLike('unidad_usu', $txt_buscar);
        $resultado=$this->findAll();
        return $resultado;
    }
}
?>