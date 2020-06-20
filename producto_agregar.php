<?php
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'tp2');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['nombre_producto'])){
			$errors[] = "Nombre del Producto vacío";
		} else if (empty($_POST['descripcion_producto'])){
			$errors[] = "Descripcion vacía";
		} else if (empty($_POST['precio_producto'])){
			$errors[] = "Precio vacío";
		} else if (empty($_POST['id_suc'])){
			$errors[] = "Id Sucursal vacía";
		} else if (empty($_POST['stock_producto'])){
			$errors[] = "Campo Stock vacío";
		}   else if (
			!empty($_POST['nombre_producto']) && 
			!empty($_POST['descripcion_producto']) &&
			!empty($_POST['precio_producto']) &&
			!empty($_POST['id_suc']) &&
			!empty($_POST['stock_producto'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre_producto=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_producto"],ENT_QUOTES)));
		$descripcion_producto=mysqli_real_escape_string($con,(strip_tags($_POST["descripcion_producto"],ENT_QUOTES)));
		$precio_producto=mysqli_real_escape_string($con,(strip_tags($_POST["precio_producto"],ENT_QUOTES)));
		$id_suc=mysqli_real_escape_string($con,(strip_tags($_POST["id_suc"],ENT_QUOTES)));
		$stock_producto=mysqli_real_escape_string($con,(strip_tags($_POST["stock_producto"],ENT_QUOTES)));
		
		$sql="INSERT INTO producto (nombre_producto, descripcion_producto, precio_producto, id_suc, stock_producto) VALUES ('".$nombre_producto."','".$descripcion_producto."','".$precio_producto."', '".$id_suc."','".$stock_producto."')";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>	