<input type="hidden" name="opcion" value="modificar_paciente">
<div role="tabpanel" class="tab-pane fade in active" id="datos_personales" aria-labelledby="home-tab">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            <label for="apellido_paciente"><strong class="text-forms-pacientes">Apellido: </strong></label><input class="form-control" type="text" name="apellido_paciente" id="apellido_paciente" value="<?php echo $llena_paciente['apellido_pac']; ?>" />
        </div>
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            <label for="nombre_paciente"><strong class="text-forms-pacientes">Nombre: </strong></label><input class="form-control" type="text" name="nombre_paciente" id="nombre_paciente" value="<?php echo $llena_paciente['nombre_pac']; ?>" />
        </div>
        <div class="col-md-3 col-sm-8 col-xs-10">
            <label for="nacimiento_pac"><strong class="text-forms-pacientes">Fecha de nacimiento: </strong></label><input class="form-control" type="date" name="nacimiento_pac" id="nacimiento_pac" onblur="edad(this.value)" value="<?php echo $llena_paciente['fecha_nacimiento']; ?>" />
        </div>
        <div class="col-md-1 col-sm-4 col-xs-2">
            <label><strong class="text-forms-pacientes">Edad: </strong></label><input class="form-control" type="text" name="edad_paciente" id="result" id="user_date" value="<?php echo $llena_paciente['edad_pac']; ?>" />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <label for="dni_paciente"><strong class="text-forms-pacientes">DNI: </strong></label>
            <input class="form-control" type="text" id="dni_paciente" value="<?php echo $llena_paciente['dni_pac']; ?>" name="dni_paciente" placeholder="DNI" />
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Teléfono: </strong></label>
            <input class="form-control" type="text" name="tel_paciente" placeholder="" value="<?php echo $llena_paciente['tel_paciente']; ?>" />
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Profesión: </strong></label>
            <input class="form-control" type="text" name="prof_paciente" placeholder="Ej... Abogada" value="<?php echo $llena_paciente['profesion_pac']; ?>" />
        </div>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Empresa: </strong></label>
            <input class="form-control" type="text" name="empresa_paciente" placeholder="..." value="<?php echo $llena_paciente['empresa_pac']; ?>" />
        </div>
    </div>
    <br />
    <div class="row" style="border:1px solid #D4FFCB ;background: linear-gradient(-50deg, rgb(226, 240, 253), rgb(212, 255, 203));">
        <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4"><br>
            <label><strong class="text-forms-pacientes">Obra Social: </strong></label>
            <select class="form-control" name="obsocial_pac" id="obsocial_pac" style="width: 100% !important">
                <option value="<?php echo $llena_paciente['obsocial_pac']; ?>"><?php echo $llena_paciente['obsocial_pac']; ?></option>
                <option disabled></option>
                <?php
                $obraSocial = mysqli_query($conexion, "select * from osociales order by nombre");
                while ($llena_obraSocial = mysqli_fetch_array($obraSocial)) {
                ?>
                    <option value="<?php echo $llena_obraSocial['nombre']; ?>"><?php echo $llena_obraSocial['nombre']; ?></option>
                <?php }
                ?>
            </select>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4"><br>
            <label><strong class="text-forms-pacientes">Plan: </strong></label>
            <input class="form-control" type="text" name="plan_osocial_pac" id="plan_osocial_pac" placeholder="..." value="<?php echo $llena_paciente['plan_obsocial_pac']; ?>" />
        </div>
        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4"><br>
            <label><strong class="text-forms-pacientes">Número de Obra social: </strong></label>
            <input class="form-control" type="text" name="nro_osocial_pac" id="nro_osocial_pac" placeholder="11111" value="<?php echo $llena_paciente['nro_obsocial_pac']; ?>" />
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
            <label><strong class="text-forms-pacientes">Vigencia Desde: </strong></label>
            <input class="form-control" type="month" name="desde_paciente" id="desde_paciente" value="<?php echo $vigencia_desde; ?>" />
            <br></div>
        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
            <?php
            $fecha_real = $llena_paciente['hasta_pac'];
            $today_2 = date('Y-m-d');
            if ($fecha_real < $today_2 && $fecha_real != "0000-00-00") {
            ?>
                <label><strong class="text-forms-pacientes">Vigencia Hasta: <span style="color: red">OJO CARNET VENCIDO</span></strong></label>
                <input class="form-control" style="border-color: red;" type="month" name="hasta_paciente" id="hasta_paciente" value="<?php echo $vigencia_hasta; ?>" />
            <?php
            } elseif ($fecha_real > $today_2 && $fecha_real != "0000-00-00") {
            ?>
                <label><strong class="text-forms-pacientes">Vigencia Hasta: </strong></label>
                <input class="form-control" type="month" name="hasta_paciente" id="hasta_paciente" value="<?php echo $vigencia_hasta; ?>" />
            <?php
            } else {
            ?>
                <label><strong class="text-forms-pacientes">Vigencia Hasta: </strong></label>
                <input class="form-control" type="month" name="hasta_paciente" id="hasta_paciente" value="<?php echo $vigencia_hasta; ?>" />
            <?php
            }
            ?>
            <br></div>
    </div><br>
    <div class="row">
        <div class="col-md-4">
            <label><strong class="text-forms-pacientes">Dirección: </strong></label>
            <input class="form-control" type="text" name="dire_paciente" placeholder="" value="<?php echo $llena_paciente['direc_pac']; ?>" />
        </div>
        <div class="col-md-4">
            <label><strong class="text-forms-pacientes">Contacto: </strong></label>
            <input class="form-control" type="text" name="contacto_paciente" placeholder="" value="<?php echo $llena_paciente['contacto_pac']; ?>" />
        </div>
        <div class="col-md-4">
            <label><strong class="text-forms-pacientes">E-mail: </strong></label>
            <input class="form-control" type="text" name="email_paciente" placeholder="ejemplo@hotmail.com" value="<?php echo $llena_paciente['mail']; ?>" />
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Grupo sanguineo: </strong></label>
            <input class="form-control" type="text" name="GS_paciente" placeholder="" value="<?php echo $llena_paciente['gru_sanguineo_pac']; ?>" />
        </div>
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Fecha de 1ra consulta: </strong></label>
            <input class="form-control" type="date" name="fecha_1_consulta_paciente" value="<?php echo $llena_paciente['fecha_primera_consulta']; ?>" />
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
            <label><strong class="text-forms-pacientes">Estado civil: </strong></label>
            <select class="form-control" name="estado_civil_paciente">
                <option value="<?php echo $llena_paciente['estado_civil_pac']; ?>"><?php echo $llena_paciente['estado_civil_pac']; ?></option>
                <option disabled></option>
                <option>Casada</option>
                <option>Divorciada</option>
                <option>Viuda</option>
                <option>Concubinato</option>
                <option>Soltera</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <label><strong class="text-forms-pacientes">Motivo de consulta: </strong></label>
            <textarea class="form-control" rows="3" name="motivo_paciente"><?php echo $llena_paciente['motivo_consulta']; ?></textarea>
        </div>
    </div>
    <hr>
    <?php
    $require_id_osocial = "select * from osociales where nombre='$obra_social_paciente'";
    $query = mysqli_query($conexion, $require_id_osocial) or die(mysqli_error($conexion));
    $llena_os = mysqli_fetch_array($query);
    $id_obraSocial = $llena_os['id'];
    ?>
    <div class="row" style="border: 2px solid pink">
        <input type="hidden" id="id_para_consulta" value="<?php echo $id; ?>">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <br>
            <h2>Cargar consulta rápida.</h2>
            <hr>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="fechaConsulta" class="dark">Fecha</label>
                <input type="date" class="form-control dark" name="fechaConsulta" id="fechaConsulta">

                <input type="hidden" name="id_os" id="id_os" value="<?= $id_obraSocial; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tipo_consulta">Tipo de consulta <span class="label label-danger" id="no_existe">¿No está?</span></label>

                <select name="tipo_consulta" class="form-control" id="tipo_consulta" style="height:34px;">
                    <?php
                    $tipo = "select * from tipo_consultas order by nombre_tipo";
                    $query = mysqli_query($conexion, $tipo) or die(mysqli_error($conexion));
                    while ($tipo = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $tipo['nombre_tipo']; ?>"><?php echo $tipo['nombre_tipo']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <small id="help_manual"><span style="color:red">*</span> Recuerde que se guardará para un próximo uso</small>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="cod" class="dark">Código</label>
                <input type="text" class="form-control dark" name="cod" id="cod" autocomplete="off" readonly>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="v_consulta" class="dark">Valor de Consulta</label>
                <input class="form-control" type="number" name="v_consulta" id="v_consulta">
                <small id="small_help" class="text-danger" style="display: none">Ingrese el valor a mano</small>
                <p style="color:#c60707; display: none" id="aguarde">Aguarde...</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="btn_insertar_consulta" class="dark">Guardar</label><br>
                <button type="button" id="btn_insertar_consulta" class="btn btn-danger btn-block">Insertar</button>
            </div>
        </div>

        <div class="col-md-2">
            <label for="">F. Presentación</label>
            <input class="form-control" type="date" name="f_presentacion" id="f_presentacion" readonly style="background-color: #fff; border:none">
        </div>
        <div class="col-md-2">
            <label for="">F. Cobro</label>
            <input class="form-control" type="date" name="f_cobro" id="f_cobro" readonly style="background-color: #fff; border:none">
        </div>
        <div class="col-md-2">
            <label for="">Liquidación</label>
            <input type="text" class="form-control" name="liq" id="liquidacion" value="<?php echo $llena_os['lugar_presentacion']; ?>" readonly style="background-color: #fff; border:none">
        </div>
        <div class="col-md-2">
            <label for="">Días p/ el cobro</label>
            <input class="form-control" type="number" name="d_cobro" id="d_cobro" value="<?php echo $llena_os['dias_cobro']; ?>" readonly style="background-color: #fff; border:none">
        </div>
        <div class="col-md-2">
            <span id="loader-consultas" style="display:none" class="loader pull-right"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
        </div>

        <div class="col-md-12 col-xs-12">
            <span class="response"></span>
            <span class="listado_consultas"></span>
        </div>
    </div>
    <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
</div>
<div class="tab-pane fade" id="Antecedentes_p" role="tabpanel" aria-labelledby="profile-tab">
    <input type="hidden" value="<?php echo $llena_paciente['id_antecedente']; ?>" name="id_antecedentes_p">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-6">
            <div class="checkbox checkbox-circle">
                <?php if ($llena_paciente['diabetes'] == "on") {
                ?>
                    <div class="checkbox checkbox-inverse">
                        <input id="ch_pac_diab" checked name="ch_pac_diab" type="checkbox">
                        <label for="ch_pac_diab">
                            Diabetes
                        </label>
                    </div>
                <?php  } else {
                ?>
                    <div class="checkbox checkbox-inverse">
                        <input id="ch_pac_diab" name="ch_pac_diab" type="checkbox">
                        <label for="ch_pac_diab">
                            Diabetes
                        </label>
                    </div>
                <?php
                } ?>
            </div>
            <div class="checkbox checkbox-circle">
                <?php if ($llena_paciente['hipertension'] == "on") {
                ?>
                    <div class="checkbox checkbox-inverse">
                        <input id="ch_pac_hiper" checked name="ch_pac_hiper" type="checkbox">
                        <label for="ch_pac_hiper">
                            Hipertensión
                        </label>
                    </div>
                <?php  } else {
                ?>
                    <div class="checkbox checkbox-custom">
                        <input id="ch_pac_hiper" name="ch_pac_hiper" type="checkbox">
                        <label for="ch_pac_hiper">
                            Hipertensión
                        </label>
                    </div>
                <?php
                } ?>
            </div>
            <div class="checkbox checkbox-circle">
                <?php if ($llena_paciente['hipotiroidismo'] == "on") {
                ?>
                    <div class="checkbox checkbox-success">
                        <input id="ch_pac_hipo" checked name="ch_pac_hipo" type="checkbox">
                        <label for="ch_pac_hipo">
                            Hipotiroidismo
                        </label>
                    </div>
                <?php  } else {
                ?>
                    <div class="checkbox checkbox-success">
                        <input id="ch_pac_hipo" name="ch_pac_hipo" type="checkbox">
                        <label for="ch_pac_hipo">
                            Hipotiroidismo
                        </label>
                    </div>
                <?php
                } ?>
            </div>
            <div class="checkbox checkbox-danger checkbox-circle">
                <?php if ($llena_paciente['tabaquismo'] == "on") {
                ?>
                    <div class="checkbox checkbox-danger">
                        <input id="ch_pac_tabaq" checked name="ch_pac_tabaq" type="checkbox">
                        <label for="ch_pac_tabaq">
                            Tabaquismo
                        </label>
                    </div>
                <?php  } else {
                ?>
                    <div class="checkbox checkbox-danger">
                        <input id="ch_pac_tabaq" name="ch_pac_tabaq" type="checkbox">
                        <label for="ch_pac_tabaq">
                            Tabaquismo
                        </label>
                    </div>
                <?php
                } ?>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-6">
            <div class="col-md-6">
                <label><strong class="text-forms-pacientes">Peso: </strong></label>
                <input id="dividendo1" class="form-control" autocomplete="off" type="text" name="peso_pac" value="<?php echo $llena_paciente['peso']; ?>" />
            </div>
            <div class="col-md-6">
                <label><strong class="text-forms-pacientes">Altura: </strong></label>
                <input id="dividendo2" class="form-control" autocomplete="off" type="text" name="altura_pac" value="<?php echo $llena_paciente['altura']; ?>" />
                <br>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <label><strong class="text-forms-pacientes">IMC: </strong></label>
            <input id="resultado" class="form-control" type="text" name="imc_pac" placeholder="" value="<?php echo $llena_paciente['imc']; ?>" />
        </div>
    </div><br>
    <!--Cierro row-->
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-6">
            <label><strong class="text-forms-pacientes">Antecedentes Alérgicos: </strong></label>
            <textarea class="form-control" rows="2" name="ant_alergicos_pac"><?php echo $llena_paciente['antecedentes_alergico']; ?></textarea>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-6">
            <label><strong class="text-forms-pacientes">Antecedentes Clínicos: </strong></label>
            <textarea class="form-control" rows="2" name="ant_clinicos_pac"><?php echo $llena_paciente['antecedentes_clinicos']; ?></textarea>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-6">
            <label><strong class="text-forms-pacientes">Antecedentes Quirúrgicos: </strong></label>
            <textarea class="form-control" rows="2" name="ant_quir_pac"><?php echo $llena_paciente['antecedentes_quirurgicos']; ?></textarea>
        </div>
    </div><br>
    <!--Cierro row-->
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Fármacos: </strong></label>
            <textarea class="form-control" rows="5" name="farmacos_pac"><?php echo $llena_paciente['farmacos']; ?></textarea>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <label><strong class="text-forms-pacientes">Notas: </strong></label>
            <br>
            <textarea class="form-control" rows="5" name="notas_heredo_fam_pac"><?php echo $llena_paciente['notas_antecedentes']; ?></textarea>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
            <label><strong class="text-forms-pacientes">Antecedentes Heredo-Familiares: </strong></label>
        </div>
        <hr>
        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
            <div class="form-group">
                <label class="sr-only"></label>
                <div class="input-group">
                    <div class="input-group-addon">Madre: </div>
                    <input type="text" class="form-control" id="madre_pac" name="madre_pac" value="<?php echo $llena_paciente['madre']; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
            <div class="form-group">
                <label class="sr-only"></label>
                <div class="input-group">
                    <div class="input-group-addon">Padre: </div>
                    <input type="text" class="form-control" id="padre_pac" name="padre_pac" value="<?php echo $llena_paciente['padre']; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
            <div class="form-group">
                <label class="sr-only"></label>
                <div class="input-group">
                    <div class="input-group-addon">Otros: </div>
                    <input type="text" class="form-control" id="otros_pac" name="otros_pac" value="<?php echo $llena_paciente['otros_antecedentes']; ?>">
                </div>
            </div>
        </div>
    </div>
    <!--Cierro row-->
    <hr>
    <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
</div>

<div class="tab-pane fade" id="Antecedentes_g" role="tabpanel" aria-labelledby="dropdown1-tab">
    <input type="hidden" value="<?php echo $llena_paciente['id_ginecoObs']; ?>" name="id_antecedentes_g">
    <div class="row">
        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-edit"></i> Menarca</span>
                <input type="text" class="form-control" id="menarca_pac" value="<?php echo $llena_paciente['menarca_pac']; ?>" name="menarca_pac">
            </div>
        </div>
        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-6">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-edit"></i> RM </span>
                <input type="text" class="form-control" id="rm_pac" value="<?php echo $llena_paciente['rm_pac']; ?>" name="rm_pac">
            </div>
        </div>
        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-edit"></i> Menopausia </span>
                <input type="text" class="form-control" id="menopausia_pac" value="<?php echo $llena_paciente['menopausia_pac']; ?>" name="menopausia_pac">
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-4 col-sm-8">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">Gestas: </strong></label>
                <input class="form-control" type="text" name="gestas_pac" value="<?php echo $llena_paciente['gestas_pac']; ?>" />
            </div>
        </div>
        <div class="col-md-2 col-sm-4">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">Partos: </strong></label>
                <input class="form-control" type="text" name="partos_pac" value="<?php echo $llena_paciente['partos_pac']; ?>" />
            </div>
        </div>
        <div class="col-md-2 col-sm-4">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">CS: </strong></label>
                <input class="form-control" type="text" name="cs_pac" value="<?php echo $llena_paciente['cs_pac']; ?>" />
            </div>
        </div>
        <div class="col-md-2 col-sm-4">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">AB: </strong></label>
                <input class="form-control" type="text" name="ab_pac" value="<?php echo $llena_paciente['ab_pac']; ?>" />
            </div>
        </div>
        <div class="col-md-2 col-sm-4">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">EE: </strong></label>
                <input class="form-control" type="text" name="ee_pac" value="<?php echo $llena_paciente['ee_pac']; ?>" />
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">FUM: </strong></label>
                <input class="form-control" type="date" name="fum_pac" value="<?php echo $llena_paciente['fum_pac']; ?>" />
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="form-group">
                <label><strong class="text-forms-pacientes">Dismenorrea (si / no): </strong></label>
                <input class="form-control" type="text" name="dismenorrea_pac" value="<?php echo $llena_paciente['dismenorrea_pac']; ?>" />
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-2 col-sm-4">
            <label>
                <strong class="text-forms-pacientes">Anticoncepción: </strong>
            </label>
        </div>
        <div class="col-md-4 col-sm-8">
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="tipo_anticoncep_pac" value="<?php echo $llena_paciente['tipo_anticoncep_pac']; ?>" />
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="tiempo_anticoncep_pac" value="<?php echo $llena_paciente['tiempo_anticoncep_pac']; ?>" />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="notas_anticoncep_pac" placeholder="NOTAS"><?php echo $llena_paciente['notas_anticoncep_pac']; ?></textarea>
            </div>
        </div>
    </div>
    <!--Cierra row-->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cirug_ginec_pac"><strong class="text-forms-pacientes">Cirugías Ginecológicas: </strong></label>
                <textarea class="form-control" rows="3" name="cirug_ginec_pac" placeholder="Ej: 21/10/2015 ----> Parto natural."><?php echo $llena_paciente['cirug_ginec_pac']; ?></textarea>
            </div>
        </div>
    </div>
    <hr>
    <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
</div>