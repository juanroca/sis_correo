<?php
namespace App\Models;
use CodeIgniter\Model;

class MHt extends Model{
    protected $table = 'hoja_ruta';
    protected $primaryKey = 'id_ht';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'estado',
        'id_documento',
        'fecha',
        'oficina',
        'otra_ofi',
        'instruccion',
        'otra_inst',
        'obs_ht',
        'situa_ht',        
                        
        'crea_ht',
        'fecha_crea',
        'edit_ht',
        'fecha_edit',
        'eli_ht',
        'fecha_eli',
        ];
        
        public function lista_hts(){
            $this->select('*');
            $this->where('estado', 'ACTIVO');
            $this->orderBy('fecha', 'ASC');
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
