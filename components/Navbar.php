<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --fondo-oscuro: #000000;
            --dorado-principal: #D4AF37;
            --dorado-secundario: #FFD700;
            --texto-blanco: #FFFFFF;
            --texto-gris: #CCCCCC;
        }

        .navbar {
            background-color: var(--fondo-oscuro) !important;
            border-bottom: 2px solid var(--dorado-principal);
            padding: 1rem 0;
        }

        .navbar-brand {
            color: var(--dorado-principal) !important;
            font-family: 'Segoe UI', sans-serif;
            font-weight: bold;
            font-size: 1.5rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--dorado-secundario) !important;
            transform: scale(1.05);
        }

        .nav-link {
            color: var(--texto-gris) !important;
            font-weight: 500;
            margin: 0 1rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--dorado-principal) !important;
            transform: translateY(-2px);
        }

        .btn-dorado {
            border: 2px solid var(--dorado-principal);
            color: var(--dorado-principal) !important;
            font-weight: bold;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-dorado:hover {
            background-color: var(--dorado-principal);
            color: var(--fondo-oscuro) !important;
            transform: translateY(-2px);
        }

        .navbar-toggler {
            border-color: var(--dorado-principal);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(212, 175, 55, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">WorkPilot</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex ms-auto">
                    <a href="components/escoge_lo.php" class="btn btn-dorado">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>