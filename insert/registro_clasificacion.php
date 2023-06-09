<?php

//print_r($_POST);

$nombre_clasificacion = $_POST['nombre_clasificacion'];

include('../connection/connection.php');

$consulta = "INSERT INTO clasificacion (nombre_clasificacion) VALUE ('$nombre_clasificacion')";

$resultado = mysqli_query($conn, $consulta);

header('Location: ../clasificaciones.php');

?>