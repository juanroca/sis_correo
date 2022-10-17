<?php
namespace App\Models;
use CodeIgniter\Model;

class MHt extends Model{
    protected $table = 'estado';
    protected $primaryKey = 'id_estado';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'detalle',
        'fecha_hora',        
        'id_documento',
                        
        'crea_estado',
        'fecha_crea',
        'edit_estado',
        'fecha_edit',
        'eli_estado',
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
