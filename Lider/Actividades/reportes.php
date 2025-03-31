<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container">
            <?php include '../navbar/nav.php'; ?>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" onclick="openCreateModal()">Crear actividad nueva</button>
            <form class="d-flex" method="GET">
                <input class="form-control me-2" type="search" placeholder="Buscar actividad" name="search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Actividad</th>
                    <th>Tipo de Actividad</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Horas Utilizadas</th>
                    <th>Líder del Proyecto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí debes agregar los datos de actividades dinámicamente con PHP -->
                <?php
                    // Suponiendo que tienes una lista de actividades para mostrar
                    // Ejemplo de actividades
                    $actividades = [
                        ['id' => 1, 'actividad' => 'Desarrollo Frontend', 'tipo' => 'Desarrollo', 'inicio' => '2025-03-01', 'fin' => '2025-03-05', 'horas' => 40, 'lider' => 'Juan Pérez'],
                        ['id' => 2, 'actividad' => 'Revisión de código', 'tipo' => 'Revisión', 'inicio' => '2025-03-06', 'fin' => '2025-03-07', 'horas' => 8, 'lider' => 'Ana García'],
                    ];
                    
                    foreach ($actividades as $actividad) {
                        echo "<tr>";
                        echo "<td>{$actividad['actividad']}</td>";
                        echo "<td>{$actividad['tipo']}</td>";
                        echo "<td>{$actividad['inicio']}</td>";
                        echo "<td>{$actividad['fin']}</td>";
                        echo "<td>{$actividad['horas']}</td>";
                        echo "<td>{$actividad['lider']}</td>";  // Mostrar el líder del proyecto
                        echo "<td>
                                <button class='btn btn-info btn-sm' onclick='editActivity({$actividad['id']}, \"{$actividad['actividad']}\", \"{$actividad['tipo']}\", \"{$actividad['inicio']}\", \"{$actividad['fin']}\", {$actividad['horas']}, \"{$actividad['lider']}\")'>Editar</button>
                                <button class='btn btn-danger btn-sm'>Eliminar</button>
                              </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para editar actividad -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="editar.php">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label class="form-label">Actividad</label>
                            <input type="text" class="form-control" name="actividad" id="edit-actividad" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Actividad</label>
                            <input type="text" class="form-control" name="tipo_actividad" id="edit-tipo" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="edit-inicio" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" class="form-control" name="fecha_fin" id="edit-fin" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Horas Utilizadas</label>
                            <input type="number" class="form-control" name="horas_utilizadas" id="edit-horas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Líder del Proyecto</label>
                            <input type="text" class="form-control" name="lider" id="edit-lider" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Función para abrir el modal y cargar los datos de la actividad a editar
    function editActivity(id, actividad, tipo, inicio, fin, horas, lider) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-actividad').value = actividad;
        document.getElementById('edit-tipo').value = tipo;
        document.getElementById('edit-inicio').value = inicio;
        document.getElementById('edit-fin').value = fin;
        document.getElementById('edit-horas').value = horas;
        document.getElementById('edit-lider').value = lider;

        // Mostrar el modal
        var myModal = new bootstrap.Modal(document.getElementById('editModal'));
        myModal.show();
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>