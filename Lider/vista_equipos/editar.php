<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear equipo</title>
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
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary bg-opacity-10 py-3">
                        <h2 class="h4 mb-0 text-center text-primary">
                            <i class="bi bi-people-fill me-2"></i>Nuevo Equipo
                        </h2>
                    </div>

                    <div class="card-body p-4">
                        <form action="index.php">
                            <div class="mb-4">
                                <label class="form-label text-muted mb-2">Descripción</label>
                                <textarea class="form-control form-control-lg" rows="3"
                                    placeholder="Descripción del equipo"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted mb-2">Estado del equipo</label>
                                <input type="text" name="estado_equipo" class="form-control form-control-lg"
                                    placeholder="Estado actual del equipo">
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted mb-2">Integrantes</label>
                                <select name="integrante" class="form-select form-select-lg">
                                    <option selected disabled>Seleccionar integrante</option>
                                    <option value="1">Integrante 1</option>
                                    <option value="2">Integrante 2</option>
                                    <option value="3">Integrante 3</option>
                                </select>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg py-3">
                                    <i class="bi bi-save-fill me-2"></i>Guardar Equipo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>