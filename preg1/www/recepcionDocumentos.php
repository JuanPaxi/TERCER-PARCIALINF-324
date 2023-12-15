<?php
session_start();
$ci = $_SESSION['ci'];
$sql = "select * from usuarios where ci = '$ci'";
$resultado=mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
$ci = $fila['ci'];
$nombre = $fila['nombre'];
$apellido = $fila['apellido'];

$llenfor = $fila['llenadoFormulario'];
$pago = $fila['pago'];
$rec = $fila['recepcionDoc'];
$nacionalidad = $fila['nacionalidad'];

$res = '';


?>
<div class="card container rounded-4 text-center col-3">
	<h4>Datos Estudiante</h4>
	<ul style="text-align: left;">
		<li>Ci: <?php echo $ci;?></li>
		<li>Nombre: <?php echo $nombre;?></li>
		<li>Npellido: <?php echo $apellido;?></li>
		<li>Nacionalidad: <?php echo $nacionalidad; ?></li>
	</ul>


	<?php

	if($llenfor=='si'&&$pago=='si'&&$rec=='si'){
		echo "<h3>Se cumplio con todos los requisitos</h3>";
		$res = 'si';
	}else{
		if($llenfor == 'no'){
			echo "<h4>Falta Completar el resgistro de formulario</h4>";
		}
		if($pago == 'no'){
			echo "<h4>Falta el pago de tramites</h4>";
		}
		if($rec == 'no'){
			echo "<h4>Aun no se recepcionaron documentos fisicos</h4>";
		}
		$res='no';
	}

	?>
	<input type="hidden" name="pregunta" value='<?php echo $res;?>'>
	<input type="submit" value="Anterior" id="anterior" name='Anterior'>
	<input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
	<br>
</div>