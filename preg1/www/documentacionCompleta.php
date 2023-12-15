<?php
session_start();
$ci = $_SESSION['ci'];
$sql = "select * from usuarios where ci = '$ci'";
$resultado=mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
$ci = $fila['ci'];
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];
$nacionalidad = $fila['nacionalidad'];
?>

<h2 class="text-center" style="color: black;">Recepcion de Documentos satisfactorio</h2>
<div class="card container rounded-4 text-center col-3">
	<h5>Datos Estudiante</h5>
	<ul style="text-align: left;">
		<li>ci: <?php echo $ci;?></li>
		<li>nombre: <?php echo $nombre;?></li>
		<li>apellido: <?php echo $apellido;?></li>
		<li>Nacionalidad: <?php echo $nacionalidad; ?></li>
	</ul>

	<input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
</div>

