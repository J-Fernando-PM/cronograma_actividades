<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de equipos - E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container">
            <?php include '../navbar/nav.php'; ?>
        </div>
    </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary bg-opacity-10 py-3">
                        <h2 class="h5 mb-0 text-primary">Listado de Equipos - Proyecto E-Commerce</h2>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-primary bg-opacity-10">
                                    <tr>
                                        <th class="text-nowrap ps-4">Fecha creación</th>
                                        <th>Descripción</th>
                                        <th>Estado del equipo</th>
                                        <th>Integrantes</th>
                                        <th>Proyecto</th>
                                        <th class="text-center pe-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Fila de equipo de desarrollo backend -->
                                    <tr>
                                        <td class="ps-4">01/03/2025</td>
                                        <td>Equipo encargado del desarrollo backend de la plataforma e-commerce.</td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>Juan, Ana, Carlos</td>
                                        <td>Desarrollo Backend</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Fila de equipo de desarrollo frontend -->
                                    <tr>
                                        <td class="ps-4">05/03/2025</td>
                                        <td>Equipo encargado del desarrollo frontend de la plataforma e-commerce.</td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>Lucía, Roberto, Pedro</td>
                                        <td>Desarrollo Frontend</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Fila de equipo de marketing -->
                                    <tr>
                                        <td class="ps-4">10/03/2025</td>
                                        <td>Equipo encargado de las estrategias de marketing digital para el
                                            lanzamiento.</td>
                                        <td><span class="badge bg-warning">Pendiente</span></td>
                                        <td>María, Pablo, Clara</td>
                                        <td>Marketing Digital</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Fila de equipo de pruebas -->
                                    <tr>
                                        <td class="ps-4">12/03/2025</td>
                                        <td>Equipo encargado de las pruebas y control de calidad de la plataforma
                                            e-commerce.</td>
                                        <td><span class="badge bg-warning">Pendiente</span></td>
                                        <td>Laura, Santiago</td>
                                        <td>Pruebas y QA</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Fila de equipo de soporte -->
                                    <tr>
                                        <td class="ps-4">15/03/2025</td>
                                        <td>Equipo encargado del soporte técnico post-lanzamiento del proyecto
                                            e-commerce.</td>
                                        <td><span class="badge bg-danger">Inactivo</span></td>
                                        <td>David, Juan</td>
                                        <td>Soporte Técnico</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent py-3">
                        <div class="d-flex justify-content-end">
                            <a href="agregar_e.php" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Agregar equipo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>