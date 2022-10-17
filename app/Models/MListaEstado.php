<?php
namespace App\Models;
use CodeIgniter\Model;

class MListaEstado extends Model{
    protected $table = 'lista_estado';
    protected $primaryKey = 'id_est';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'list_estado',        
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
