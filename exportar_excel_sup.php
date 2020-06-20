<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=supervisores.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM usuario WHERE tipo_usr = 1";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:green;">
		<th>Id Supervisor</th>
        <th>Nombre </th>
		<th>Apellido</th>
		<th>DNI</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Id de Sucursal</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['id_usr']; ?></td>
					<td><?php echo $row['nombre_usr']; ?></td>
					<td><?php echo $row['apellido_usr']; ?></td>
					<td><?php echo $row['dni_usr']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['telefono']; ?></td>
					<td><?php echo $row['id_suc']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>