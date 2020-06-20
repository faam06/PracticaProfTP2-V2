<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Sucursal</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
          <div class="form-group">
            <label for="nombre_suc0" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_suc0" name="nombre_suc" required maxlength="30">
		  </div>
		  <div class="form-group">
            <label for="direccion_suc" class="control-label">Direccion:</label>
            <input type="text" class="form-control" id="direccion_suc" name="direccion_suc" required maxlength="45">
          </div>
		  <div class="form-group">
            <label for="telefono_suc" class="control-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono_suc" name="telefono_suc" required maxlength="10">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>