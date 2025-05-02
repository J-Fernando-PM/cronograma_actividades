<?php
session_start();
// Agregar al inicio del archivo
$conexion = mysqli_connect("localhost", "root", "", "gestor_proyectos") or die("Error de conexión");

// Generar hash único para cada proyecto
function generarHash($id) {
    return hash('sha256', $id . uniqid());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de Trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --color-primary: #2563eb;
            --color-secondary: #bfdbfe;
            --color-accent: #60a5fa;
            --color-text: #1e293b;
            --color-surface: #ffffff;
        }

        body {
            background: #f8fafc;
            min-height: 100vh;
        }

        .team-card {
            background: var(--color-surface);
            border-radius: 1rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .card-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .status-active {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-inactive {
            background: #fee2e2;
            color: #dc2626;
        }

        .member-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--color-primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--color-secondary);
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .project-link:hover {
            background: var(--color-accent);
            color: white;
        }

        .date-badge {
            background: rgba(37, 99, 235, 0.1);
            color: var(--color-primary);
            padding: 0.25rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }
        .calendar-link {
    border: 1px solid var(--color-primary);
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.calendar-link:hover {
    background: var(--color-primary);
    color: white !important;
    transform: translateY(-2px);
}

.calendar-link:hover .text-muted {
    color: rgba(255,255,255,0.8) !important;
}
.title-container {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    width: 100%;
}

.team-card h3 {
    white-space: normal;
    word-wrap: break-word;
    overflow: visible;
    flex-grow: 1;
    min-width: 0; 
}
.team-card h3 {
    white-space: normal;
    word-wrap: break-word;
    overflow-y: auto;
    max-height: 100px;
    scrollbar-width: thin;
    scrollbar-color: var(--color-primary) transparent;
}


.team-card h3::-webkit-scrollbar {
    width: 4px;
}

.team-card h3::-webkit-scrollbar-thumb {
    background-color: var(--color-primary);
    border-radius: 4px;
}
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="h3 fw-bold text-primary">
                <i class="bi bi-people-fill me-2"></i>Equipos Activos
            </h1>
            <a href="calendario.php" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-calendar-week me-2"></i>Ver Calendario
            </a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            $consulta = "SELECT * FROM equipos";
            $resultado = mysqli_query($conexion, $consulta);

            while ($row = mysqli_fetch_row($resultado)) {
                $hash = generarHash($row[5]); // Generar hash único
                $_SESSION[$hash] = $row[5]; // Almacenar en sesión
                
                echo '<div class="col">';
                echo '<div class="team-card p-4">';
                echo '<div class="col">';
                echo '<div class="team-card p-4">';
                echo '<div class="card-status ' . ($row[3] == 'Activo' ? 'status-active' : 'status-inactive') . '">' . $row[3] . '</div>';
                
                echo '<div class="title-container mb-4">';
                echo '<div class="date-badge flex-shrink-0">' . $row[1] . '</div>';
                echo '<h3 class="h5 mb-0 text-primary fw-bold">' . $row[2] . '</h3>';
                echo '</div>';
                
                echo '<div class="mb-4">';
                echo '<p class="text-muted small mb-2">Integrantes:</p>';
                echo '<div class="d-flex flex-wrap gap-2">';
                $integrantes = explode(',', $row[4]);
                foreach ($integrantes as $integrante) {
                    echo '<div class="member-avatar">' . substr(trim($integrante), 0, 1) . '</div>';
                }
                echo '</div>';
                echo '</div>';
                
                echo '<div class="d-flex justify-content-between align-items-center">';
                echo '<a href="calendario.php?h=' . $hash . '" class="btn btn-sm btn-outline-primary d-flex align-items-center">';
                echo '<i class="bi bi-calendar-week fs-5 me-2"></i>';
                echo '<div>';
                echo '<small class="text-muted d-block">Proyecto:</small>';
                echo '<span>Ver detalles</span>'; // Cambiar texto que mostraba el ID
                echo '</div>';
                echo '</a>';
                echo '</div>';
                
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <footer class="mt-5 text-center text-muted small">
            Total equipos activos: <?php echo mysqli_num_rows($resultado); ?>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>