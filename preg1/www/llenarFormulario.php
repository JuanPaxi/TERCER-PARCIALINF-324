<?php
session_start();
$ci = $_SESSION['ci'];

$sql = "select * from usuarios where ci = '$ci'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);

$form = $fila['llenadoFormulario'];
$rec = $fila['pago'];
$ci = $fila['ci'];
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];
$nacionalidad = $fila['nacionalidad'];

?>

<h2 class="text-center" style="color: black;">Llenado Formulario y Pago de Tramites</h2>
<div class="card container rounded-4 text-center col-3">
	<h4>Mis datos personales</h4>
	<ul style="text-align: left;">
		<li>Ci: <?php echo $ci;?></li>
		<li>Nombre: <?php echo $nombre;?></li>
		<li>Apellido: <?php echo $apellido;?></li>
		<li>Nacionalidad: <?php echo $nacionalidad; ?></li>
	</ul>

	<h3 style="text-align: left;">Formulario</h3>
	<label for="">Llenado de formulario</label >
	<input type="checkbox" name="estadoFormulario" value="Activo" <?php if ($form=="si"):?> checked <?php endif; ?>><br>
	<h3 style="text-align: left;">Pago de tramites</h3>
	<label for="">pago</label>
	<input type="checkbox" name="estadoRecepcion" value="Activo" <?php if ($rec=="si"):?> checked <?php endif; ?>><br><br>

	<input type="submit" value="Anterior" id="anterior" name='Anterior'>
	<input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
</div>





