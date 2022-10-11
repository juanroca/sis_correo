<?php
namespace App\Models;
use CodeIgniter\Model;

class MHt extends Model{
    protected $table = 'hoja_ruta';
    protected $primaryKey = 'id_ht';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'estado',
        'fecha',
        'destinatario',
        'instruccion',
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

    }
