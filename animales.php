<?php
include('connection/connection.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Animales</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
    <header>
        <!-- place navbar here -->
        <?php include('partials/nav.html'); ?>

    </header>
    <br>
    <main class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- ========== Start FORM ========== -->
                <form class="was-validated" action="insert/registro_animal.php" method="post">
                    <br>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre_animal" name="nombre_animal"
                            placeholder="name@example.com" required>
                        <label for="nombre_animal">Nombre del animal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_animal"
                            name="descripcion_animal" style="height: 100px" required></textarea>
                        <label for="descripcion_animal">Descripción del animal</label>
                    </div>
                    <!-- Clasificacion -->
                    <div class="form-floating mb-3">
                        <select name="id_clasificacion" class="form-select">
                            <?php
                            // Obtener el  de clasificaciones
                            $sql = "SELECT * FROM clasificacion";
                            $result = $conn->query($sql);

                            while ($fila = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $fila['id_clasificacion'] ?>"><?php echo $fila['nombre_clasificacion'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label">Clasificación</label>
                    </div>
                    <!-- Alimentacion -->
                    <div class="form-floating mb-3">
                        <select name="id_alimentacion" class="form-select">
                            <?php
                            // Obtener el  de clasificaciones
                            $sql = "SELECT * FROM alimentacion";
                            $result = $conn->query($sql);

                            while ($fila = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $fila['id_alimentacion'] ?>"><?php echo $fila['tipo_alimento'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label class="form-label">Alimentacion</label>
                    </div>
                    <!-- Habitat -->
                    <div class="form-floating mb-3">
                        <select name="id_habitat" class="form-select">
                            <?php
                            // Obtener el  de clasificaciones
                            $sql = "SELECT * FROM habitat";
                            $result = $conn->query($sql);

                            while ($fila = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $fila['id_habitat'] ?>"><?php echo $fila['nombre_habitat'] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label class="form-label">Habitat</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
                <!-- ========== End FORM ========== -->
            </div>

            <div class="col-md-9">
                <table id="table" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre animal</th>
                            <th scope="col">Clasificacion</th>
                            <th scope="col">Alimentacion</th>
                            <th scope="col">Habitat</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = "SELECT id_animal,nombre_animal,nombre_clasificacion,tipo_alimento,nombre_habitat FROM animal
                                INNER JOIN clasificacion ON animal.id_clasificacion_id = clasificacion.id_clasificacion
                                INNER JOIN alimentacion ON animal.id_alimentacion_id = alimentacion.id_alimentacion
                                INNER JOIN habitat ON animal.id_habitat_id = habitat.id_habitat ORDER BY id_animal";
                        $resultado = mysqli_query($conn, $consulta);

                        while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $fila['id_animal'] ?>
                                </th>
                                <td>
                                    <?php echo $fila['nombre_animal'] ?>
                                </td>
                                <td>
                                    <?php echo $fila['nombre_clasificacion'] ?>
                                </td>
                                <td>
                                    <?php echo $fila['tipo_alimento'] ?>
                                </td>
                                <td>
                                    <?php echo $fila['nombre_habitat'] ?>
                                </td>
                                <td>
                                    <a href="delete/eliminar_animal.php?id_animal=<?php echo $fila['id_animal'] ?>">
                                        <i class="bi bi-trash2-fill text-danger" style="font-size: 1.5rem;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="update/animal.php?id_animal=<?php echo $fila['id_animal'] ?>">
                                        <i class="bi bi-arrow-clockwise text-warning" style="font-size: 1.5rem;"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/sp-2.1.2/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/sp-2.1.2/datatables.min.js"></script>
    <script src="assets/js/datatables.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>