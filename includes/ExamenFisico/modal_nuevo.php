<!--modals-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content"  style="border-top: 4px solid orange; border-radius: 0px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel"><span style="color:orange">F</span>icha nueva</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="frm_ex_fis_new">
                    <input type="hidden" value="<?php echo $id;?>" id="id_paciente_gral" name="id_paciente_gral">
                    <input type="hidden" name="opcion" value="nuevo">
                    <input type="hidden" name="tag" value="examen_fisico">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong class="text-forms-pacientes">Fecha: </strong></label>
                                <input class="form-control" type="date" name="fecha_ex_fisico_pac">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label><strong class="text-forms-pacientes">MC: </strong></label>
                                <input class="form-control" type="tex" name="mc_pac">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row"><br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong class="text-forms-pacientes">Examen Físico: </strong></label>
                                <input class="form-control" type="tex" name="ex_fisico_pac">
                            </div>
                        </div>
                    </div>
                        <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="colposcopia-tab" data-toggle="tab" href="#colposcopia" role="tab" aria-controls="colposcopia" aria-expanded="true">Colposcopia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pap-tab" data-toggle="tab" href="#pap" role="tab" aria-controls="pap">Pap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ginecologica-tab" data-toggle="tab" href="#ginecologica" role="tab" aria-controls="Ginecologica">Ginecologica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mamaria-tab" data-toggle="tab" href="#mamaria" role="tab" aria-controls="mamaria">mamaria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mamografia-tab" data-toggle="tab" href="#mamografia" role="tab" aria-controls="mamografia">mamografia</a>
                        </li>
                    </ul>
                        <div class="tab-content" id="myTabContent">
                        <div role="tabpanel" class="tab-pane fade in active" id="colposcopia" aria-labelledby="colposcopia-tab">
                            <textarea name="colpos" id="input" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="tab-pane fade" id="pap" role="tabpanel" aria-labelledby="pap-tab">
                            <textarea name="pap" id="input" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="tab-pane fade" id="ginecologica" role="tabpanel" aria-labelledby="ginecologica-tab">
                            <textarea name="ginecologica" id="input" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="tab-pane fade" id="mamaria" role="tabpanel" aria-labelledby="mamaria-tab">
                            <textarea name="mamaria" id="input" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="tab-pane fade" id="mamografia" role="tabpanel" aria-labelledby="mamografia-tab">
                            <textarea name="mamografia" id="input" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="active"><strong class="text-forms-pacientes">Otros: </strong></label>
                                <textarea class="form-control" rows="5" name="otros_ex_fis_pac" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="active"><strong class="text-forms-pacientes">Notas: </strong></label>
                            <textarea class="form-control" rows="5" name="notas_ex_fis_pac" placeholder=""></textarea>
                        </div>
                    </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info waves-effect btn-lg" name="guardar">Guardar datos</button>
                        </div>
                        <div class="col-md-9">
                            <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>