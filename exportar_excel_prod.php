<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=productos.xls');

	require_once('conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM producto";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:green;">
		<th>Id Producto</th>
        <th>Nombre</th>
		<th>Descripcion</th>
		<th>Precio $</th>
		<th>Stock</th>
		<th>Id_suc</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['id_producto']; ?></td>
					<td><?php echo $row['nombre_producto']; ?></td>
					<td><?php echo $row['descripcion_producto']; ?></td>
					<td><?php echo $row['precio_producto']; ?></td>
					<td><?php echo $row['stock_producto']; ?></td>
					<td><?php echo $row['id_suc']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>