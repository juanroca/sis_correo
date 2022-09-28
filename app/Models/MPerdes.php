<?php
namespace App\Models;
use CodeIgniter\Model;

class MPerdes extends Model{
    protected $table = 'perdestrata';
    protected $primaryKey = 'id_perdes';
    protected $returnType = 'array';    
    protected $allowedFields = [
        'caso_reg',
        'fecha_reg',
        'hora_reg',
        'fecha_des',
        'hora_des',
        'lugar_des',
        'situa',
        'fecha_ap',
        'unidad',
        'asig',        
        
        'paren_d',
        'nom_d',
        'pat_d',
        'mat_d',
        'completo_d',
        'ci_d',
        'fnac_d',
        'edad_d',
        'nat_d',
        'prov_d',
        'dpto_d',
        'nal_d',
        'ocup_d',
        'eciv_d',
        'dm_d',
        'telf_d',        
        
        'tipo_des',
        'edad_des',
        'genero_des',
        'nom_des',
        'pat_des',
        'mat_des',
        'completo_des',
        'ci_des',
        'fnac_des',        
        'eciv_des',
        'dm_des',
        'nat_des',
        'prov_des',
        'dpto_des',
        'nal_des',
        'ocup_des',
        'telf_des',

        'tez_des',
        'cab_des',
        'ojo_des',
        'contex_des',
        'esta_des',
        'peso_des',
        'lun_des',
        'cic_des',
        'tatu_des',
        'heri_des',
        'lesi_des',
        'vsup_des',
        'vinf_des',
        'zap_des',
        'epers_des',
        'eaje_des',
        'det_des',

        'foto1',  
        'foto2',
        
        'delito_b',
        'orden_b',
        'entidad_b',
        'autoridad_b',
        'fecha_b',
        'situ_b',
        'obs_b',
        'foto_b',

        'autor',
        'edit',
        'fecha_edit',
        'hora_edit',

        'estado',
        'tipo',
        'delete_user',

        'consulta',
        'fecha_c',
        'hora_c'

    ];

    public function mostrar_buscados(){
        $this->select('*');
        $this->where('situa', 'BUSCADO(A)');
        $resultado=$this->AllResults();
        return $resultado;        
    }

    public function info_perdes(){
        $this->select('*');
        $this->Where('estado', "ACTIVO");
        $this->where('tipo', "TRATA");        
        $this->orderBy('id_perdes', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

    public function info_profugos(){
        $this->select('*');        
        $this->Where('estado', "ACTIVO");
        $this->where('tipo', "PROFUGO");
        $this->orderBy('id_perdes', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }

    public function info_detalle($id){
        $this->select('*');
        $this->where('id_perdes', $id);
        $resultado=$this->first();
        return $resultado;
    }

    public function info_consultaPB(){
        $this->select('*');
        $this->where('situa', "BUSCADO(A)");
        $this->orWhere('situa', "DESAPARECIDO(A)");
        $this->orderBy('id_perdes', 'DESC');
        $resultado=$this->paginate(20);
        return $resultado;
    }



    public function buscar_perdesCompleto($txt_buscar){        
        $this->select('*');
        $this->like('caso_reg', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('ci_des', $txt_buscar);
        $this->orLike('completo_des', $txt_buscar);
        $this->orderBy('id_perdes', 'DESC');
        $resultado=$this->findAll();
        return $resultado;
    }

    public function buscar_consultas($txt_buscar){        
        
        $this->select('*');
        $this->WhereIn('situa', ['BUSCADO(A)', 'DESAPARECIDO(A)']); //WhereIn es para array's
        $this->Like('ci_des', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('completo_des', $txt_buscar);
        $this->orderBy('id_perdes', 'DESC');

        $resultado=$this->findAll();        
        return $resultado;
    }

    public function buscar_buscadosCompleto($txt_buscar){        
        $this->select('*');
        $this->like('ci_b', $txt_buscar); //like se utiliza para buscar caracteres dentro de un campo
        $this->orLike('completo_b', $txt_buscar);
        $resultado=$this->findAll();
        return $resultado;
    }
}
?>