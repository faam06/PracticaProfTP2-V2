<form id="guardarDatosProducto">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Producto </h4>
      </div>
      <div class="modal-body">
			  <div id="datos_ajax_register"></div>         
		    <div class="form-group">
          <label for="nombre0" class="control-label">Nombre del Producto:</label>
          <input type="text" class="form-control" id="nombre0" name="nombre_producto" required maxlength="45">
        </div>
		    <div class="form-group">
          <label for="descripcion0" class="control-label">Breve descripcion:</label>
          <input type="text" class="form-control" id="descripcion0" name="descripcion_producto" required maxlength="50">
        </div>
		    <div class="form-group">
          <label for="idsucursal0" class="control-label">ID Sucursal:</label>
          <input type="text" class="form-control" id="idsucursal0" name="id_suc" required maxlength="30"> 
        </div>
		    <div class="form-group">
          <label for="precio0" class="control-label">Precio:</label>
          <input type="text" class="form-control" id="precio0" name="precio_producto" required maxlength="30"> 
        </div>
		    <div class="form-group">
          <label for="stock0" class="control-label">Stock:</label>
          <input type="text" class="form-control" id="stock0" name="stock_producto" required maxlength="30"> 
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