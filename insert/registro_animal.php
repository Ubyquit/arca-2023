<?php
print_r($_POST);

$nombre_animal = $_POST['nombre_animal'];
$descripcion_animal = $_POST['descripcion_animal'];
$id_clasificacion = $_POST['id_clasificacion'];
$id_alimentacion = $_POST['id_alimentacion'];
$id_habitat = $_POST['id_habitat'];

include('../connection/connection.php');

$consulta = "INSERT INTO animal (
    nombre_animal,
    descripcion_animal,
    id_clasificacion_id,
    id_alimentacion_id,
    id_habitat_id) VALUE (
    '$nombre_animal',
    '$descripcion_animal',
    '$id_clasificacion',
    '$id_alimentacion',
    '$id_habitat')";

$resultado = mysqli_query($conn, $consulta);

header('Location: ../animales.php');

?>