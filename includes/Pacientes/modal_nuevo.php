<div class="row">
    <div class="modal fade bs-nuevo-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="modal_pacientes">
        <div class="modal-dialog modal-lg">
            <div class="modal-content myModalNice" style="border-radius:0px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Paciente nuevo<button style="margin-left:5%" tabindex="0" class="btn btn-info btn-xs" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Para registrar el paciente, navegue por las pestañas para completar los datos. Al final click en Aceptar... Recuerde que solo los datos requeridos son el NOMBRE, APELLIDO y DNI... Para más ayuda recurra a la página de ayuda, o consulte el manual." data-original-title="Ayuda rápida">Necesita ayuda?
                </button></h4>
                </div>
                <form action="" method="POST" id="paciente_muevo">
                <input type="hidden" value="nuevo" name="opcion">
                <input type="hidden" value="paciente" name="tag">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div style="display:none" class="mensaje"></div>
                            <div class="error" style="display:none" id="error">
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                    <strong>ERROR !</strong>No has completado los datos principales
                                </div>
                            </div>
                            <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="#datos_personales" class="nav-link active" data-toggle="tab" aria-expanded="false"> 
                                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                        <span class="hidden-xs">Datos Personales</span> 
                                    </a> 
                                </li> 
                                <li class="nav-item"> 
                                    <a href="#antecedentes_personales" class="nav-link" data-toggle="tab" aria-expanded="false"> 
                                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                        <span class="hidden-xs">Antecedentes Personales</span> 
                                    </a> 
                                </li> 
                                <li class="nav-item"> 
                                    <a href="#antecedentes_gineco" class="nav-link" data-toggle="tab" aria-expanded="true"> 
                                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                        <span class="hidden-xs">Antecedentes Ginecoobstétricos</span> 
                                    </a> 
                                </li>
                            </ul> 
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="datos_personales">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <label for="apellido_paciente"><strong class="text-forms-pacientes">Apellido: </strong></label><input class="form-control" type="text" name="apellido_paciente" id="apellido_paciente" autocomplete="off"  placeholder="Apellido paciente"/>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <label for="nombre_paciente"><strong class="text-forms-pacientes">Nombre: </strong></label><input class="form-control" type="text" name="nombre_paciente" id="nombre_paciente" placeholder="Nombre paciente" />
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-8 col-xs-10">
                                            <label for="nacimiento_pac"><strong class="text-forms-pacientes">Fecha de nacimiento: </strong></label><input class="form-control" type="date" name="nacimiento_pac"  id="nacimiento_pac" onblur="edad(this.value)"/>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-sm-4 col-xs-2">
                                            <label><strong class="text-forms-pacientes">Edad: </strong></label><input class="form-control" type="text" name="edad_paciente" id="result" id="user_date"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <label for="dni_paciente"><strong class="text-forms-pacientes">DNI: </strong></label>
                                            <input class="form-control" type="text" id="dni_paciente" autocomplete="off" name="dni_paciente" placeholder="DNI"/>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Teléfono: </strong></label>
                                            <input class="form-control" type="text" name="tel_paciente" placeholder=""/>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Profesión: </strong></label>
                                            <input class="form-control" type="text" name="prof_paciente" placeholder="Ej... Abogada"/>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Empresa: </strong></label>
                                            <input class="form-control" type="text" name="empresa_paciente" placeholder="..."/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                                            <label><strong class="text-forms-pacientes">Obra Social: </strong></label>
                                            <select class="form-control" name="osocial_paciente">
                                                <option>-- Seleccione --</option>
                                                <?php 
                                                $obraSocial=mysqli_query($conexion,"select * from osociales order by nombre");
                                                while($llena_obraSocial=mysqli_fetch_array($obraSocial)){
                                                    ?>
                                                    <option value="<?php echo $llena_obraSocial['nombre'];?>"><?php echo $llena_obraSocial['nombre'];?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                                            <label><strong class="text-forms-pacientes">Plan: </strong></label>
                                            <input class="form-control" type="text" name="plan_osocial_pac" placeholder="..."/>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                                            <label><strong class="text-forms-pacientes">Número de Obra social: </strong></label>
                                            <input class="form-control" type="text" name="nro_osocial_pac" placeholder="11111"/>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label><strong class="text-forms-pacientes">Dirección: </strong></label>
                                            <input class="form-control" type="text" name="dire_paciente" placeholder=""/>
                                        </div>
                                        <div class="col-md-4">
                                            <label><strong class="text-forms-pacientes">Contacto: </strong></label>
                                            <input class="form-control" type="text" name="contacto_paciente" placeholder=""/>
                                        </div>
                                        <div class="col-md-4">
                                            <label><strong class="text-forms-pacientes">E-mail: </strong></label>
                                            <input class="form-control" type="text" name="email_paciente" placeholder="ejemplo@hotmail.com"/>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Grupo sanguineo: </strong></label>
                                            <input class="form-control" type="text" name="GS_paciente" placeholder=""/>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Fecha de 1ra consulta: </strong></label>
                                            <input class="form-control" type="date" name="fecha_1_consulta_paciente" value="<?php echo date("Y-m-d");?>"/>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Estado civil: </strong></label>
                                            <select class="form-control" name="estado_civil_paciente">
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
                                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                                            <label><strong class="text-forms-pacientes">Motivo de consulta: </strong></label>
                                            <textarea class="form-control" rows="3" name="motivo_paciente"></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6">
                                            <label><strong class="text-forms-pacientes">Notas adicionales</strong></label>
                                            <textarea class="form-control has success" rows="3" name="notas_adicionales_paciente"></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <div class="tab-pane fade" id="antecedentes_personales">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-sm-6">
                                            <div class="checkbox checkbox-success">
                                                <input id="ch_pac_diab" name="ch_pac_hiper" type="checkbox">
                                                <label for="ch_pac_diab">
                                                    Diabetes
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-primary">
                                                <input id="ch_pac_hiper" name="ch_pac_hiper" type="checkbox">
                                                <label for="ch_pac_hiper">
                                                    Hipertensión
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-info">
                                                <input id="ch_pac_hipo" name="ch_pac_hipo" type="checkbox">
                                                <label for="ch_pac_hipo">
                                                    Hipotiroidismo
                                                </label>
                                            </div>
                                            <div class="checkbox checkbox-danger">
                                                <input id="ch_pac_tabaq" name="ch_pac_tabaq" type="checkbox">
                                                <label for="ch_pac_tabaq">
                                                    Tabaquismo
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-6">
                                            <div class="col-md-6">
                                                <label><strong class="text-forms-pacientes">Peso: </strong></label>
                                                <input onkeyup="obtenerSuma();" id="dividendo1" class="form-control" autocomplete="off" type="text" name="peso_pac" placeholder=""/>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong class="text-forms-pacientes">Altura: </strong></label>
                                                <input onkeyup="obtenerSuma();" id="dividendo2" class="form-control" autocomplete="off" type="text" name="altura_pac" placeholder=""/>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-12">
                                            <label><strong class="text-forms-pacientes">IMC: </strong></label>
                                            <input id="resultado" class="form-control" type="text" name="imc_pac" placeholder="" value=""/>
                                        </div>
                                    </div><br><!--Cierro row-->
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-sm-6">
                                            <label><strong class="text-forms-pacientes">Antecedentes Alérgicos: </strong></label>
                                            <textarea class="form-control" rows="4" name="ant_alergicos_pac"></textarea>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-6">
                                            <label><strong class="text-forms-pacientes">Antecedentes Clínicos: </strong></label>
                                            <textarea class="form-control" rows="4" name="ant_clinicos_pac"></textarea>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-6">
                                            <label><strong class="text-forms-pacientes">Antecedentes Quirúrgicos: </strong></label>
                                            <textarea class="form-control" rows="4" name="ant_quir_pac"></textarea>
                                        </div>
                                    </div><br><!--Cierro row-->
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Fármacos: </strong></label>
                                            <textarea class="form-control" rows="5" name="farmacos_pac"></textarea>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <label><strong class="text-forms-pacientes">Notas: </strong></label>
                                            <br>
                                            <textarea class="form-control" rows="5" name="notas_heredo_fam_pac"></textarea>
                                        </div>
                                    </div><br>
                                    <div class="row">	
                                        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                            <label><strong class="text-forms-pacientes">Antecedentes Heredo-Familiares: </strong></label>
                                        </div>
                                        <hr>
                                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="sr-only" ></label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">Madre: </div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="" name="madre_pac">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="sr-only" ></label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">Padre: </div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="" name="padre_pac">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                                            <div class="form-group">
                                                <label class="sr-only" ></label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">Otros: </div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="" name="otros_pac">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Cierro row-->
                                </div> 
                                <div class="tab-pane fade" id="antecedentes_gineco">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-6">
                                           <div class="input-group">
                                               <span class="input-group-addon"><i class="fa fa-edit"></i> Menarca</span>
                                               <input type="text" class="form-control" id="menarca_pac" placeholder=" " name="menarca_pac">
                                           </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-6">
                                            <div class="input-group">
                                               <span class="input-group-addon"><i class="fa fa-edit"></i> RM </span>
                                               <input type="text" class="form-control" id="rm_pac" placeholder=" " name="rm_pac">
                                           </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12">
                                            <div class="input-group">
                                               <span class="input-group-addon"><i class="fa fa-edit"></i> Menopausia </span>
                                               <input type="text" class="form-control" id="menopausia_pac" placeholder=" " name="menopausia_pac">
                                           </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-8">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">Gestas: </strong></label>
                                                <input class="form-control" type="text" name="gestas_pac" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">Partos: </strong></label>
                                                <input class="form-control" type="text" name="partos_pac" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">CS: </strong></label>
                                                <input class="form-control" type="text" name="cs_pac" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">AB: </strong></label>
                                                <input class="form-control" type="text" name="ab_pac" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">EE: </strong></label>
                                                <input class="form-control" type="text" name="ee_pac" placeholder=""/>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">FUM: </strong></label>
                                                <input class="form-control" type="date" name="fum_pac" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label><strong class="text-forms-pacientes">Dismenorrea (si / no): </strong></label>
                                                <input class="form-control" type="text" name="dismenorrea_pac" placeholder=""/>
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
                                                    <input class="form-control" type="text" name="tipo_anticoncep_pac" placeholder="Tipo"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" name="tiempo_anticoncep_pac" placeholder="Tiempo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="3" name="notas_anticoncep_pac" placeholder="NOTAS"></textarea>
                                            </div>
                                        </div>
                                    </div><!--Cierra row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cirug_ginec_pac"><strong class="text-forms-pacientes">Cirugías Ginecológicas: </strong></label>
                                                <textarea class="form-control" rows="3" name="cirug_ginec_pac" placeholder="Ej: 21/10/2015 ----> Parto natural."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                            <input name="guardar" id="guardar" type="submit" class="btn btn-primary btn-lg" value="Guardar"/>
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal nuevo-->
</div>