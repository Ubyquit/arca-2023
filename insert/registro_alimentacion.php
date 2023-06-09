<?php

//print_r($_POST);

$tipo_alimento = $_POST['tipo_alimento'];

include('../connection/connection.php');

$consulta = "INSERT INTO alimentacion (tipo_alimento) VALUE ('$tipo_alimento')";

$resultado = mysqli_query($conn, $consulta);

header('Location: ../alimentaciones.php');

?>