<?php
$hoy=date('Y-m-d');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#8FBC8F">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>TOTAL CASOS ATENDIDOS: <?php echo $cont_t_caso; ?> </h5>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <h5>TOTAL ACTIVIDADES REALIZADAS: <?php echo $cont_t_actividad; ?></h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">CASOS ATENDIDOS</h3>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 300px">CASO</th>
                  <th>TOTAL</th>
                  <th>HOY</th>
                  <th>AYER</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>ESCANDALO EN VIA PUBLICA</td>
                  <td><?php echo $contCaso1; ?></td>
                  <td><?php echo $contCasoD1; ?></td>

                </tr>
                <tr>
                  <td>FALTAMIENTO A LA AUTORIDAD</td>
                  <td><?php echo $contCaso2; ?></td>
                  <td><?php echo $contCasoD2; ?></td>

                </tr>
                <tr>
                  <td>RIÑAS Y PELEAS</td>
                  <td><?php echo $contCaso3; ?></td>
                  <td><?php echo $contCasoD3; ?></td>

                </tr>
                <tr>
                  <td>HURTO/ROBO</td>
                  <td><?php echo $contCaso4; ?></td>
                  <td><?php echo $contCasoD4; ?></td>

                </tr>
                <tr>
                  <td>AUXILIO A PERSONAS</td>
                  <td><?php echo $contCaso5; ?></td>
                  <td><?php echo $contCasoD5; ?></td>

                </tr>
                <tr>
                  <td>RECUPERACION DE ESPACIOS PUBLICOS</td>
                  <td><?php echo $contCaso6; ?></td>
                  <td><?php echo $contCasoD6; ?></td>

                </tr>
                <tr>
                  <td>SEGURIDAD EN INSTALACIONES VULNERABLES</td>
                  <td><?php echo $contCaso7; ?></td>
                  <td><?php echo $contCasoD7; ?></td>

                </tr>
                <tr>
                  <td>SEGURIDAD CENTROS EDUCATIVOS</td>
                  <td><?php echo $contCaso8; ?></td>
                  <td><?php echo $contCasoD8; ?></td>

                </tr>
                <tr>
                  <td>EXTRAVIO DE PERSONAS</td>
                  <td><?php echo $contCaso9; ?></td>
                  <td><?php echo $contCasoD9; ?></td>

                </tr>
                <tr>
                  <td>HECHOS DE TRANSITO</td>
                  <td><?php echo $contCaso10; ?></td>
                  <td><?php echo $contCasoD10; ?></td>

                </tr>
                <tr>
                  <td>HECHOS DE LEY 348</td>
                  <td><?php echo $contCaso11; ?></td>
                  <td><?php echo $contCasoD11; ?></td>

                </tr>
                <tr>
                  <td>HECHOS LEY 259</td>
                  <td><?php echo $contCaso18; ?></td>
                  <td><?php echo $contCasoD18; ?></td>

                </tr>
                <tr>
                  <td>OTROS DELITOS</td>
                  <td><?php echo $contCaso12; ?></td>
                  <td><?php echo $contCasoD12; ?></td>

                </tr>
                <tr>
                  <td>OTRAS FALTAS Y CONTRAVENCIONES</td>
                  <td><?php echo $contCaso13; ?></td>
                  <td><?php echo $contCasoD13; ?></td>

                </tr>
                <tr>
                  <td>COOPERACION A OTRAS UNIDADES E INSTITUCIONES DEL ESTADO</td>
                  <td><?php echo $contCaso14; ?></td>
                  <td><?php echo $contCasoD14; ?></td>

                </tr>
                <tr>
                  <td>INCENDIOS</td>
                  <td><?php echo $contCaso15; ?></td>
                  <td><?php echo $contCasoD15; ?></td>

                </tr>
                <tr>
                  <td>ACTOS OBSENOS</td>
                  <td><?php echo $contCaso16; ?></td>
                  <td><?php echo $contCasoD16; ?></td>

                </tr>
                <tr>
                  <td>SUSTANCIAS CONTROLADAS LEY 1008</td>
                  <td><?php echo $contCaso17; ?></td>
                  <td><?php echo $contCasoD17; ?></td>

                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th style="width: 300px">TOTAL</th>
                  <th><?php echo $total_Reg_Casos; ?></th>
                  <th><?php echo $total_Reg_Casos_Dia; ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ACCIONES PREVENTIVAS</h3>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 300px">ACCION</th>
                  <th>Total</th>
                  <th>HOY</th>
                  <th>AYER</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>RECORRIDO POR UNIDADES EDUCATIVAS</td>
                  <td><?php echo $contActividad1;?></td>
                  <td><?php echo $contActividadD1;?></td>
                  <td><?php echo $contActivAyer1;?></td>
                </tr>
                <tr>
                  <td>PRIMEROS AUXILIOS</td>
                  <td><?php echo $contActividad2; ?></td>
                  <td><?php echo $contActividadD2; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>ATENCION ANTE EMERGENCIAS SANITARIAS</td>
                  <td><?php echo $contActividad3; ?></td>
                  <td><?php echo $contActividadD3; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>RECUPERACION DE ESPACIOS PUBLICOS Y AUXILIO EN LOS BARRIOS</td>
                  <td><?php echo $contActividad4; ?></td>
                  <td><?php echo $contActividadD4; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>ORIENTACION Y RECOMENDACION A LOS CIUDADANOS</td>
                  <td><?php echo $contActividad5; ?></td>
                  <td><?php echo $contActividadD5; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>PREVENCION Y CONTROL AL EXPENDIO Y CONSUMO DE BEBIDAS ALCOHOLICAS, SUST. CONTROLADAS Y ANTIPANDILLAS</td>
                  <td><?php echo $contActividad6; ?></td>
                  <td><?php echo $contActividadD6; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>SEGURIDAD EN HOSPITALES</td>
                  <td><?php echo $contActividad7; ?></td>
                  <td><?php echo $contActividadD7; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>RESGUARDO DE ENTIDADES FINANCIERAS, CENTROS COMERCIALES Y SURTIDORES</td>
                  <td><?php echo $contActividad8; ?></td>
                  <td><?php echo $contActividadD8; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>DISPOSITIVOS ESTACIONARIOS DE CONTROL (DEC.s)</td>
                  <td><?php echo $contActividad9; ?></td>
                  <td><?php echo $contActividadD9; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>SEGURIDAD VIAL Y CONTROL TRAFICO VEHICULAR</td>
                  <td><?php echo $contActividad10; ?></td>
                  <td><?php echo $contActividadD10; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>ATENCION EN EMERGENCIAS Y DESASTRES</td>
                  <td><?php echo $contActividad11; ?></td>
                  <td><?php echo $contActividadD11; ?></td>
                  <td></td>
                </tr>                
                <tr>
                  <td>RECORRIDO PREVENTIVO POR PUNTOS CRITICOS</td>
                  <td><?php echo $contActividad12; ?></td>
                  <td><?php echo $contActividadD12; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>CONTACTO CON VECINOS</td>
                  <td><?php echo $contActividad13; ?></td>
                  <td><?php echo $contActividadD13; ?></td>
                  <td></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th style="width: 300px">TOTAL</th>
                  <th><?php echo $total_Reg_Actividad; ?></th>
                  <th><?php echo $total_Reg_Actividad_Dia; ?></th>
                  <th><?php echo $total_Reg_Actividad_Ayer; ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

      </div>
    </div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->