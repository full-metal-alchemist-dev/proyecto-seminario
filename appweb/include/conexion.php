<?php 

$ModoConexion = 2
;

if($ModoConexion == 1 ){ //https://pixelsasistencia.000webhostapp.com/
	
	$host = "localhost";   //127.0.0.1 // esta es la referencia a la direccion del equipo donde esta ubicada la base de datos
	$basededatos = "id17855177_moniraspyardudb";    // sera el nombre de nuestra BD
	$usuariodb = "id17855177_moniraspyardu";    // sera el nombre de usuario BD
	$clavedb = "pTzi@#WbCN?K4zES";    // sera la contraseña de la bd

	error_reporting(1); //No me muestra errores sensibles de la conexion
	
	$conn = new mysqli($host,$usuariodb,$clavedb,$basededatos);	 // creando una variable $conn la estamos inizializando con el tipo mysqli
	
	mysqli_set_charset($conn, "utf8");//para evitar simbolos raros que reemplacen a los vacles acentuadas, simbolos especiales, la letra ñ etc

	if ($conn->connect_errno) {
		echo "Detalles durante la conexion...1x favor reiniciar la pagina";
		exit();
	}

}






if($ModoConexion == 2 ){ //en mi pc mi maquina local MARIA FERNANDA
	
	$host = "localhost";   //127.0.0.1 // esta es la referencia a la direccion del equipo donde esta ubicada la base de datos
	$basededatos = "id17855177_moniraspyardudb";    // sera el nombre de nuestra BD
	$usuariodb = "root";    // sera el nombre de usuario BD
	//$clavedb = "123";    // sera la contraseña de la bd
	$clavedb = "";    // sera la contraseña de la bd

	error_reporting(1); //No me muestra errores sensibles de la conexion
	
	$conn = new mysqli($host,$usuariodb,$clavedb,$basededatos);	 // creando una variable $conn la estamos inizializando con el tipo mysqli
	$con = mysqli_connect($host,$usuariodb,$clavedb,$basededatos);

	mysqli_set_charset($conn, "utf8");//para evitar simbolos raros que reemplacen a los vacles acentuadas, simbolos especiales, la letra ñ etc
	// Check connection
	// if (mysqli_connect_errno()) {
	// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	// 	exit();
	// }

	if ($conn->connect_errno) {
		echo "Nuestro sitio experimenta fallos....2!!!x favor reiniciar la pagina";
		exit();
	}

}



if($ModoConexion == 3 ){ //en mi pc mi maquina local
	
	$host = "localhost";   //127.0.0.1 // esta es la referencia a la direccion del equipo donde esta ubicada la base de datos
	$basededatos = "id17668795_bd_pixelasistencias";    // sera el nombre de nuestra BD
	$usuariodb = "ronny";    // sera el nombre de usuario BD
	$clavedb = "";    // sera la contraseña de la bd

	error_reporting(1); //No me muestra errores sensibles de la conexion
	
	$conn = new mysqli($host,$usuariodb,$clavedb,$basededatos);	 // creando una variable $conn la estamos inizializando con el tipo mysqli
	
	mysqli_set_charset($conn, "utf8");//para evitar simbolos raros que reemplacen a los vacles acentuadas, simbolos especiales, la letra ñ etc

	if ($conn->connect_errno) {
		echo "Nuestro sitio experimenta fallos....3!!x favor reiniciar la pagina";
		exit();
	}

}



?>
