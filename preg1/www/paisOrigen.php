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
$res = '';

?>
<h2 class="text-center" style="color: black;">Recepcion de Documentos Satisfactorio</h2>
<div class="card container rounded-4 text-center col-3">
	<h5>Datos Estudiante</h5>
	<ul style="text-align: left;">
		<li>ci: <?php echo $ci;?></li>
		<li>nombre: <?php echo $nombre;?></li>
		<li>apellido: <?php echo $apellido;?></li>
		<li>Nacionalidad: <?php echo $nacionalidad; ?></li>
	</ul>

	<?php

	if($nacionalidad=='boliviano'){
		?>
		<ul style="text-align: left;">
			<ol>Legalizacion en curso</ol>
			<ol>La legalizacion puede tardar hasta 3 meses </ol>
			<ol>Para mas infomacion click !Siguente¡</ol>

		</ul>
		<?php
		$res='si';
	}else{
		?>
		<ul style="text-align: left; padding: 20px;">
			<ol style="color: blue;">Debido a su nacionalidad </ol>
			<ol>Realizar tramites en la embajada correspondiente a su nacionalidad</ol>
			<ol>Para mas infomacion click !Siguente¡</ol>
		</ul>
		<?php
		$res='no';
	}

	?>

	<input type="hidden" name="pregunta" value='<?php echo $res;?>'>

	<input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
	<br>
</div>



