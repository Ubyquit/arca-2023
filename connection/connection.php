<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "arca";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Configurar el conjunto de caracteres
$conn->set_charset("utf8");

?>
