<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="container">
            <?php include '../navbar/nav.php'; ?>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary">Lista de Usuarios</h2>
            <button class="btn btn-success" id="openModalBtn">Crear Usuario</button>
        </div>

        <input type="text" class="form-control mb-3" id="searchInput" placeholder="Buscar usuarios..."
            onkeyup="searchUsers()">

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = [
                    ['id' => 1, 'nombre' => 'Memo', 'email' => 'memo@example.com', 'rol' => 'Administrador'],
                    ['id' => 2, 'nombre' => 'Alejandra', 'email' => 'alejandra@example.com', 'rol' => 'Usuario'],
                    ['id' => 3, 'nombre' => 'Carlos', 'email' => 'carlos@example.com', 'rol' => 'Líder'],
                ];
                foreach ($usuarios as $usuario) {
                    echo "<tr>
                            <td>{$usuario['id']}</td>
                            <td>{$usuario['nombre']}</td>
                            <td>{$usuario['email']}</td>
                            <td>{$usuario['rol']}</td>
                            <td>
                                <button class='btn btn-warning btn-sm' onclick='openEditModal({$usuario['id']}, \"{$usuario['nombre']}\", \"{$usuario['email']}\", \"{$usuario['rol']}\")'>Editar</button>
                                <button class='btn btn-danger btn-sm'>Eliminar</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Edición -->
    <div id="editUserModal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editUserId">
                        <div class="mb-3">
                            <label for="editNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editNombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRol" class="form-label">Rol</label>
                            <select class="form-control" id="editRol" name="rol" required>
                                <option value="Administrador">Administrador</option>
                                <option value="Usuario">Usuario</option>
                                <option value="Líder">Líder</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function searchUsers() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            row.style.display = name.includes(input) ? '' : 'none';
        });
    }

    function openEditModal(id, nombre, email, rol) {
        document.getElementById('editUserId').value = id;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editEmail').value = email;
        document.getElementById('editRol').value = rol;
        let editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
        editModal.show();
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>