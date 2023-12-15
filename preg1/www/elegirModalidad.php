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
<h2 class="text-center" style="color: black;">MODALIDAD DE GRADUACION</h2>
<div class="card container rounded-4 text-center col-3">

  <h4>Datos Estudiante</h4>
  <ul style="text-align: left;">
    <li>Ci: <?php echo $ci;?></li>
    <li>Nombre: <?php echo $nombre;?></li>
    <li>Apellido: <?php echo $apellido;?></li>
    <li>Nacionalida: <?php echo $nacionalidad; ?></li>
  </ul>

  <h4>Eleccion Modalidad</h4>
  <label for="opciones">Opción:</label>
  <select id="opciones" name="opciones">
    <option value="TesisGrado">Tesis de Grado</option>
    <option value="ProyectoGrado">Proyecto de Grado</option>
  </select><br><br>

  <input type="submit" value="Anterior" id="anterior" name='Anterior'>
  <input class="btn btn-primary" type="submit" value="Siguiente" id="siguiente" name='Siguiente'>
  <br>
</div>