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
	 if (empty($_POST['nombre_cliente'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['apellido_cliente'])){
			$errors[] = "Apellido vacío";
		} else if (empty($_POST['dni_cliente'])){
			$errors[] = "DNI vacío";
		} else if (empty($_POST['email_cliente'])){
			$errors[] = "Correo electronico vacío";
		} else if (empty($_POST['id_suc'])){
			$errors[] = "Id Sucursal vacía";
		}   else if (
			!empty($_POST['nombre_cliente']) && 
			!empty($_POST['apellido_cliente']) &&
			!empty($_POST['dni_cliente']) &&
			!empty($_POST['email_cliente']) &&
			!empty($_POST['id_suc'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_cliente"],ENT_QUOTES)));
		$apellido_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["apellido_cliente"],ENT_QUOTES)));
		$dni_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["dni_cliente"],ENT_QUOTES)));
		$email_cliente=mysqli_real_escape_string($con,(strip_tags($_POST["email_cliente"],ENT_QUOTES)));
		$id_suc=mysqli_real_escape_string($con,(strip_tags($_POST["id_suc"],ENT_QUOTES)));
		
		$sql="INSERT INTO cliente (nombre_cliente, apellido_cliente, dni_cliente, email_cliente, id_suc) VALUES ('".$nombre_cliente."','".$apellido_cliente."','".$dni_cliente."', '".$email_cliente."','".$id_suc."')";
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