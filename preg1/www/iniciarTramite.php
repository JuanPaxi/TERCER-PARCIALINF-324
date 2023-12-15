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
<h2 class="text-center" style="color: black;">Iniciando Proceso de Tramites</h2>
<div class="card container rounded-4 text-center col-3">
	<h4>Datos Estudiante</h4>
	<ul style="text-align: left;">
		<li>Ci: <?php echo $ci;?></li>
		<li>Nombre: <?php echo $nombre;?></li>
		<li>Apellido: <?php echo $apellido;?></li>
		<li>Nacionalidad: <?php echo $nacionalidad; ?></li>
	</ul>

	<input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
	<br>
</div>


