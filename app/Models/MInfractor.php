<?php
namespace App\Models;
use CodeIgniter\Model;

$hoy=date('Y-m-d');
$semana=date('W');
$mes=date('m');
$anio=date('Y');

class MInfractor extends Model{
    protected $table = 'infractor';
    protected $primaryKey = 'id_infractor';
    protected $returnType = 'array';    
    protected $allowedFields = [        
        'unidad',
        'ci',
        'nombres',
        'ap_paterno',
        'ap_materno',
        'completo_nom',
        'alias',
        'sexo',
        'especialidad',
        'fecha_nac',
        'domicilio',
        'telf',
        'tatuajes',
        'cicatriz',
        'otros',
        'foto1',
        'foto2',

        'usuario_crea',
        'fecha_crea',
        'hora_crea',
        'editor',
        'fecha_edi',
        'hora_edi',
        'estado',
        'delete_user',
    ];

    public function info_infractor(){
        $this->select('*');
        $this->where('estado', 'ACTIVO');
        $this->orderBy('fecha_crea', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

    public function info_detalle($id_infractor){
        $this->select('*');
        $this->where('id_infractor', $id_infractor);
        $resultado=$this->first();
        return $resultado;
    }

    public function buscar_infractor($txt_buscar){        
        $this->select('*');
        $this->like('completo_nom', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('ci', $txt_buscar);
        $this->where('estado', "ACTIVO");
        $this->orderBy('fecha_crea', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

}
?>