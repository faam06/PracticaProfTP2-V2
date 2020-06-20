<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=clientes.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM cliente";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:green;">
		<th>Id Cliente</th>
        <th>Nombre</th>
		<th>Apellido</th>
		<th>DNI</th>
		<th>Email</th>
		<th>Id_suc</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['id_cliente']; ?></td>
					<td><?php echo $row['nombre_cliente']; ?></td>
					<td><?php echo $row['apellido_cliente']; ?></td>
					<td><?php echo $row['dni_cliente']; ?></td>
					<td><?php echo $row['email_cliente']; ?></td>
					<td><?php echo $row['id_suc']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>