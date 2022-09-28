<?php
namespace App\Models;
use CodeIgniter\Model;

$hoy=date('Y-m-d');
$semana=date('W');
$mes=date('m');
$anio=date('Y');

class MTic extends Model{
    protected $table = 'tic';
    protected $primaryKey = 'id_tic';
    protected $returnType = 'array';    
    protected $allowedFields = [        
        'estado',
        'dpto',
        'munic',
        'uni',
        'num_tic',
        'asociacion',
        'tipo',
        
        'nombres',
        'paterno',
        'materno',
        'completo',
        'lic',
        'cat_lic',
        'lugarnac',
        'fechanac',
        'sexo',
        'edad',
        'ecivil',        
        'domicilio',
        'telf',
        't_sangre',
        
        'clase_v',
        'placa_v',
        'crpva_v',
        'interno',

        'foto1',
        'foto2',
        
        'fecha_ini',
        'fecha_fin',
        
        'autor',
        'fecha_crea',
        'hora_crea',
        'editor',
        'fecha_edit',
        'hora_edit',
        'borrar',
        'fecha_del',
        'hora_del',
    ];

    public function lista_tic(){
        $this->select('*');
        $this->where('estado', 'ACTIVO');
        $this->orderBy('fecha_crea', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

    public function info_detalle($id_tic){
        $this->select('*');
        $this->where('id_tic', $id_tic);
        $resultado=$this->first();
        return $resultado;
    }

    public function buscar_tic($txt_buscar){        
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