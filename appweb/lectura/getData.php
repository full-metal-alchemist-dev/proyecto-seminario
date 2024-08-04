<?php
include '../include/conexion.php';

  $sql = "SELECT costo2 FROM producto order by id desc limit 1";
  $query = $conn->query($sql);
  $row = $query->fetch_assoc();
  echo json_encode($row);

?>