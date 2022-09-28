<?php
namespace App\Models;
use CodeIgniter\Model;


class MContarA extends Model{
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
    ];

//CONTAR ACTIVIDADES
    public function contA1(){
        $this->select('*');
        $this->where('clasific', 'RECORRIDO POR UNIDADES EDUCATIVAS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA2(){
        $this->select('*');
        $this->where('clasific', 'PRIMEROS AUXILIOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA3(){
        $this->select('*');
        $this->where('clasific', 'ATENCION ANTE EMERGENCIAS SANITARIAS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA4(){
        $this->select('*');
        $this->where('clasific', 'RECUPERACION DE ESPACIOS PUBLICOS Y AUXILIO EN LOS BARRIOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA5(){
        $this->select('*');
        $this->where('clasific', 'ORIENTACION Y RECOMENDACION A LOS CIUDADANOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA6(){
        $this->select('*');
        $this->where('clasific', 'PREVENCION Y CONTROL AL EXPENDIO Y CONSUMO DE BEBIDAS ALCOHOLICAS, SUST. CONTROLADAS Y ANTIPANDILLAS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA7(){
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD EN HOSPITALES');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA8(){
        $this->select('*');
        $this->where('clasific', 'RESGUARDO DE ENTIDADES FINANCIERAS, CENTROS COMERCIALES Y SURTIDORES');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA9(){
        $this->select('*');
        $this->where('clasific', 'DISPOSITIVOS ESTACIONARIOS DE CONTROL (DEC)');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA10(){
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD VIAL Y CONTROL TRAFICO VEHICULAR');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA11(){
        $this->select('*');
        $this->where('clasific', 'ATENCION EN EMERGENCIAS Y DESASTRES');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA12(){
        $this->select('*');
        $this->where('clasific', 'RECORRIDO PREVENTIVO POR PUNTOS CRITICOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contA13(){
        $this->select('*');
        $this->where('clasific', 'CONTACTO CON VECINOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }

//**************************************************************
//*************CONTAR ACTIVIDADES DEL DÍA*****************************
    public function contAHoy1(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'RECORRIDO POR UNIDADES EDUCATIVAS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAHoy2(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'PRIMEROS AUXILIOS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy3(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'ATENCION ANTE EMERGENCIAS SANITARIAS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy4(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'RECUPERACION DE ESPACIOS PUBLICOS Y AUXILIO EN LOS BARRIOS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy5(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'ORIENTACION Y RECOMENDACION A LOS CIUDADANOS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy6(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'PREVENCION Y CONTROL AL EXPENDIO Y CONSUMO DE BEBIDAS ALCOHOLICAS, SUST. CONTROLADAS Y ANTIPANDILLAS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy7(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD EN HOSPITALES');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy8(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'RESGUARDO DE ENTIDADES FINANCIERAS, CENTROS COMERCIALES Y SURTIDORES');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy9(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'DISPOSITIVOS ESTACIONARIOS DE CONTROL (DEC.s)');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy10(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD VIAL Y CONTROL TRAFICO VEHICULAR');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy11(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'ATENCION EN EMERGENCIAS Y DESASTRES');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy12(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'RECORRIDO PREVENTIVO POR PUNTOS CRITICOS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }
    public function contAHoy13(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'CONTACTO CON VECINOS');
        $resultado=$this->countAllResults();
        $this->Where('fecha_hecho', $hoy);
        return $resultado;
    }

//**************************************************************
//*************CONTAR CASOS DE AYER***************************** 
    public function contAAyer1(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RECORRIDO POR UNIDADES EDUCATIVAS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer2(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'PRIMEROS AUXILIOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer3(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'ATENCION ANTE EMERGENCIAS SANITARIAS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer4(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RECUPERACION DE ESPACIOS PUBLICOS Y AUXILIO EN LOS BARRIOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer5(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'ORIENTACION Y RECOMENDACION A LOS CIUDADANOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer6(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'PREVENCION Y CONTROL AL EXPENDIO Y CONSUMO DE BEBIDAS ALCOHOLICAS, SUST. CONTROLADAS Y ANTIPANDILLAS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer7(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'SEGURIDAD EN HOSPITALES');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer8(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RESGUARDO DE ENTIDADES FINANCIERAS, CENTROS COMERCIALES Y SURTIDORES');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer9(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'DISPOSITIVOS ESTACIONARIOS DE CONTROL (DEC.s)');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer10(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'SEGURIDAD VIAL Y CONTROL TRAFICO VEHICULAR');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer11(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'ATENCION EN EMERGENCIAS Y DESASTRES');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer12(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'RECORRIDO PREVENTIVO POR PUNTOS CRITICOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contAAyer13(){        
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');       
        $this->where('clasific', 'CONTACTO CON VECINOS');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    

//*************CONTAR CASOS Y ACTIVIDADES TOTALES*****************************

    public function totalA(){
        $this->select('*');
        $this->where('estado', "ACTIVO");
        $this->where('clase', 'PREVENTIVO');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function totalAHoy(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('estado', "ACTIVO");
        $this->where('clase', 'PREVENTIVO');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function totalAAyer(){
        $hoy= date( 'Y-m-d' );
        $ayer= date('Y-m-d',strtotime($hoy.'-1 day'));
        $this->select('*');       
        $this->where('estado', "ACTIVO");
        $this->where('clase', 'PREVENTIVO');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }

}
?>