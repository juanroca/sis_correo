<?php
namespace App\Models;
use CodeIgniter\Model;

$hoy=date('Y-m-d');
$semana=date('W');
$mes=date('m');
$anio=date('Y');

class MCasos extends Model{
    protected $table = 'epi_casos';
    protected $primaryKey = 'id_casos';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'uni',
        'tipo',
        'clase',
        'clasific',
        'fecha_hecho',
        'hora_hecho',
        'dia',

        'nat_hecho',
        'clave_pri',
        'clave_sec',
        'clave_ter',
        'lug_hecho',
        'barrio',
        'uv',
        'latitud',
        'longitud',

        'denun',
        'telf_d',

        'modulo',
        'patru',
        'zona_cpu',
        'jp',

        'novedad',
        'uni_fin',
        'nom_fin',
        'obs',

        'foto1',
        'foto2',

        'autor',
        'fecha_reg',
        'hora_reg',
        'editor',
        'fecha_edi',
        'hora_edi',

        'delete_user',
        'estado',
    ];

    public function info_detalle($id_casos){
        $this->select('*');
        $this->where('id_casos', $id_casos);
        $resultado=$this->first();
        return $resultado;
    }

    public function info_casos(){        
        $this->select('*');        
        $this->where('estado', "ACTIVO");
        $this->where('clase', "INTERVENCION");        
        $this->orderBy('fecha_hecho', 'ASC');
        $resultado=$this->findAll();
        return $resultado;
    }

    public function excel_casos($dato_bus){        
        $this->select('*');
        $this->like('uni', $dato_bus);        
        $this->where('estado', "ACTIVO");
        $this->where('clase', "INTERVENCION");        
        $this->orderBy('fecha_hecho', 'DESC');
        $resultado=$this->findAll();
        echo "<script>console.log('dato bus query" . $dato_bus . "');</script>";
        echo "<script>console.log('data query" . json_encode($resultado) . "');</script>";
        return $resultado;
    }

    public function excel_actividades($dato_bus){        
        $this->select('*');
        $this->like('uni', $dato_bus);        
        $this->where('estado', "ACTIVO");
        $this->where('clase', "PREVENTIVO");        
        $this->orderBy('fecha_hecho', 'DESC');
        $resultado=$this->findAll();
        echo "<script>console.log('dato bus query" . $dato_bus . "');</script>";
        echo "<script>console.log('data query" . json_encode($resultado) . "');</script>";
        return $resultado;
    }

    public function info_modulos(){
        $this->select('*');
        $this->where('estado', "ACTIVO");
        $this->where('clase', "PREVENTIVO");
        $this->orderBy('fecha_hecho', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

    public function info_tmodulos(){
        $this->select('*');
        $this->where('estado', "ACTIVO");
        $this->where('clase', "PREVENTIVO");
        $this->orderBy('fecha_hecho', 'DESC');
        $resultado=$this->findAll();
        return $resultado;
    }

    public function buscar_casos($txt_buscar){        
        $this->select('*');
        $this->like('nat_hecho', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('clave_pri', $txt_buscar);
        $this->orLike('clave_sec', $txt_buscar);
        $this->orLike('uni', $txt_buscar);
        $this->orLike('modulo', $txt_buscar);
        $this->where('tipo', "CASO");
        $this->orderBy('fecha_hecho', 'DESC');
        $resultado=$this->paginate(10);
        return $resultado;
    }

    public function buscar_modulos($txt_buscarM){        
        $this->select('*');        
        $this->like('nat_hecho', $txt_buscarM); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('uni', $txt_buscarM);
        $this->orLike('modulo', $txt_buscarM);
        $this->where('tipo', "ACTIVIDAD");
        $resultado=$this->paginate(4);
        return $resultado;
    }

    public function contar_tipo_caso(){
        $this->select('*');
        $this->where('tipo', 'CASO');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function contar_tipo_actividad(){
        $this->select('*');
        $this->where('tipo', 'ACTIVIDAD');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

//*****CONTAR DATOS */
    public function cont_activ_ayer1(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RECORRIDO POR UNIDADES EDUCATIVAS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer2(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'PRIMEROS AUXILIOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer3(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'ATENCION ANTE EMERGENCIAS SANITARIAS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer4(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RECUPERACION DE ESPACIOS PUBLICOS Y AUXILIO EN LOS BARRIOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer5(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'ORIENTACION Y RECOMENDACION A LOS CIUDADANOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer6(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'PREVENCION Y CONTROL AL EXPENDIO Y CONSUMO DE BEBIDAS ALCOHOLICAS, SUST. CONTROLADAS Y ANTIPANDILLAS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer7(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'SEGURIDAD EN HOSPITALES');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer8(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RESGUARDO DE ENTIDADES FINANCIERAS, CENTROS COMERCIALES Y SURTIDORES');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer9(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'DISPOSITIVOS ESTACIONARIOS DE CONTROL (DEC.s)');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer10(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'SEGURIDAD VIAL Y CONTROL TRAFICO VEHICULAR');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer11(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'ATENCION EN EMERGENCIAS Y DESASTRES');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer12(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RECORRIDO PREVENTIVO POR PUNTOS CRITICOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function cont_activ_ayer13(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'CONTACTO CON VECINOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    

//*************CONTAR CASOS Y ACTIVIDADES TOTALES*****************************

    public function totalRegCasos(){
        $this->select('*');
        $this->where('clase', 'INTERVENCION');
        $resultado=$this->countAllResults();
        return $resultado;        
    }
    public function totalRegActividad(){
        $this->select('*');
        $this->where('clase', 'PREVENTIVO');
        $resultado=$this->countAllResults();
        return $resultado;        
    }


    public function totalRegCasosDia(){
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