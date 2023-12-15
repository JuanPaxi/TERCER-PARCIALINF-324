<?php
session_start();
$ci = $_SESSION['ci'];

$sql = "select recepcionDoc from usuarios where ci = '$ci'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);

$rec = $fila['recepcionDoc'];
?>
<h2 class="text-center" style="color: black;">Presentado de Documentos Fisicos</h2>
<div class="card container rounded-4 text-center col-3">
	<h3>Presentado de Documentos Fisicos</h3>
	<label for="">Presentado de Documentos</label>
	<input type="checkbox" name="estadoFormulario" value="Activo" <?php if ($rec=="si"):?> checked <?php endif; ?>><br><br>

	<input type="submit" value="Anterior" id="anterior" name='Anterior'>
	<input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
	<br>
</div>
