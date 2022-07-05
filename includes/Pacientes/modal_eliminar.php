<form id="frmEliminar" action="" method="POST">
<input type="hidden" id="opcion" name="opcion" value="delete">
<input type="hidden" id="tag" name="tag" value="paciente">
<!-- Modal -->
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalEliminarLabel">Eliminar paciente</h4>
    </div>
    <div class="modal-body">
        <h3>¿Está seguro de eliminar el paciente seleccionado?</h3>
        <h3 id="ver"></h3>
        <input type="hidden" id="id" name="id">
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