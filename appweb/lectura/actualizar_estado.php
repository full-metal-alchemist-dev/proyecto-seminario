<?php
	include '../include/session.php';

	if(isset($_GET['estado'])){
		$estado = $_GET['estado'];

		$sql = "UPDATE estado_sistema SET estado = '$estado' WHERE id = 1";

		if($conn->query($sql)){
			$_SESSION['success'] = 'actualizado con éxito ';//.$modulo;//.$sql;
		}
		else{
			$_SESSION['error'] = $conn->error;//.$sql;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccionar  para editar primero';
	}
	header('location: 01index.php');
?>