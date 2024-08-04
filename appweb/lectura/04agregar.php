<?php

	include '../include/conexion.php';
	include '00configuraciones.php';
	$modulo = "01index.php";


$timezone = 'America/Managua';
date_default_timezone_set($timezone);
$fecha_y_hora_actual = date("Y-m-d H:i:s");
$fecha_actual = date("Y-m-d");
$hora_actual = date("H:i:s");



if(isset($_GET['add'])){
		$tabla = $_GET['tabla'];

		$dato01 = $_GET['descripcion'];
		$dato02 = $_GET['costo1'];
		$dato03 = $_GET['costo2'];

		$sql = "INSERT INTO ".$tabla."(descripcion,costo1,costo2)
		VALUES ('$fecha_y_hora_actual','$dato02','$dato03')";

		if($conn->query($sql)){ $_SESSION['success'] = ' añadido satisfactoriamente';	}
		else{ $_SESSION['error'] = $conn->error; }
	}
	else{	$_SESSION['error'] = 'Fill up add form first';	}


	//header('location: '.$modulo);
?>
