<?php
include '../include/conexion.php';



$titulo_pagina = "Datos";
$titulo_modulo = "Datos";

$modo_modulo = 0;//0=modo desarrollo, 1=modo listo para usar

//titulos de la tabla
$tabla="producto";
$campo0 = "id";
$campo1 = "Descripción";
$campo2 = "Min";
$campo3 = "Max";




//nombre de campos de la tabla
$dato0 = "id";
$dato1 = "descripcion";
$dato2 = "costo1";
$dato3 = "costo2";





//toda la data a mostrar en la tabla de registros previamente guardados
$sql = "SELECT *, ".$tabla.".id as empid FROM ".$tabla." where estado_registro = '1' order by ".$tabla.".id desc";

$query = $conn->query($sql);


?>