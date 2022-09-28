<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MContarC;


class CPanelCasos extends BaseController
{

    public function index(){
        $CasosModel=new MContarC();
        $contador=array(               
            'TotalC'=>$CasosModel->totalC(), 
            'TotalCHoy'=>$CasosModel->totalCHoy(),            
            'TotalCAyer'=>$CasosModel->totalCAyer(),
            
            'ContCT1'=>$CasosModel->contC1(),            
            'ContCT2'=>$CasosModel->contC2(),
            'ContCT3'=>$CasosModel->contC3(),
            'ContCT4'=>$CasosModel->contC4(),
            'ContCT5'=>$CasosModel->contC5(),
            'ContCT6'=>$CasosModel->contC6(),
            'ContCT7'=>$CasosModel->contC7(),
            'ContCT8'=>$CasosModel->contC8(),
            'ContCT9'=>$CasosModel->contC9(),
            'ContCT10'=>$CasosModel->contC10(),
            'ContCT11'=>$CasosModel->contC11(),
            'ContCT12'=>$CasosModel->contC12(),
            'ContCT13'=>$CasosModel->contC13(),
            'ContCT14'=>$CasosModel->contC14(),
            'ContCT15'=>$CasosModel->contC15(),
            'ContCT16'=>$CasosModel->contC16(),
            'ContCT17'=>$CasosModel->contC17(),
            'ContCT18'=>$CasosModel->contC18(),
            
            'ContCHoy1'=>$CasosModel->contCHoy1(),
            'ContCHoy2'=>$CasosModel->contCHoy2(),
            'ContCHoy3'=>$CasosModel->contCHoy3(),
            'ContCHoy4'=>$CasosModel->contCHoy4(),
            'ContCHoy5'=>$CasosModel->contCHoy5(),
            'ContCHoy6'=>$CasosModel->contCHoy6(),
            'ContCHoy7'=>$CasosModel->contCHoy7(),
            'ContCHoy8'=>$CasosModel->contCHoy8(),
            'ContCHoy9'=>$CasosModel->contCHoy9(),
            'ContCHoy10'=>$CasosModel->contCHoy10(),
            'ContCHoy11'=>$CasosModel->contCHoy11(),
            'ContCHoy12'=>$CasosModel->contCHoy12(),
            'ContCHoy13'=>$CasosModel->contCHoy13(),
            'ContCHoy14'=>$CasosModel->contCHoy14(),
            'ContCHoy15'=>$CasosModel->contCHoy15(),
            'ContCHoy16'=>$CasosModel->contCHoy16(),
            'ContCHoy17'=>$CasosModel->contCHoy17(),
            'ContCHoy18'=>$CasosModel->contCHoy18(),


            'ContCAyer1'=>$CasosModel->contCAyer1(),
            'ContCAyer2'=>$CasosModel->contCAyer2(),
            'ContCAyer3'=>$CasosModel->contCAyer3(),
            'ContCAyer4'=>$CasosModel->contCAyer4(),
            'ContCAyer5'=>$CasosModel->contCAyer5(),
            'ContCAyer6'=>$CasosModel->contCAyer6(),
            'ContCAyer7'=>$CasosModel->contCAyer7(),
            'ContCAyer8'=>$CasosModel->contCAyer8(),
            'ContCAyer9'=>$CasosModel->contCAyer9(),
            'ContCAyer10'=>$CasosModel->contCAyer10(),
            'ContCAyer11'=>$CasosModel->contCAyer11(),
            'ContCAyer12'=>$CasosModel->contCAyer12(),
            'ContCAyer13'=>$CasosModel->contCAyer13(),
            'ContCAyer14'=>$CasosModel->contCAyer14(),
            'ContCAyer15'=>$CasosModel->contCAyer15(),
            'ContCAyer16'=>$CasosModel->contCAyer16(),
            'ContCAyer17'=>$CasosModel->contCAyer17(),
            'ContCAyer18'=>$CasosModel->contCAyer18(),

         
            
        );  
        
        echo view('header');
        echo view('asideEpi');
        echo view('/panel/VPanelC', $contador);
		echo view('footer');
    }
}