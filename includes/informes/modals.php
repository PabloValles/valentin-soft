<div id="ObraSocial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Seleccione la obra social</h4>
            </div>
            <div class="modal-body" >
                <label>Seleccione</label>
                <form method="post" id="osocial_filtro">
                    <select class="form-control" id="select_obra_social" name="select_obra_social">
                        <?php Codigos::selectObraSociales($conexion);?>
                    </select><br>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="Meses" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Seleccione mes y año</h4>
            </div>
                <form method="post" id="meses_filtro">
            <div class="modal-body" >
                    <label>Seleccione</label>
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                            <select class="form-control" name="meses" id="meses">
                                <?php 
                                $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                                for ($i=0; $i < sizeof($meses); $i++) { 
                                    echo '<option value='.$meses[$i].'>'.$meses[$i].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-6">
                            <select class="form-control" name="year" id="year">
                                <?php 
                                for ($i=2010; $i<2100; $i++) { 
                                    echo "<option value=$i>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    <br>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Filtrar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->