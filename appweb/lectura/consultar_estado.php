<?php
	//include '../include/session.php';
include '../include/conexion.php';

	if(isset($_GET['id']) && isset($_GET['tabla'])){
		$tabla= $_GET['tabla'];
		$id = $_GET['id'];

		$sql = "SELECT estado as estadox FROM ".$tabla." WHERE ".$tabla.".id = '$id'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}



?>