<?php
error_reporting(0);
$codFlujo = $_GET['codflujo']; #por link 
$codProceso = $_GET['codproceso']; # por ilnk 
include 'coneccion.php';  
$sql = "select * from flujo where codFlujo ='$codFlujo' and codProceso='$codProceso'";
$result = mysqli_query($con,$sql);
$fila = mysqli_fetch_array($result);

$archivo = $fila['pantalla']; # por db valor
$codprocesosiguiente = $fila['codProcesoSiguiente'];# por db valor


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Document</title>
</head>
<body style="background-color: #def">
	<br>
	<form action="controlador.php" method='GET' >
		<?php
		include $archivo; 
		?>

		<input type="hidden" value="<?php echo $codFlujo; ?>" name='codflujo'>
		<input type="hidden" value="<?php echo $codProceso; ?>" name='codproceso'>
		<input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name='codprocesosiguiente'>
		<input type="hidden" value="<?php echo $archivo; ?>" name='archivo'>
	</form >

</body>

<script>
	
</script>
</html>
