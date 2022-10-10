<?php
namespace App\Models;
use CodeIgniter\Model;

class MDocumento extends Model{
    protected $table = 'documento';
    protected $primaryKey = 'id_documento';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'estado',
        'fecha_recibido',
        'num_ht',
        'tipo',
        'origen',
        'referencia',
        'fecha_doc',
        'cant_pag',
        'obs',
        'situa',
                
        'crea_doc',
        'fecha_crea',
        'edit_doc',
        'fecha_edit',
        'eli_doc',
        'fecha_eli',
        ];
        
        public function lista_documentos(){
            $this->select('*');
            $this->where('estado', 'ACTIVO');
            $this->orderBy('fecha_recibido', 'ASC');
            $resultado=$this->findAll();
            return $resultado;        
        }
        public function info_documento($id_documento){
            $this->select('*');
            $this->where('id_documento', $id_documento);
            $resultado=$this->first();
            return $resultado;
        }

    }
