<?php
namespace App\Models;
use CodeIgniter\Model;

class MRel_htofi extends Model{
    protected $table = 'relacion_htofi';
    protected $primaryKey = 'id_relacionhtofi';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'id_ht',
        'id_oficina',
        'fecha',
        'autor',
        ];
        
        public function lista_hts(){
            $this->select('*');
            $this->where('estado', 'ACTIVO');
            $this->orderBy('fecha_ht', 'ASC');
            $resultado=$this->findAll();
            return $resultado;        
        }
        public function info_ht($id_ht){
            $this->select('*');
            $this->where('id_ht', $id_ht);
            $resultado=$this->first();
            return $resultado;
        }

        public function lista_VHt(){
            $this-> select('usuario.id_usuario, usuario.login_usu, usuario.rol_usu, funcionario.grado, funcionario.nombre, funcionario.ap_paterno, funcionario.ap_materno, funcionario.ci_fun, oficina.oficina');
            $this->join('funcionario', 'funcionario.id_funcionario=usuario.id_funcionario');
            $this->join('oficina', 'oficina.id_oficina=usuario.id_oficina');
            $resultado=$this->findAll();
            //var_dump($resultado);
            return $resultado;
        }

    }
