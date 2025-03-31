<?php
// Simulando una conexión a la base de datos con datos ficticios
$proyectos = [
    ["nombre" => "Sistema de Gestión", "objetivos" => "Optimizar procesos", "descripcion" => "Desarrollo de software para gestión empresarial", "fecha_inicio" => "2024-01-15", "fecha_fin" => "2024-06-30", "lider" => "Juan Pérez"],
    ["nombre" => "Plataforma E-learning", "objetivos" => "Facilitar educación online", "descripcion" => "Creación de una plataforma para cursos en línea", "fecha_inicio" => "2024-02-01", "fecha_fin" => "2024-09-15", "lider" => "Ana Martínez"],
    ["nombre" => "Aplicación Móvil", "objetivos" => "Mejorar experiencia de usuarios", "descripcion" => "Desarrollo de app para reservas de eventos", "fecha_inicio" => "2024-03-10", "fecha_fin" => "2024-08-20", "lider" => "Carlos Gómez"],
    ["nombre" => "E-commerce", "objetivos" => "Impulsar ventas en línea", "descripcion" => "Desarrollo de una tienda en línea", "fecha_inicio" => "2024-04-05", "fecha_fin" => "2024-10-30", "lider" => "Juan Pérez"],
    ["nombre" => "App de Salud", "objetivos" => "Mejorar bienestar personal", "descripcion" => "Desarrollo de una app para seguimiento de salud", "fecha_inicio" => "2024-05-15", "fecha_fin" => "2024-11-01", "lider" => "Ana Martínez"],
    ["nombre" => "Sistema de Inventario", "objetivos" => "Control de productos en almacén", "descripcion" => "Desarrollo de sistema para gestión de inventarios", "fecha_inicio" => "2024-06-01", "fecha_fin" => "2024-12-15", "lider" => "Carlos Gómez"]
];

// Obtener los líderes únicos
$leaders = array_unique(array_column($proyectos, 'lider'));

// Filtrar proyectos por líder
$searchLeader = isset($_GET['lider']) ? $_GET['lider'] : '';
if ($searchLeader) {
    $proyectos = array_filter($proyectos, function($proyecto) use ($searchLeader) {
        return $proyecto['lider'] == $searchLeader;
    });
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Proyectos por Líder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container">
            <?php include '../navbar/nav.php'; ?>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Listado de Proyectos por Líder</h2>

        <!-- Formulario para seleccionar líder -->
        <form method="GET" action="" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <select name="lider" class="form-control" required>
                        <option value="">Selecciona un líder</option>
                        <?php foreach ($leaders as $lider): ?>
                        <option value="<?php echo $lider; ?>" <?php echo $searchLeader == $lider ? 'selected' : ''; ?>>
                            <?php echo $lider; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100">Filtrar Proyectos</button>
                </div>
            </div>
        </form>

        <!-- Tabla de proyectos -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre del Proyecto</th>
                    <th>Objetivos</th>
                    <th>Descripción</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($proyectos) > 0) {
                    foreach ($proyectos as $proyecto) {
                        echo "<tr>
                            <td>{$proyecto['nombre']}</td>
                            <td>{$proyecto['objetivos']}</td>
                            <td>{$proyecto['descripcion']}</td>
                            <td>{$proyecto['fecha_inicio']}</td>
                            <td>{$proyecto['fecha_fin']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay proyectos para este líder.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>