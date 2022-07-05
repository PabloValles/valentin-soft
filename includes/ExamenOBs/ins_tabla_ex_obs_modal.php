<style type="text/css">
    .modal-dialog{
        width: 70% !important;
        box-shadow: 0px 4px 40px 1px #ccc;
    }
</style>
<!-- MODAL -->
<div class="modal fade bs-example-modal-lg examenObstetrico" id="edit_modal_ex_ob" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">Insertar fila en Examen obstétrico</h4>
            </div>
            <div class="modal-body">
               <form method="POST" id="nuevaFila">
                    <input type="hidden" name="opcion" value="nuevo" id="opcion">
                    <input type="hidden" name="tag" value="mini_tabla_1">
                    <input type="hidden" name="id_examen_obs" id="id_examen_obs"/>
                    <input type="hidden" name="id_ficha_gral" value="<?php echo $id_ficha;?>">
                    <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                    <thead>
                        <th>Fecha</th>
                        <th>EG</th>
                        <th>PA</th>
                        <th>AU</th>
                        <th>TA</th>
                        <th>LCF</th>
                        <th>Edema</th>
                        <th>Datos</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="date" class="form-control" id="fecha_ex_obs" name="fecha_ex_obs"></td>
                            <td><input type="text" class="form-control" id="eg_ex_obs" name="eg_ex_obs"></td>
                            <td><input type="text" class="form-control" id="pa_ex_obs" name="pa_ex_obs"></td>
                            <td><input type="text" class="form-control" id="au_ex_obs" name="au_ex_obs"></td>
                            <td><input type="text" class="form-control" id="ta_ex_obs" name="ta_ex_obs"></td>
                            <td><input type="text" class="form-control" id="lcf_ex_obs" name="lcf_ex_obs"></td>
                            <td><input type="text" class="form-control" id="edema_ex_obs" name="edema_ex_obs"></td>
                            <td><input type="text" class="form-control" id="datos_ex_obs" name="datos_ex_obs"></td>
                        </tr>    
                    </tbody>
                    </table>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-info waves-effect" id="btn_modal_guardar" name="guardar">Insertar fila</button>
                    <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                    
               </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- modal ecografia-->
<div class="modal fade bs-example-modal-lg" id="filaEcografia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            Inserta fila en tabla de ecografías
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                    <!-- 1) --><th class="warning">Fecha</th>
                    <!-- 2) --><th class="warning">EG</th>
                    <!-- 3) --><th class="warning">DBP</th>
                    <!-- 4) --><th class="warning">PA</th>
                    <!-- 5) --><th class="warning">LF</th>
                    <!-- 6) --><th class="warning">Plac</th>
                    <!-- 7) --><th class="warning">Grado</th>
                    <!-- 8) --><th class="warning">LA</th>
                    <!-- 9) --><th class="warning">PEF</th>
                    <!-- 10) --><th class="warning">P</th>
                    <!-- 11) --><th class="warning">IPAUD</th>
                    <!-- 12) --><th class="warning">IPAUI</th>
                    <!-- 13) --><th class="warning" style="text-align:center">#</th>
                    </thead>
                    <tbody>
                        <form action="#" method="post" id="nuevaFila2">
                           <input type="hidden" name="opcion" value="nuevo" id="opcion">
                            <input type="hidden" name="tag" value="mini_tabla_2">
                            <input type="hidden" name="id_tab_eco" id="id_tab_eco"/>
                            <input type="hidden" value="<?php echo $id_ficha;?>" name="id_ficha_gral">
                            <td><input class="form-control" type="date" name="fecha_eco" id="fecha_eco"></td>
                            <td><input class="form-control" type="text" name="eg_eco" id="eg_eco"></td>
                            <td><input class="form-control" type="text" name="dbp_eco" id="dbp_eco"></td>
                            <td><input class="form-control" type="text" name="pa_eco" id="pa_eco"></td>
                            <td><input class="form-control" type="text" name="lf_eco" id="lf_eco"></td>
                            <td><input class="form-control" type="text" name="plac_eco" id="plac_eco"></td>
                            <td><input class="form-control" type="text" name="grado_eco" id="grado_eco"></td>
                            <td><input class="form-control" type="text" name="la_eco" id="la_eco"></td>
                            <td><input class="form-control" type="text" name="pef_eco" id="pef_eco"></td>
                            <td><input class="form-control" type="text" name="p_eco" id="p_eco"></td>
                            <td><input class="form-control" type="text" name="ipaud" id="ipaud"></td>
                            <td><input class="form-control" type="text" name="ipaui" id="ipaui"></td>
                            <td><input class="btn btn-success" type="submit" id="insRowTablaEco" name="insRowTablaEco" value="+"></td>
                            
                        </form>
                    </tbody>
                </table>
                <span id="loader2" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
            </div>
        </div>
    </div>
</div>
</div>
<!--end modal ecografia-->

<!-- modal lab-->
<div class="modal fade bs-example-modal-lg" id="filaLab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Inserta fila en tabla de laboratorios</h3>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" role="form" id="nuevaFila3">
                <input type="hidden" value="<?php echo $id_ficha;?>" name="id_ficha_gral">
                <input type="hidden" name="opcion" value="nuevo" id="opcion">
                <input type="hidden" name="tag" value="mini_tabla_3">
                <input type="hidden" name="id_tab_lab" id="id_tab_lab"/>
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" id="fechaLab_span">Fecha</span>
                                <input name="fechaLab" id="fechaLab" type="date" class="form-control" aria-describedby="fechaLab">
                            </div>
                        </div>                                    
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-3">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon" id="nro">HTO</span>
                            <input name="htoLab" id="htoLab" type="text" class="form-control" placeholder="" aria-describedby="htoLab">
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-3">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon" id="nro">HB</span>
                            <input name="hbLab" id="hbLab" type="text" class="form-control" placeholder="" aria-describedby="hbLab">
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon" id="nro">Plaq</span>
                            <input name="plaq" id="plaq" type="text" class="form-control" placeholder="" aria-describedby="plaq">
                            </div>
                        </div>                                    
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon" id="nro">GB</span>
                            <input name="gb" id="gb" type="text" class="form-control" placeholder="" aria-describedby="gb">
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">TSH</span>
                              <input name="tsh" id="tsh" type="text" class="form-control" aria-describedby="tsh">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">T4L</span>
                              <input name="t4l" id="t4l" type="text" class="form-control" aria-describedby="t4l">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">TPO</span>
                              <input name="tpo" id="tpo" type="text" class="form-control" aria-describedby="tpo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">TP</span>
                              <input name="tp" id="tp" type="text" class="form-control" aria-describedby="tp">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">TTPK</span>
                              <input name="ttpk" id="ttpk" type="text" class="form-control" aria-describedby="ttpk">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">Glu</span>
                              <input name="glu" id="glu" type="text" class="form-control" aria-describedby="glu">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">UR</span>
                              <input name="ur" id="ur" type="text" class="form-control" aria-describedby="ur">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">Creat</span>
                              <input name="creat" id="creat" type="text" class="form-control" aria-describedby="creat">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">Uric</span>
                              <input name="uric" id="uric" type="text" class="form-control" aria-describedby="uric">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">LDH</span>
                              <input name="ldh" id="ldh" type="text" class="form-control" aria-describedby="ldh">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">GOT</span>
                              <input name="got" id="got" type="text" class="form-control" aria-describedby="got">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">GPT</span>
                              <input name="gpt" id="gpt" type="text" class="form-control" aria-describedby="gpt">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">BD</span>
                              <input name="bd" id="bd" type="text" class="form-control" aria-describedby="bd">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">BI</span>
                              <input name="bi" id="bi" type="text" class="form-control" aria-describedby="bi">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">BT</span>
                              <input name="bt" id="bt" type="text" class="form-control" aria-describedby="bt">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">Colesterol</span>
                              <input name="colesterol" id="colesterol" type="text" class="form-control" aria-describedby="colesterol">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">HDL</span>
                              <input name="hdl" id="hdl" type="text" class="form-control" aria-describedby="hdl">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">LDL</span>
                              <input name="ldl" id="ldl" type="text" class="form-control" aria-describedby="ldl">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon" id="nro">TG</span>
                              <input name="tg" id="tg" type="text" class="form-control" aria-describedby="tg">
                            </div>
                        </div> 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12"><input type="submit" class="btn btn-info pull-right" value="+ Insertar Fila" name="InsRowLab"><span id="loader3" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END modal lab-->