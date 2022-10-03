<?php
namespace App\Models;
use CodeIgniter\Model;

class MFuncionario extends Model{
    protected $table = 'funcionario';
    protected $primaryKey = 'ci_funcionario';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'estado',
        'nro_escalafon',
        'grado',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'telefono',
        'cargo',
        'id_oficina',
        'id_user',
        
        'crea_fun',
        'fecha_crea',
        'edit_fun',
        'fecha_edit',
        'eli_fun',
        'fecha_eli',
        ];
        
        public function lista_funcionarios(){
            $this->select('*');
            $this->where('estado', 'ACTIVO');
            $this->orderBy('fecha_crea', 'ASC');
            $resultado=$this->findAll();
            return $resultado;        
        }

    }
