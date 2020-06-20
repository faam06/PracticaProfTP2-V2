<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=sucursales.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM sucursal";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:green;">
		<th>Id Sucursal</th>
        <th>Nombre Sucursal</th>
		<th>Direccion</th>
		<th>Telefono</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['id_suc']; ?></td>
					<td><?php echo $row['nombre_suc']; ?></td>
					<td><?php echo $row['direccion_suc']; ?></td>
					<td><?php echo $row['telefono_suc']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>