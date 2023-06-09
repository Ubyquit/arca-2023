<?php
include('connection/connection.php');



function obtenerAnimales() {
    global $conn;
    $sql = "SELECT * FROM animal";
    $result = $conn->query($sql);

    return $fila = mysqli_fetch_array($result);
}

// Función para obtener el  de clasificaciones
function obtenerClasificaciones() {
    global $conn;
    $sql = "SELECT * FROM clasificacion";
    $result = $conn->query($sql);
    return $fila = mysqli_fetch_array($result);
}

// Función para obtener el  de alimentaciones
function obtenerAlimentaciones() {
    global $conn;
    $sql = "SELECT * FROM alimentacion";
    $result = $conn->query($sql);
    return $fila = mysqli_fetch_array($result);
    ;
}

// Función para obtener el  de hábitats
function obtenerHabitats() {
    global $conn;
    $sql = "SELECT * FROM habitat";
    $result = $conn->query($sql);
    return $fila = mysqli_fetch_array($result);
}

// Obtener los es
$Animales = obtenerAnimales();
$Clasificaciones = obtenerClasificaciones();
$Alimentaciones = obtenerAlimentaciones();
$Habitats = obtenerHabitats();

// Cerrar conexión
$conn->close();
?>
