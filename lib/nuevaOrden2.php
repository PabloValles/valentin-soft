<style>
    .nav-item>.nav-link{
        color:#ccc;
        border-color: #ccc;
        padding: 10px;
        width: 100% !important;
        border-radius: 0px;
        border-bottom-color: white;
        font-size: 17px;
    }
    .nav-item>.nav-link:hover{
        color:white;
        background-color: rgba(255, 182, 193, 0.89)
    }
    .nav-item>.nav-link.active{
        color:deeppink !important;
        border-color: deeppink !important;
        border-bottom-color: white !important;
        border-top: 3px solid deeppink;
        
    }
</style>
<?php

include("../conexion.php");
$id = $_POST['pac'];

//consulta
$sql = "select * from pacientes where id_paciente='$id'";
$query = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
$llena_paciente=mysqli_fetch_array($query);
?>

<div class="card-box" style="border-radius:0px;border:2px solid rgba(70, 132, 134, 0.72); box-shadow:8px 8px 8px rgba(0, 0, 0, 0.19)">
   <h3 style="text-align:center">Paciente: <span style="color:#00c4ff;"><?php echo $llena_paciente['apellido_pac']." ".$llena_paciente['nombre_pac'];?></span><i class="fa fa-print pull-right"></i></h3>
   <hr>
    <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#orden_principales"
               role="tab" aria-controls="home" aria-expanded="true" style="color:#000">Principales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#orden_analiticas"
               role="tab" aria-controls="profile" style="color:#000">Analíticas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#orden_embarazo"
               role="tab" aria-controls="profile" style="color:#000">Embarazo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#orden_gin"
               role="tab" aria-controls="profile" style="color:#000">Ginecológicos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#orden_practicas"
               role="tab" aria-controls="profile" style="color:#000">Prácticas</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div role="tabpanel" class="tab-pane fade in active" id="orden_principales"
             aria-labelledby="home-tab">
            <table class="table table-bordered table-hover table-striped table-condensed" id="dt_principales">
                <thead>
                    <tr>
                        <th>Detalle de la orden</th>
                        <th style="width:40px">Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Orden de consulta</td>
                        <td><a href="ordenes/orden_consulta.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Orden de PAP</td>
                        <td><a href="ordenes/orden_pap.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Recetario</td>
                        <td><a href="ordenes/orden_recetario.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Orden de Internación</td>
                        <td><a href="ordenes/orden_internacion.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Orden de Honorarios</td>
                        <td><a href="ordenes/orden_honorarios.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Visita Pre Anestesica</td>
                        <td><a href="ordenes/orden_pre_anestesica.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Eco Renal</td>
                        <td><a href="ordenes/orden_eco_renal.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Eco Tiroides</td>
                        <td><a href="ordenes/orden_eco_tiroide.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Toma de Biopsia</td>
                        <td><a href="ordenes/orden_toma_biopsia.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Eco Abdominal</td>
                        <td><a href="ordenes/orden_eco_abdominal.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="orden_analiticas" role="tabpanel"
             aria-labelledby="profile-tab">

            <table class="table table-bordered table-hover table-striped table-condensed" id="dt_analiticas">
                <thead>
                    <tr>
                        <th>Detalle de la orden</th>
                        <th style="width:40px">Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Analítica embarazada</td>
                        <td><a href="ordenes/orden_analitica_1.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Analítica clínica</td>
                        <td><a href="ordenes/orden_analitica_2.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Tipificación 1</td>
                        <td><a href="ordenes/orden_tipif.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Dosaje hormonal 1</td>
                        <td><a href="ordenes/orden_dosaje_hormonal.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Marcadores tumorales</td>
                        <td><a href="ordenes/orden_marc_tum.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Dosaje tiroideo</td>
                        <td><a href="ordenes/orden_dosaje_tiroideo.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Urocultivo</td>
                        <td><a href="ordenes/orden_urocultivo.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>SUB-UN-BETA</td>
                        <td><a href="ordenes/orden_sub.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Curva de tolerancia clínica</td>
                        <td><a href="ordenes/orden_ctgo_clinica.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Test de Combs</td>
                        <td><a href="ordenes/orden_test_coombs.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Trombofilia</td>
                        <td><a href="ordenes/orden_trombo.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Cultivo flujo completo</td>
                        <td><a href="ordenes/orden_cultivo_completo.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>HPV</td>
                        <td><a href="ordenes/orden_HPV_estudio.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Estudio ANATOMOPATOLÓGICO</td>
                        <td><a href="ordenes/orden_estudio_anatomopatologico.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="tab-pane fade" id="orden_embarazo" role="tabpanel"
             aria-labelledby="orden_embarazo">
             <table class="table table-bordered table-hover table-striped table-condensed" id="dt_emb">
                <thead>
                    <tr>
                        <th>Detalle de la orden</th>
                        <th style="width:40px">Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CTGO</td>
                        <td><a href="ordenes/orden_ctgo.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Strepto</td>
                        <td><a href="ordenes/orden_strepto.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Ecografía obstétrica</td>
                        <td><a href="ordenes/orden_eco_obstetrica.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Eco. Doppler-obstétrica fetal</td>
                        <td><a href="ordenes/orden_eco_obstetrica_fetal.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Ecocardiograma fetal</td>
                        <td><a href="ordenes/orden_eco_doppler.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>N.S.T</td>
                        <td><a href="ordenes/orden_nst.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Ecodoppler Arterias Uterinas</td>
                        <td><a href="ordenes/orden_art_uterinas.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Curso Preparto</td>
                        <td><a href="ordenes/orden_curso_preparto.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Kine Preparto</td>
                        <td><a href="ordenes/orden_kine_preparto.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Clearance</td>
                        <td><a href="ordenes/orden_clearance.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>SCREENING</td>
                        <td><a href="ordenes/orden_screening.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Vacuna</td>
                        <td><a href="ordenes/orden_vacuna.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="orden_gin" role="tabpanel"
             aria-labelledby="orden_gin">
             <table class="table table-bordered table-hover table-striped table-condensed" id="dt_gin">
                <thead>
                    <tr>
                        <th>Detalle de la orden</th>
                        <th style="width:40px">Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ECG</td>
                        <td><a href="ordenes/orden_ecg.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>DMO</td>
                        <td><a href="ordenes/orden_dmo.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Eco Ginec. transvaginal</td>
                        <td><a href="ordenes/orden_eco_ginec_trans.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Ecografía Ginecológica</td>
                        <td><a href="ordenes/orden_eco_ginec.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Mamografía bilateral</td>
                        <td><a href="ordenes/orden_mamo_bilateral.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Ecografía Mamaria Bilateral</td>
                        <td><a href="ordenes/orden_eco_mam_bilateral.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="orden_practicas" role="tabpanel"
             aria-labelledby="orden_gin">
             <table class="table table-bordered table-hover table-striped table-condensed" id="dt_gin">
                <thead>
                    <tr>
                        <th>Detalle de la orden</th>
                        <th style="width:40px">Imprimir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Coloc. DIU Milena</td>
                        <td><a href="ordenes/orden_colocacion_diu_milena.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td><b>RE-</b>Coloc. DIU Milena</td>
                        <td><a href="ordenes/orden_recolocacion_diu_milena.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Colocación de chip</td>
                        <td><a href="ordenes/orden_chip.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Extracción de chip</td>
                        <td><a href="ordenes/orden_extraccion_chip.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Colocación DIU / COBRE</td>
                        <td><a href="ordenes/orden_diu_cobre.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>EXTRACCION DIU / COBRE</td>
                        <td><a href="ordenes/orden_extraccion_diu_cobre.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Parto</td>
                        <td><a href="ordenes/orden_parto.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Cesárea</td>
                        <td><a href="ordenes/orden_cesarea.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Cirugía gral.</td>
                        <td><a href="ordenes/orden_cirugia_gral.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                    <tr>
                        <td>Informe de DIU</td>
                        <td><a href="ordenes/orden_informe_diu.php?id_orden=<?php echo $id?>" class="btn btn-custom btn-sm waves-effect waves-light"><span class="btn-label"><i class="fa fa-print"></i></span>Imprimir</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
