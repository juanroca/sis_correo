<?php

namespace App\Controllers;

use App\Filters\sesion;
use App\Models\MContarA;


class CPanelActividades extends BaseController
{

    public function index(){
        $ContActividad=new MContarA();
        $contAHoyorA=array(              
            'TotalA'=>$ContActividad->totalA(),
            'TotalAHoy'=>$ContActividad->totalAHoy(),
            'TotalAAyer'=>$ContActividad->totalAAyer(),
            
                        
            'ContAT1'=>$ContActividad->contA1(),
            'ContAT2'=>$ContActividad->contA2(),
            'ContAT3'=>$ContActividad->contA3(),
            'ContAT4'=>$ContActividad->contA4(),
            'ContAT5'=>$ContActividad->contA5(),
            'ContAT6'=>$ContActividad->contA6(),
            'ContAT7'=>$ContActividad->contA7(),
            'ContAT8'=>$ContActividad->contA8(),
            'ContAT9'=>$ContActividad->contA9(),
            'ContAT10'=>$ContActividad->contA10(),
            'ContAT11'=>$ContActividad->contA11(),
            'ContAT12'=>$ContActividad->contA12(),
            'ContAT13'=>$ContActividad->contA13(),

            'ContAHoy1'=>$ContActividad->contAHoy1(),
            'ContAHoy2'=>$ContActividad->contAHoy2(),
            'ContAHoy3'=>$ContActividad->contAHoy3(),
            'ContAHoy4'=>$ContActividad->contAHoy4(),
            'ContAHoy5'=>$ContActividad->contAHoy5(),
            'ContAHoy6'=>$ContActividad->contAHoy6(),
            'ContAHoy7'=>$ContActividad->contAHoy7(),
            'ContAHoy8'=>$ContActividad->contAHoy8(),
            'ContAHoy9'=>$ContActividad->contAHoy9(),
            'ContAHoy10'=>$ContActividad->contAHoy10(),
            'ContAHoy11'=>$ContActividad->contAHoy11(),
            'ContAHoy12'=>$ContActividad->contAHoy12(),
            'ContAHoy13'=>$ContActividad->contAHoy13(),
               
            'ContAAyer1'=>$ContActividad->contAAyer1(),
            'ContAAyer2'=>$ContActividad->contAAyer2(),
            'ContAAyer3'=>$ContActividad->contAAyer3(),
            'ContAAyer4'=>$ContActividad->contAAyer4(),
            'ContAAyer5'=>$ContActividad->contAAyer5(),
            'ContAAyer6'=>$ContActividad->contAAyer6(),
            'ContAAyer7'=>$ContActividad->contAAyer7(),
            'ContAAyer8'=>$ContActividad->contAAyer8(),
            'ContAAyer9'=>$ContActividad->contAAyer9(),
            'ContAAyer10'=>$ContActividad->contAAyer10(),
            'ContAAyer11'=>$ContActividad->contAAyer11(),
            'ContAAyer12'=>$ContActividad->contAAyer12(),
            'ContAAyer13'=>$ContActividad->contAAyer13(),
        ); 
        
        echo view('header');
        echo view('asideEpi');
        echo view('/panel/VPanelA',$contAHoyorA);
        //echo view('/panel/VPanelAyer',$activAyer);
		echo view('footer');
    }
}