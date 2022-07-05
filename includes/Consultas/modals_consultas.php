<style>
    #modal_editar>.modal-dialog{
        width: 50%;
    }
    #modal_editar>.modal-dialog>.modal-content{
        border-left: 7px solid #1bb99a;
        border-radius: 0px;
    }
</style>
<form id="frmEliminar" action="" method="POST">
<input type="hidden" id="opcion" name="opcion" value="delete">
<input type="hidden" id="tag" name="tag" value="consulta">
<!-- Modal -->
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalEliminarLabel">Eliminar consulta</h4>
            </div>
            <div class="modal-body">
                <h3>¿Desea eliminar la consulta seleccionada?</h3>
                <h3 id="ver"></h3>
                <input type="hidden" id="idconsul" name="id">
                <div class="row eliminado"></div>
            </div>
            <div class="modal-footer" id="ocu">
                <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                <button type="submit" id="delete_btn" class="btn btn-danger">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
</form>

<form id="frmEditarConsulta" action="" method="POST">
<input type="hidden" id="opcion" name="opcion" value="mod">
<input type="hidden" id="tag" name="tag" value="consulta">
<!-- Modal -->
    <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" style="background-color:rgba(10, 33, 44, 0.22)">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalEditarConsulta"><i class="fa fa-eye"></i> VER CONSULTA</h4>
                </div>
                <div class="modal-body">
                    <div class="msj"></div>
                    <input type="hidden" id="idPacienteConsulta">
                    <input type="hidden" id="idConsulta">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 col-xl-3">
                            <div class="form-group">
                               <label for="apellido" class="dark">Apellido</label>
                                <input type="text" class="form-control dark" name="apellido" id="apellido">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-xl-3">
                            <div class="form-group">
                               <label for="nombre" class="dark">Nombre</label>
                                <input type="text" class="form-control dark" name="nombre" id="nombre" >
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-xl-3">
                            <div class="form-group">
                               <label for="dni" class="dark">DNI</label>
                                <input type="text" class="form-control dark" name="dni" id="dni">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12 col-xl-4">
                            <div class="form-group">
                               <label for="Obra_social" class="dark">Obra social</label>
                                <input type="text" class="form-control dark" name="Obra_social" id="Obra_social">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 col-xl-4">
                            <div class="form-group">
                               <label for="Plan" class="dark">Plan</label>
                                <input type="text" class="form-control dark" name="Plan" id="Plan">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 col-xl-4">
                            <div class="form-group">
                               <label for="N_obrasocial" class="dark">N° Ob. Social</label>
                                <input type="text" class="form-control dark" name="N_obrasocial" id="N_obrasocial">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12 col-xl-4">
                            <div class="form-group">
                               <label for="fechaConsulta" class="dark">Fecha</label>
                               <input type="date" class="form-control dark" name="fechaConsulta" id="fechaConsulta">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 col-xl-4">
                            <div class="form-group">
                               <label for="tipo_consulta" class="dark">Tipo de consulta</label>
                               <select name="tipo_consulta_edit" class="form-control dark" id="tipo_consulta_edit" style="height:34px;">
                                <?php
                                    $tipo = "select * from tipo_consultas order by nombre_tipo";
                                    $query = mysqli_query($conexion,$tipo) or die(mysqli_error($conexion));
                                    while($tipo=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $tipo['nombre_tipo'];?>"><?php echo $tipo['nombre_tipo'];?></option>
                                        <?php
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 col-xl-4">
                            <div class="form-group">
                               <label for="cod" class="dark">Código</label>
                               <input type="text" class="form-control dark" name="cod" id="cod">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12">
                            <label for="mc" class="dark">Motivo de consulta</label>
                            <textarea name="mc" id="mc" class="form-control dark" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:rgb(239, 239, 239); border-top:0px" id="ocu">
                    <span id="loader" style="display:none" class="loader"><img src="assets/images/ajax-loader.gif" alt="">&nbsp;</span>
                    <a href="#" id="btn_edit" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i> Imprimir</a>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
</form>