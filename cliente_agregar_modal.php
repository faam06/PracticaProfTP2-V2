<form id="guardarDatosCliente">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Cliente</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
          <div class="form-group">
            <label for="nombre_cliente" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required maxlength="30">
		  </div>
		  <div class="form-group">
            <label for="apellido_cliente" class="control-label">Apellido:</label>
            <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" required maxlength="45">
          </div>
		  <div class="form-group">
            <label for="dni_cliente" class="control-label">DNI:</label>
            <input type="text" class="form-control" id="dni_cliente" name="dni_cliente" required maxlength="8">
          </div>
		  <div class="form-group">
            <label for="email_cliente" class="control-label">Correo Electronico:</label>
            <input type="text" class="form-control" id="email_cliente" name="email_cliente" required maxlength="30"> 
          </div>
		  <div class="form-group">
            <label for="id_suc" class="control-label">ID Sucursal:</label>
            <input type="text" class="form-control" id="id_suc" name="id_suc" required maxlength="2">
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