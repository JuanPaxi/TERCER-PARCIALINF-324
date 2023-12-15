<?php

$codFlujo = $_GET['codflujo'];
$codProceso = $_GET['codproceso'];
$codProcesoSiguiente = $_GET['codprocesosiguiente'];
$archivo = $_GET['archivo'];

include 'controlador'.$archivo;



if(isset($_GET['Anterior'])){
	
	$sql = "select * from flujo where codFlujo = '$codFlujo' and codProcesoSiguiente ='$codProceso'";

	include 'coneccion.php';
	$result = mysqli_query($con,$sql);

	if($result->num_rows > 0){
		$fila = mysqli_fetch_array($result);
		$codprocesoEnvia = $fila['codProceso'];
		$archivoEnvia = "motor.php?codflujo=".$codFlujo."&codproceso=".$codprocesoEnvia;
		// echo $archivoEnvia;
		header("Location: ".$archivoEnvia);
	}else{
		$codProceso = $_GET['codproceso']='null';
		header("Location: ejemplo.php");
	} 

}

if(isset($_GET['Siguiente'])){
	$sql = "select * from flujo where codFlujo ='$codFlujo' and codProceso ='$codProcesoSiguiente' ";

	include 'coneccion.php';
	$result = mysqli_query($con,$sql);
	// $fila = mysqli_fetch_array($result);

	if($result->num_rows > 0){

		$fila = mysqli_fetch_array($result);
		$codprocesoEnvia = $fila['codProceso'];
		$archivoEnvia = "motor.php?codflujo=".$codFlujo."&codproceso=".$codprocesoEnvia;
		// echo $archivoEnvia;
		header("Location: ".$archivoEnvia);
	}else{
		session_destroy();
		header("Location: index.php");
	}
}



if(isset($_GET['pregunta'])) {
$flujo = $_GET['codflujo'];
$proceso = $_GET['codproceso'];
include 'coneccion.php';
$sql = "select si,no from flujopregunta where flujo='$flujo' and proceso='$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
    if ($_GET["pregunta"]=='si'){
      $procesosiguiente=$fila['si'];
    }else {
      $procesosiguiente=$fila['no'];
    }

	$archivoEnvia = "motor.php?codflujo=".$codFlujo."&codproceso=".$procesosiguiente;
		// echo $archivoEnvia;
		header("Location: ".$archivoEnvia);

}


// if (isset($_GET["Anterior"]) && isset($_GET["pregunta"])){
  
// $flujo = $_GET['codflujo'];
// $proceso = $_GET['codproceso'];

  
//   $resultado=mysqli_query($con, "select * from flujo where flujo='$flujo' and procesosiguiente='$proceso'");
//   $fila=mysqli_fetch_array($resultado);
//   $procesosiguiente=$fila["proceso"];

// 	$archivoEnvia = "motor.php?codflujo=".$codFlujo."&codproceso=".$procesosiguiente;
// 		// echo $archivoEnvia;
// 		header("Location: ".$archivoEnvia);

// }





// if(isset($_GET['salir'])){
//     session_destroy();
//     header("Location: index.php");
//     exit();
// }


// if(isset($_GET['registrar'])){

// 	session_start();
// 	$ci = $_SESSION['ci'];

//     $mat1 = $_GET['Materia1'];
//     $mat2 = $_GET['Materia2'];
//     $sql = "update forkyestudiante set materia1 = '$mat1', materia2 = '$mat2', inscrito='si' WHERE ci = '$ci'";
// 	include 'coneccion.php';
// 	$result = mysqli_query($con,$sql);
// 	header('Location:  motor.php?'.'codflujo=F1&codproceso=P3');
//     exit; // Asegura que el script se detenga después de redirigir
// }


// if(isset($_GET['vInscripcion'])){
// 	session_start();
// 	$ci = $_SESSION['ci'];
//     // $mat1 = $_GET['Materia1'];
//     // $mat2 = $_GET['Materia2'];
//     // header("Location: index.php");
//     $sql = "select * from forkyestudiante where ci = '$ci' ";
// 	include 'coneccion.php';
// 	$result = mysqli_query($con,$sql);
// 	$fila = mysqli_fetch_array($result);

// 	header('Location: index.php');

// 	if($fila['inscrito']=="no"){

// 		header('Location:  motor.php?'.'codflujo=F1&codproceso=P2');
// 	}else{
// 		header('Location:  motor.php?'.'codflujo=F1&codproceso=P3');
// 	}	
// 	// header('Location:  motor.php?'.'codflujo=F1&codproceso=P3');

// }

// if(isset($_GET['pregunta'])){

// 	$valor = $_GET['pregunta'];
//     $resultado=mysqli_query($con, "select si,no from flujopregunta where flujo='$flujo' and proceso='$proceso' ");
//     $fila=mysqli_fetch_array($resultado);

//     if ($valor =='si'){
//       $procesosiguiente=$fila['si'];
//     	// $procesosiguiente = 'P5';
//     }else {
//       $procesosiguiente=$fila['no'];
//     	// $procesosiguiente = 'p6';
//     }


//     $archivoEnvia = "motor.php?codflujo=".$codFlujo."&codproceso=".$procesosiguiente;
// 		header("Location: ".$archivoEnvia);
// }






?>