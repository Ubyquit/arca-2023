<?php

//print_r($_POST);

$nombre_habitat = $_POST['nombre_habitat'];

include('../connection/connection.php');

$consulta = "INSERT INTO habitat (nombre_habitat) VALUE ('$nombre_habitat')";

$resultado = mysqli_query($conn, $consulta);

header('Location: ../habitats.php');

?>