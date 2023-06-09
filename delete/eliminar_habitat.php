<?php
    //print_r($_GET);

    $id_habitat = $_GET['id_habitat'];

    include('../connection/connection.php');

    $consulta = "DELETE FROM habitat WHERE id_habitat = $id_habitat";

    $resultado = mysqli_query($conn, $consulta);

    header('Location: ../habitats.php');

?>