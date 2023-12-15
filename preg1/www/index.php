<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body style="background-color: #fed">
	<br>
<h2 class="text-center" style="color: black;">INICIO DE SESION</h2>
<br>
<div class="card container rounded-4 text-center col-3">
	<br>
    <form action='validar_ingreso.php' method="POST">
		Usuario
		<input type="text" name="usuario" value="10"/><br/>
		Clave
		<input type="text" name="clave" value="12345"/><br/>
		<input class="btn btn-primary" type="submit" name="Aceptar" value="Aceptar"/>
		<br>
	</form>
	<br>
</div>
	
</body>
</html>