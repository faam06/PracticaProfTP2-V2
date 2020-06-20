<?php
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'test_modal');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre_suc'])) {
           $errors[] = "Nombre vacío";
        } else if (empty($_POST['direccion_suc'])){
			$errors[] = "Direccion vacía";
		} else if (empty($_POST['telefono_suc'])){
			$errors[] = "Telefono vacío";
		}   else if (
			!empty($_POST['nombre_suc']) &&
			!empty($_POST['direccion_suc']) && 
			!empty($_POST['telefono_suc'])			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre_suc=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_suc"],ENT_QUOTES)));
		$direccion_suc=mysqli_real_escape_string($con,(strip_tags($_POST["direccion_suc"],ENT_QUOTES)));
		$telefono_suc=mysqli_real_escape_string($con,(strip_tags($_POST["telefono_suc"],ENT_QUOTES)));
		$sql="UPDATE sucursal SET  nombre_suc='".$nombre_suc."', direccion_suc='".$direccion_suc."',
		telefono_suc='".$telefono_suc."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
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