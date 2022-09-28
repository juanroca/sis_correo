<?php
namespace App\Models;
use CodeIgniter\Model;

$hoy=date('Y-m-d');
$semana=date('W');
$mes=date('m');
$anio=date('Y');

class MInfraccion extends Model{
    protected $table = 'infraccion';
    protected $primaryKey = 'id_infraccion';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'unidad',
        'ci',
        'nat_hecho',
        'fecha_hecho',
        'lugar_hecho',
        'detalle_hecho',

        'usuario_crea',
        'fecha_crea',
        'hora_crea',
        'editor',
        'fecha_edi',
        'hora_edi',
    ];

    public function info_detalle($id_infraccion){
        $this->select('*');
        $this->where('id_infraccion', $id_infraccion);
        $resultado=$this->first();
        return $resultado;
    }

    public function totalReginfraccionDia(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clase', 'INTERVENCION');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;        
    }
    public function totalRegActivDia(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clase', 'PREVENTIVO');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function totalRegActivAyer(){
        $hoy= date( 'Y-m-d' );
        $ayer= date('Y-m-d',strtotime($hoy.'-1 day'));
        $this->select('*');       
        $this->where('clase', 'PREVENTIVO');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }

}
?>