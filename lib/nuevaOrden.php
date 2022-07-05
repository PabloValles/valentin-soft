<style>
.form-control.disabled:hover{
    background-color: #eceeef !important;
    border-color:#ccc !important;
}
.pan{
    border:1px solid #ffffff;
    background-color: rgba(169, 169, 169, 0.4);
    box-shadow: 0px 0px 10px rgb(255, 255, 255);
    border-radius: 4px;
    padding: 10px;
    text-align: center;
    color: white;
}
.pan:hover{
    box-shadow: 0px 0px 0px rgb(0, 227, 0);
    border-color: rgb(224, 255, 224);
    background-color: rgba(0, 227, 0, 0.63);
}
h3.categ{
    text-align: center;
    padding: 10px;
    color: white;
    border-radius: 2px;
    border-bottom: 2px solid white;
}
.dropdown-item.others{
    padding: 6px;
}
.dropdown-item.others:hover{
    background-color: #ff4780;
    color: white;
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

<div class="row">
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href="ordenes/orden_consulta.php?id_orden=<?php echo $id?>"><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            Orden de consulta
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href="ordenes/orden_pap.php?id_orden=<?php echo $id?>"><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            PAP
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href="ordenes/orden_recetario.php?id_orden=<?php echo $id?>"><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            Recetario
        </div>
    </div>
    <div class="col-md-2 col-xl-offset-4 col-md-offset-4 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="btn-group">
            <button type="button" style="padding:20px; width:180px; left:1%; font-size:23px;" class="btn btn-pink dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Otras <span class="caret"></span></button>
            <div class="dropdown-menu">
                <a class="dropdown-item others" href="#"><i class="fa fa-print"></i> Orden de Internación</a>
                <a class="dropdown-item others" href="#"><i class="fa fa-print"></i> Visita Pre Anestesica</a>
                <a class="dropdown-item others" href="#"><i class="fa fa-print"></i> Eco Renal</a>
                <a class="dropdown-item others" href="#"><i class="fa fa-print"></i> Eco Tiroides</a>
            </div>
        </div>
    </div>
</div>
<br>
<h3 class="categ">Analíticas </h3><br>
<div class="row">
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href="ordenes/orden_analitica_1.php?id_orden=<?php echo $id?>"><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Analítica n° 1
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Analítica n° 2
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Tipificación
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Dosaje hormonal 1
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Marcadores tumorales
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Dosaje tiroideo
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Urocultivo
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            SUB-UN-BETA
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Tipificación
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Test de Combs
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Trombofilia
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            Cultivo flujo completo
        </div>
    </div>
</div><br>
<h3 class="categ" id="emb">Embarazo</h3><br>
<div class="row">
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            CTGO
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            Strepto
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            Ecografía obstétrica
        </div>
    </div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            Eco. Doppler-obstétrica fetal
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            Eco Doppler
        </div>
    </div>
    
</div><br>
<div class="row">
   <div class="col-md-1 col-xl-1 col-lg-1 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
            N.S.T
        </div>
    </div>
    <div class="col-md-3 col-xl-3 col-lg-3 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
             Ecodoppler Arterias Uterinas
        </div>
    </div>
    <div class="col-md-1 col-xl-1 col-lg-1 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
             Curso Preparto
        </div>
    </div>
    <div class="col-md-2 col-xl-2 col-lg-2 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
             Clearance
        </div>
    </div>
    <div class="col-md-1 col-xl-1 col-lg-1 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
             SCREENING
        </div>
    </div>
    <div class="col-md-1 col-xl-1 col-lg-1 col-sm-3 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer2.png" alt=""></a><br>
             Vacuna
        </div>
    </div>
</div><br>
<h3 class="categ" id="gin">Ginecológicos</h3><br>
<div class="row">
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            ECG
        </div>
    </div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
            DMO
        </div>
    </div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-12">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
             Eco Ginec. transvaginal
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
             Ecografía Ginecológica
        </div>
    </div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-6">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
             Mamografía bilateral
        </div>
    </div>
    <div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-12">
        <div class="pan">
            <a href=""><img src="assets/images/gallery/printer5.png" alt=""></a><br>
              Ecografía Mamaria Bilateral
        </div>
    </div>
</div><br>