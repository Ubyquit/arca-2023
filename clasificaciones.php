<!doctype html>
<html lang="en">

<head>
    <title>Clasificacion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
                <form class="was-validated" action="insert/registro_clasificacion.php" method="post">
                    <br>
                    <div class="form-floating mb-3">
                        <input name="nombre_clasificacion" type="text" placeholder="name@example.com"
                            class="form-control" id="input_clasificacion" required>
                        <label for="input_clasificacion" class="form-label">Nombre de la clasificación</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
                <!-- ========== End FORM ========== -->
            </div>
            <div class="col-md-9">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre clasificacion</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('connection/connection.php');

                        $consulta = "SELECT * FROM clasificacion";
                        $resultado = mysqli_query($conn, $consulta);

                        while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $fila['id_clasificacion'] ?>
                                </th>
                                <td>
                                    <?php echo $fila['nombre_clasificacion'] ?>
                                </td>
                                <td>
                                    <a
                                        href="delete/eliminar_clasificacion.php?id_clasificacion=<?php echo $fila['id_clasificacion'] ?>">
                                        <i class="bi bi-trash2-fill text-danger" style="font-size: 1.5rem;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="update/clasificacion.php?id_clasificacion=<?php echo $fila['id_clasificacion'] ?>">
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