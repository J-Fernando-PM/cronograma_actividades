<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        color: #212529;
    }

    .table {
        background-color: #ffffff;
        border: 1px solid #dee2e6;
    }

    .table thead {
        background-color: #f1f1f1;
        color: #212529;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    h2 {
        color: #343a40;
    }

    .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-primary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
    </style>
</head>

<body>

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container">
            <?php include '../navbar/nav.php'; ?>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h2 class="mb-4 text-center">Listado de Proyectos</h2>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre del proyecto</th>
                            <th>Objetivos</th>
                            <th>Descripción</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $proyectos = [
                                ["nombre" => "Sistema de Gestión", "objetivos" => "Optimizar procesos", "descripcion" => "Desarrollo de software para gestión empresarial", "fecha_inicio" => "2024-01-15", "fecha_fin" => "2024-06-30"],
                                ["nombre" => "Plataforma E-learning", "objetivos" => "Facilitar educación online", "descripcion" => "Creación de una plataforma para cursos en línea", "fecha_inicio" => "2024-02-01", "fecha_fin" => "2024-09-15"],
                                ["nombre" => "Aplicación Móvil", "objetivos" => "Mejorar experiencia de usuarios", "descripcion" => "Desarrollo de app para reservas de eventos", "fecha_inicio" => "2024-03-10", "fecha_fin" => "2024-08-20"],
                                ["nombre" => "E-commerce", "objetivos" => "Impulsar ventas en línea", "descripcion" => "Desarrollo de una tienda en línea", "fecha_inicio" => "2024-04-05", "fecha_fin" => "2024-10-30"]
                            ];

                            foreach ($proyectos as $proyecto) {
                                echo "<tr>
                                    <td>{$proyecto['nombre']}</td>
                                    <td>{$proyecto['objetivos']}</td>
                                    <td>{$proyecto['descripcion']}</td>
                                    <td>{$proyecto['fecha_inicio']}</td>
                                    <td>{$proyecto['fecha_fin']}</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <form action="create_proyecto.php">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <a id="guardar" name="guardar" type="submit" class="btn btn-primary"
                                href="../proyectos_vista/CreateProyectos.php">Agregar
                                proyecto</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>