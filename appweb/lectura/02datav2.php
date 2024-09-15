<?php
//include '../include/session.php';
include '../include/conexion.php';

if (isset($_GET['id']) && isset($_GET['tabla'])) {
	$tabla = $_GET['tabla'];
	$id = $_GET['id'];

	$sql = "SELECT descripcion as fecha, costo1 as volt_min, costo2 as vol_max FROM " . $tabla . " WHERE " . $tabla . ".id = '$id'";

	//$sql = "SELECT *,".$tabla1.".id as empid FROM ".$tabla1."  WHERE ".$tabla1.".id = '$id'";

	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
