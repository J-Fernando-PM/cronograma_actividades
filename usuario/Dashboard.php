<?php
session_start();
include '../connection/connection.php'; // Conexión a la BD

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo '<script> 
            alert("Por favor, inicia sesión");
            window.location="../components/Login_Operario.php";
        </script>';
    session_destroy();
    die();
}

// Obtiene el ID del usuario desde la sesión
$id = $_SESSION['id_usuario'];

// Consulta para verificar si el usuario tiene rol de operario (id_rol = 3)
$consulta = "SELECT * FROM usuarios WHERE id_usuario = '$id' AND id_rol = 3";
$resultado = mysqli_query($conexion, $consulta);
$Operario = mysqli_fetch_assoc($resultado);

// Si el usuario no es operario, redirigirlo
if (!$Operario) {
    echo '<script>
            alert("Acceso denegado. No tienes permisos de Operario.");
            window.location="../Index.php";
        </script>';
    session_destroy();
    die();
}

// Cerrar conexión
mysqli_close($conexion);
?>

<?php
// Conexión a la BD (reabrimos para las consultas)
include '../connection/connection.php';

// Contar proyectos
$consulta_peroyectos = mysqli_query($conexion, "SELECT COUNT(DISTINCT id_equipo) AS total FROM detalle_equipos WHERE id_usuario = '$id'");
$total_proyectos = mysqli_fetch_assoc($consulta_peroyectos)['total'];

// Contar equipos
$consulta_equipos = mysqli_query($conexion, "SELECT COUNT(DISTINCT id_equipo) AS total FROM detalle_equipos WHERE id_usuario = '$id'");
$total_equipos = mysqli_fetch_assoc($consulta_equipos)['total'];

// Contar actividades
$consulta_actividades = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM actividades_proyecto WHERE id_usuario = '$id'");
$total_actividades = mysqli_fetch_assoc($consulta_actividades)['total'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      <style>

     /* Paleta de colores actualizada */
    :root {
      --fondo-oscuro: #0A0A0A;
      --fondo-secundario: #1A1A1A;
      --dorado-principal: #FFD700;
      --dorado-secundario: #D4AF37;
      --texto-blanco: #FFFFFF;
      --texto-gris: #CCCCCC;
    }

    /* Resto del CSS corregido */
    body {
      background-color: var(--fondo-oscuro);
      color: var(--texto-blanco);
    }

    .card {
      background: var(--fondo-secundario) !important;
      border: 1px solid var(--dorado-secundario) !important;
      color: var(--texto-blanco) !important;
    }

    .table {
      --bs-table-bg: var(--fondo-secundario);
      --bs-table-striped-bg: #252525;
      --bs-table-hover-bg: #303030;
      --bs-table-color: var(--texto-blanco);
      --bs-table-striped-color: var(--texto-blanco);
      --bs-table-hover-color: var(--texto-blanco);
    }

    .table thead {
      background-color: var(--dorado-secundario) !important;
      color: var(--fondo-oscuro) !important;
    }

    .btn-primary {
      background-color: var(--dorado-principal);
      border-color: var(--dorado-secundario);
      color: var(--fondo-oscuro) !important;
    }


    /* Paleta de colores */
:root {
  --fondo-oscuro: #0A0A0A;
  --fondo-secundario: #1A1A1A;
  --dorado-principal: #FFD700;
  --dorado-secundario: #D4AF37;
  --texto-blanco: #FFFFFF;
  --texto-gris: #CCCCCC;
}

/* Estructura principal */
body {
  background-color: var(--fondo-oscuro);
  color: var(--texto-blanco);
  font-family: 'Segoe UI', system-ui, sans-serif;
}

/* Sidebar mejorado */
.sidebar {
  background: linear-gradient(to bottom, #2d2d2d, #3d3d3d, #4d4d4d, #d4af37);
  width: 280px;
  min-height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
  padding: 25px 20px;
  box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
  border-right: 2px solid #d4af37;
  z-index: 1000;
}

.sidebar h2 {
  color: #ffffff;
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 2px;
  margin-bottom: 40px;
  padding-bottom: 15px;
  border-bottom: 1px solid rgba(212, 175, 55, 0.3);
  text-align: center;
  font-size: 1.4rem;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar ul li {
  margin: 12px 0;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 6px;
  position: relative;
  overflow: hidden;
}

.sidebar ul li a {
  color: #e0e0e0;
  text-decoration: none;
  padding: 14px 20px;
  display: flex;
  align-items: center;
  gap: 15px;
  font-size: 1.05rem;
  position: relative;
  z-index: 1;
  border-radius: 6px;
  transition: all 0.3s ease;
}

.sidebar ul li a:hover {
  background: rgba(255, 255, 255, 0.05);
  color: #d4af37;
  transform: translateX(10px);
}

.sidebar ul li a i {
  width: 25px;
  font-size: 1.2rem;
  color: #d4af37;
  transition: color 0.3s ease;
}

/* Contenido Principal */
.main-content {
  margin-left: 280px;
  padding: 25px;
  background-color: var(--fondo-oscuro);
  min-height: 100vh;
}

/* Navbar */
.navbar {
  background: var(--fondo-secundario) !important;
  border-bottom: 1px solid var(--dorado-principal);
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  color: var(--dorado-principal);
}

.navbar i {
  color: var(--dorado-principal);
}

/* Tarjetas */
.card {
  background: var(--fondo-secundario);
  border: 1px solid var(--dorado-secundario);
  border-radius: 1rem;
  color: var(--texto-blanco);
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-title {
  color: var(--dorado-principal) !important;
}

/* Tablas */
.table {
  --bs-table-bg: var(--fondo-secundario);
  --bs-table-striped-bg: #252525;
  --bs-table-hover-bg: #303030;
  color: var(--texto-blanco);
  border: 1px solid #333333;
}

.table thead {
  background-color: var(--dorado-principal) !important;
  color: var(--fondo-oscuro) !important;
}

.table thead th {
  border-bottom: 2px solid var(--dorado-secundario);
}

/* Botones */
.btn-primary {
  background-color: var(--dorado-principal);
  border-color: var(--dorado-secundario);
  color: var(--fondo-oscuro);
}

.btn-primary:hover {
  background-color: var(--dorado-secundario);
  border-color: var(--dorado-principal);
}

.btn-success {
  background-color: #28a745;
  border-color: #218838;
}

.btn-warning {
  background-color: #ffc107;
  border-color: #e0a800;
  color: var(--fondo-oscuro);
}

/* Scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: var(--fondo-oscuro);
}

::-webkit-scrollbar-thumb {
  background: var(--dorado-principal);
  border-radius: 4px;
}
   </style>
</head>

<style>
    .card {
        border-radius: 1rem;
    }
</style>
</head>

<style>
    .card {
        border-radius: 1rem;
    }
</style>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Operario Panel</h2>
        <ul>
            <li><a href="Dashboard.php"><i class="fas fa-chart-line"></i> Dashboard</a></li>
            <li><a href="Dashboard_proyecto.php"><i class="fas fa-box"></i> Proyectos</a></li>
            <li><a href="Dashboard_equipo.php"><i class="fas fa-users"></i> Equipos</a></li>
            <li><a href="Dashboard_actividades.php"><i class="fas fa-users"></i> Actividades</a></li>
            <li><a href="../Logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h4 class="me-auto"><b>Dashboard</b></h4>
                <div class="d-flex align-items-center">
                    <span class="me-3"><i class="fas fa-bell"></i> <b>Notificaciones</b></span>
                    <span class="me-3"><i class="fas fa-user"></i> <b><?php echo $Operario['n_usuario']; ?> <?php echo $Operario['a_p']; ?> <?php echo $Operario['a_m']; ?></b></span>
                    <a href="../Logout.php" class="btn btn-danger btn-sm">Cerrar sesión</a>
                </div>
            </div>
        </nav>
        <!-- Proyectos Asignados -->
        <div class="container mt-4">
            <div class="row g-3">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="card text-dark bg-light mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title"><b>Proyectos Asignados (Total: </b><?php echo $total_proyectos; ?>)</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">ID Proyecto</th>
                                                <th scope="col">Nombre Proyecto</th>
                                                <th scope="col">Fecha de Inicio</th>
                                                <th scope="col">Fecha de Fin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Consulta para obtener los proyectos designado al Operario
                                            $resultado_proyectos = mysqli_query($conexion, "SELECT p.id_proyecto, p.n_proyecto, p.fecha_inicio, p.fecha_fin
                                            FROM detalle_equipos de JOIN equipos e ON de.id_equipo = e.id_equipo JOIN proyectos p ON e.id_proyecto = p.id_proyecto 
                                            WHERE de.id_usuario = '$id' GROUP BY p.id_proyecto, p.n_proyecto, p.fecha_inicio, p.fecha_fin LIMIT 3");
                                            while ($proyecto = mysqli_fetch_assoc($resultado_proyectos)) : ?>
                                                <tr>
                                                    <td><?php echo $proyecto['id_proyecto']; ?></td>
                                                    <td><?php echo $proyecto['n_proyecto']; ?></td>
                                                    <td><?php echo $proyecto['fecha_inicio']; ?></td>
                                                    <td><?php echo $proyecto['fecha_fin']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="Dashboard_proyecto.php" class="btn btn-primary btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <!-- Equipos designados al Operario -->
                    <div class="col-md-6">
                        <div class="card text-dark bg-light mb-3 shadow">
                            <div class="card-body">
                                <h5><b>Equipos Asignados (Total: </b><?php echo $total_equipos; ?>)</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">ID Equipo</th>
                                                <th scope="col">Proyecto</th>
                                                <th scope="col">Miembros</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Consulta para obtener los equipos creados por el líder
                                            $resultado_equipos = mysqli_query($conexion, "SELECT e.id_equipo, p.n_proyecto, GROUP_CONCAT(u.n_usuario SEPARATOR ', ') AS miembros
                                            FROM detalle_equipos de JOIN equipos e ON de.id_equipo = e.id_equipo JOIN proyectos p ON e.id_proyecto = p.id_proyecto
                                            JOIN detalle_equipos de2 ON e.id_equipo = de2.id_equipo JOIN usuarios u ON de2.id_usuario = u.id_usuario
                                            WHERE de.id_usuario = '$id' GROUP BY e.id_equipo, p.n_proyecto LIMIT 3");
                                            // Verifica si la consulta tiene resultados
                                            if ($resultado_equipos) {
                                                while ($equipo = mysqli_fetch_assoc($resultado_equipos)) : ?>
                                                    <tr>
                                                        <td><?php echo $equipo['id_equipo']; ?></td>
                                                        <td><?php echo $equipo['n_proyecto']; ?></td>
                                                        <td><?php echo $equipo['miembros']; ?></td>
                                                    </tr>
                                            <?php endwhile;
                                            } else {
                                                echo "<tr><td colspan='3'>No se encontraron equipos.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="Dashboard_equipo.php" class="btn btn-success btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <!-- Actividades designadas al Operario -->
                    <div class="col-md-6">
                        <div class="card text-dark bg-light mb-3 shadow">
                            <div class="card-body">
                                <h5><b>Actividades Asignadas (Total: </b><?php echo $total_actividades; ?>)</b></h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">ID Actividad</th>
                                                <th scope="col">Actividad</th>
                                                <th scope="col">Fecha Inical</th>
                                                <th scope="col">Fecha Final</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $consulta_actividades = "SELECT ap.id_actividad_proyecto, ap.n_actividad, ap.descripcion, ap.fecha_inicio, ap.fecha_fin, ap.horas_estimadas, 
                                            ap.horas_utilizadas, p.id_proyecto, p.n_proyecto AS nombre_proyecto, u.id_usuario, u.n_usuario AS nombre_responsable
                                            FROM actividades_proyecto ap JOIN proyectos p ON ap.id_proyecto = p.id_proyecto JOIN usuarios u ON ap.id_usuario = u.id_usuario
                                            WHERE ap.id_usuario = '$id' LIMIT 3";
                                            $resultado_actividades = mysqli_query($conexion, $consulta_actividades);
                                            while ($actividad = mysqli_fetch_assoc($resultado_actividades)) : ?>
                                                <tr>
                                                    <td><?php echo $actividad['id_actividad_proyecto']; ?></td>
                                                    <td><?php echo $actividad['n_actividad']; ?></td>
                                                    <td><?php echo $actividad['fecha_inicio']; ?></td>
                                                    <td><?php echo $actividad['fecha_fin']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="Dashboard_actividades.php" class="btn btn-warning btn-sm">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap y JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>