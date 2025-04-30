<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --color-primary: #2A5C82;
            --color-secondary: #E8F3FF;
            --color-accent: #6BA4D9;
            --color-text: #2D3748;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--color-text);
        }
        
        .card-header-custom {
            background-color: white;
            border-bottom: 2px solid var(--color-primary);
            color: var(--color-primary);
        }
        
        .table-custom thead {
            background-color: var(--color-secondary);
            color: var(--color-primary);
        }
        
        .btn-soft-primary {
            background-color: var(--color-secondary);
            color: var(--color-primary);
            border: 1px solid var(--color-primary);
            transition: all 0.3s ease;
        }
        
        .btn-soft-primary:hover {
            background-color: var(--color-primary);
            color: white;
        }
        
        .status-badge {
            background-color: var(--color-secondary);
            color: var(--color-primary);
            padding: 0.5em 1em;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(232, 243, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="card-header card-header-custom py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="h4 mb-0 fw-normal"><i class="bi bi-people me-2"></i>Gestor de Equipos</h2>
                            <a href="calendario.php" class="btn btn-soft-primary">
                                <i class="bi bi-calendar-week me-2"></i>Calendario General
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-custom table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Fecha creación</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Integrantes</th>
                                        <th>Proyecto</th>
                                        <th class="text-end pe-4">
                                            actividades
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conexion = mysqli_connect("localhost", "root", "", "gestor_proyectos") or die("Error de conexión");
                                    $consulta = "SELECT * FROM equipos";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($row = mysqli_fetch_row($resultado)) {
                                        echo '<tr>';
                                        echo '<td class="ps-4 text-muted">' . $row[1] . '</td>';
                                        echo '<td>' . $row[2] . '</td>';
                                        echo '<td><span class="status-badge">' . $row[3] . '</span></td>';
                                        echo '<td><div class="d-flex align-items-center">';
                                        // Suponiendo que los integrantes están separados por comas
                                        $integrantes = explode(',', $row[4]);
                                        foreach ($integrantes as $integrante) {
                                            echo '<span class="badge bg-light text-primary me-1">' . trim($integrante) . '</span>';
                                        }
                                        echo '</div></td>';
                                        echo '<td class="fw-medium">' . $row[5] . '</td>';
                                        echo '<td class="text-end pe-4">';
                                        echo '<a href="calendario.php?proyecto_id=' . $row[5] . '" class="btn btn-sm btn-soft-primary">';
                                        echo '<i class="bi bi-calendar me-1"></i>Ver calendario';
                                        echo '</a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>