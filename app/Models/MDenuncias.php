<?php
namespace App\Models;
use CodeIgniter\Model;

class MDenuncias extends Model{
    protected $table = 'denuncias';
    protected $primaryKey = 'id_denuncias';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'unidad',
        'division',
        'fecha_r',
        'hora_r',

        'fecha_e',
        'hora_e',
        'lugar_e',
        'naturaleza_e',

        'nombres_d',
        'paterno_d',
        'materno_d',
        'nomcompleto_d',
        'ci_d',
        'fechanac_d',
        'sexo_d',
        'edad_d',
        'ecivil_d',
        'nacionalidad_d',
        'profesion_d',
        'domicilio_d',
        'telf_d',

        'tipo_v',
        'nombres_v',
        'paterno_v',
        'materno_v',
        'nomcompleto_v',
        'ci_v',
        'nacionalidad_v',
        'domicilio_v',
        'telf_v',

        'tipo_s',
        'nombres_s',
        'paterno_s',
        'materno_s',
        'nomcompleto_s',
        'ci_s',
        'nacionalidad_s',
        'domicilio_s',
        'telf_s',

        'detalle',
        'asignado',
        'fiscal',
        'autor',
        'editor',
        'fecha_edi',
        'hora_edi',       
        
        'estado',
        'delete_user',
    ];

    public function info_denuncias(){        
        $this->select('*');        
        $this->where('estado', "ACTIVO");        
        $this->orderBy('fecha_e', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

    public function detalle_denuncia($id_denuncias){
        $this->select('*');
        $this->where('id_denuncias', $id_denuncias);
        $resultado=$this->first();
        return $resultado;
    }

    public function buscar_denuncias($txt_buscar){
        
        $this->select('*');
        $this->like('ci_d', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('paterno_d', $txt_buscar);
        $this->orLike('materno_d', $txt_buscar);
        $this->orLike('nombres_d', $txt_buscar);
        $resultado=$this->findAll();
        return $resultado;
    }

    public function contar_des(){
        $this->select('*');
        $this->where('situacion_denuncias', 'DESAPARECIDO(A)');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function contar_bus(){
        $this->select('*');
        $this->where('situacion_denuncias', 'BUSCADO(A)');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function contar_enc(){
        $this->select('*');
        $this->where('situacion_denuncias', 'ENCONTRADO(A)');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function totalP(){
        $this->select('*');
        //$this->where('id_denuncias', '');
        $resultado=$this->countAllResults();
        return $resultado;        
    }
}
?>