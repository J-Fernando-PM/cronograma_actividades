<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container">
            <?php include '../navbar/nav.php'; ?>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Crear proyecto</h2>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="mb-3">
                                <label for="nombre_proyecto" class="form-label text-primary">Nombre del
                                    proyecto:</label>
                                <input type="text" name="nombre_proyecto" id="nombre_proyecto" class="form-control"
                                    placeholder="Nombre del proyecto">
                            </div>
                            <input type="text" name="nombre_p" id="nombre_p" class="form-control"
                                placeholder="Nombre del proyecto">
                    </div>
                    <div class="mb-3">
                        <label for="equipo" class="form-label text-primary">proyecto</label>
                        <select name="equipo" id="equipo" class="form-select">
                            <option selected>Elige tu proyecto</option>
                            <option value="1">proyecto 1</option>
                            <option value="2">proyecto 2</option>
                            <option value="3">proyecto 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_i" class="form-label text-primary">Fecha inicio:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_final" class="form-label text-primary">Fecha fin:</label>
                        <input type="date" name="fecha_final" id="fecha_final" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Crear proyecto</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php

?>

</html>