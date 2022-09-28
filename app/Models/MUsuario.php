<?php
namespace App\Models;
use CodeIgniter\Model;

class MUsuario extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'estado',
        'dpto',
        'provincia',
        'municipio',
        'unidad',

        'grado_usu',
        'nombres_usu',
        'paterno_usu',
        'materno_usu',
        'ci_usu',
        'telefono_usu',
        'login_usu',
        'password',
        'rol_usu',

        'crear',
        'fecha_crea',
        'hora_crea',
        'editar',
        'fecha_edi',
        'hora_edi',
        'eliminar',
        'fecha_eli',
        'hora_eli',
        ];

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
    public function info_usuario($idUsuario){
        $this->select('*');
        $this->where('id_usuario', $idUsuario);
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