<?php
namespace App\Models;
use CodeIgniter\Model;


class MContarC extends Model{
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
    public function contC1(){
        $this->select('*');
        $this->where('clasific', 'ESCANDALO EN VIA PUBLICA');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC2(){
        $this->select('*');
        $this->where('clasific', 'FALTAMIENTO A LA AUTORIDAD');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC3(){
        $this->select('*');
        $this->where('clasific', 'RIÑAS Y PELEAS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC4(){
        $this->select('*');
        $this->where('clasific', 'HURTO/ROBO');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC5(){
        $this->select('*');
        $this->where('clasific', 'AUXILIO A PERSONA');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC6(){
        $this->select('*');
        $this->where('clasific', 'RECUPERACION DE ESPACIOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC7(){
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD EN INSTALACIONES VULNERABLES');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC8(){
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD CENTROS EDUCATIVOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC9(){
        $this->select('*');
        $this->where('clasific', 'EXTRAVIO DE PERSONAS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC10(){
        $this->select('*');
        $this->where('clasific', 'HECHOS DE TRANSITO');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC11(){
        $this->select('*');
        $this->where('clasific', 'HECHOS LEY 348');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC12(){
        $this->select('*');
        $this->where('clasific', 'HECHOS LEY 259');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC13(){
        $this->select('*');
        $this->where('clasific', 'OTROS DELITOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC14(){
        $this->select('*');
        $this->where('clasific', 'OTRAS FALTAS Y CONTRAVENCIONES');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC15(){
        $this->select('*');
        $this->where('clasific', 'COOPERACION A OTRAS UNIDADES POLICIALES E INSTITUCIONES DEL ESTADO');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC16(){
        $this->select('*');
        $this->where('clasific', 'INCENDIO');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC17(){
        $this->select('*');
        $this->where('clasific', 'OCTOS OBSENOS');
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contC18(){
        $this->select('*');
        $this->where('clasific', 'SUSTANCIAS CONTROLADAS (1008)');
        $resultado=$this->countAllResults();
        return $resultado;
    }


//**************************************************************
//*************CONTAR ACTIVIDADES DEL DÍA*****************************
    public function contCHoy1(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'ESCANDALO EN VIA PUBLICA');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy2(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'FALTAMIENTO A LA AUTORIDAD');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy3(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'RIÑAS Y PELEAS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy4(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'HURTO/ROBO');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy5(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'AUXILIO A PERSONA');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy6(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'RECUPERACION DE ESPACIOS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy7(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD EN INSTALACIONES VULNERABLES');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy8(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD CENTROS EDUCATIVOS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy9(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'EXTRAVIO DE PERSONAS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy10(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'HECHOS DE TRANSITO');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy11(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'HECHOS LEY 348');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy12(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'HECHOS LEY 259');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy13(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'OTROS DELITOS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy14(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'OTRAS FALTAS Y CONTRAVENCIONES');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy15(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'COOPERACION A OTRAS UNIDADES POLICIALES E INSTITUCIONES DEL ESTADO');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy16(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'INCENDIO');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy17(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'OCTOS OBSENOS');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCHoy18(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('clasific', 'SUSTANCIAS CONTROLADAS (1008)');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;
    }

//**************************************************************
//*************CONTAR CASOS DE AYER***************************** 
    public function contCAyer1(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'ESCANDALO EN VIA PUBLICA');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer2(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'FALTAMIENTO A LA AUTORIDAD');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer3(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'RIÑAS Y PELEAS');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer4(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'HURTO/ROBO');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer5(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'AUXILIO A PERSONA');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer6(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'RECUPERACION DE ESPACIOS');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer7(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD EN INSTALACIONES VULNERABLES');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer8(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'SEGURIDAD CENTROS EDUCATIVOS');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer9(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'EXTRAVIO DE PERSONAS');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer10(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'HECHOS DE TRANSITO');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer11(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'HECHOS LEY 348');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer12(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'HECHOS LEY 259');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer13(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'OTROS DELITOS');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer14(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'OTRAS FALTAS Y CONTRAVENCIONES');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer15(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'COOPERACION A OTRAS UNIDADES POLICIALES E INSTITUCIONES DEL ESTADO');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer16(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'INCENDIO');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer17(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'OCTOS OBSENOS');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    public function contCAyer18(){
        $ayer= date('Y-m-d',strtotime('-1 day'));
        $this->select('*');
        $this->where('clasific', 'SUSTANCIAS CONTROLADAS (1008)');
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }
    

//*************CONTAR CASOS Y ACTIVIDADES TOTALES*****************************

    public function totalC(){
        $this->select('*');
        $this->where('estado', "ACTIVO");
        $this->where('clase', 'INTERVENCION');
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function totalCHoy(){
        $hoy=date('Y-m-d');
        $this->select('*');
        $this->where('estado', "ACTIVO");
        $this->where('clase', 'INTERVENCION');
        $this->Where('fecha_hecho', $hoy);
        $resultado=$this->countAllResults();
        return $resultado;        
    }

    public function totalCAyer(){
        $hoy= date( 'Y-m-d' );
        $ayer= date('Y-m-d',strtotime($hoy.'-1 day'));
        $this->select('*');       
        $this->where('estado', "ACTIVO");
        $this->where('clase', 'INTERVENCION');        
        $this->where('fecha_hecho', $ayer);
        $resultado=$this->countAllResults();
        return $resultado;
    }

}
