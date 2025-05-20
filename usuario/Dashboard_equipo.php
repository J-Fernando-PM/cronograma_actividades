<?php
include '../connection/connection.php'; // Conexión a la BD
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo '<script> 
            alert("Por favor, inicia sesión");
            window.location="../components/Login_Lider.php";
        </script>';
    session_destroy();
    die();
}

// Obtiene el ID del usuario desde la sesión
$id = $_SESSION['id_usuario'];

// Consulta para verificar si el usuario tiene rol de Operario (id_rol = 3)
$consulta = "SELECT * FROM usuarios WHERE id_usuario = '$id' AND id_rol = 3";
$resultado = mysqli_query($conexion, $consulta);
$Operario = mysqli_fetch_assoc($resultado);

// Si el usuario no es admin, redirigirlo
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
include '../connection/connection.php';

// Obtener los equipos donde el operario participa, pero no es el creador
$query_equipos = "SELECT e.*, p.n_proyecto, GROUP_CONCAT(u.n_usuario SEPARATOR ', ') AS miembros FROM detalle_equipos de
    INNER JOIN equipos e ON de.id_equipo = e.id_equipo INNER JOIN proyectos p ON e.id_proyecto = p.id_proyecto
    LEFT JOIN detalle_equipos de2 ON de2.id_equipo = e.id_equipo LEFT JOIN usuarios u ON de2.id_usuario = u.id_usuario
    WHERE de.id_usuario = '$id' AND e.id_usuario != '$id' GROUP BY e.id_equipo, p.n_proyecto";
$resultado_equipos = mysqli_query($conexion, $query_equipos);

// Inicializamos la variable de búsqueda
$search = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = "%" . mysqli_real_escape_string($conexion, $_GET['search']) . "%";

    // Preparamos y vinculamos los parámetros
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssss", $search, $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Si no hay término de búsqueda, obtenemos todos los equipos
    $query = "SELECT equipos.* FROM equipos";
    $result = $conexion->query($query);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operario Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Paleta de colores */
        :root {
            --fondo-oscuro: #0A0A0A;
            --fondo-secundario: #1A1A1A;
            --dorado-principal: #FFD700;
            --dorado-secundario: #D4AF37;
            --texto-blanco: #FFFFFF;
            --texto-gris: #CCCCCC;
        }

        /* Añade estas reglas al CSS */
        .form-control,
        .form-select,
        .form-control:focus,
        .form-select:focus {
            background-color: #1A1A1A !important;
            border: 1px solid var(--dorado-principal) !important;
            color: var(--dorado-principal) !important;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25) !important;
        }

        .form-label {
            color: var(--dorado-principal) !important;
            font-weight: 500;
        }

        /* Placeholder dorado */
        ::placeholder {
            color: rgba(212, 175, 55, 0.7) !important;
        }

        /* Select personalizado */
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='%23d4af37' stroke='%23d4af37' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        /* Dropdowns */
        .dropdown-menu {
            background-color: #1A1A1A;
            border: 1px solid var(--dorado-principal);
        }

        .dropdown-item {
            color: var(--dorado-principal) !important;
        }

        .dropdown-item:hover {
            background-color: rgba(212, 175, 55, 0.1) !important;
        }

        /* Checkboxes y radios */
        .form-check-input:checked {
            background-color: var(--dorado-principal);
            border-color: var(--dorado-principal);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }

        /* Inputs deshabilitados */
        .form-control:disabled {
            background-color: #2A2A2A !important;
            opacity: 0.7;
            border-color: #666666 !important;
        }

        /* Inputs tipo fecha */
        .form-control[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.8) sepia(1) saturate(5) hue-rotate(10deg);
        }

        /* Cambiar color del ícono del calendario en inputs date */
        .form-control[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }

        /* Estructura principal */
        body {
            background-color: var(--fondo-oscuro);
            color: var(--texto-gris);
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        /* Sidebar mejorado */
        .sidebar {
            background: linear-gradient(to bottom, var(--fondo-secundario), #131313);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.3);
            border-right: 1px solid var(--dorado-principal);
        }

        .sidebar h2 {
            color: var(--dorado-principal);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 300;
            border-bottom: 1px solid var(--dorado-principal);
            padding-bottom: 15px;
        }

        .sidebar ul li {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar ul li:hover {
            border-left-color: var(--dorado-principal);
            background-color: rgba(255, 215, 0, 0.05);
        }

        .sidebar ul li a {
            color: var(--texto-gris);
            font-weight: 300;
        }

        .sidebar ul li a:hover {
            color: var(--dorado-principal);
        }

        /* Navbar superior */
        .navbar {
            background: var(--fondo-secundario) !important;
            border-bottom: 1px solid var(--dorado-principal);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar i {
            color: var(--dorado-principal);
        }

        /* Tabla personalizada */
        .table {
            --bs-table-bg: var(--fondo-secundario);
            --bs-table-striped-bg: #252525;
            --bs-table-hover-bg: #303030;
            color: var(--texto-gris);
            border: 1px solid #333333;
        }

        .table thead {
            background-color: var(--dorado-principal);
            color: var(--fondo-oscuro);
            font-weight: 500;
        }

        .table thead th {
            border-bottom: 2px solid var(--dorado-secundario);
        }

        /* Botones personalizados */
        .btn-primary {
            background-color: var(--dorado-principal);
            border-color: var(--dorado-secundario);
            color: var(--fondo-oscuro);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--dorado-secundario);
            border-color: var(--dorado-principal);
            transform: translateY(-1px);
        }

        .btn-outline-success {
            border-color: var(--dorado-principal);
            color: var(--dorado-principal);
        }

        .btn-outline-success:hover {
            background-color: var(--dorado-principal);
            color: var(--fondo-oscuro);
        }

        /* Modales */
        .modal-content {
            background-color: var(--fondo-secundario);
            border: 1px solid var(--dorado-principal);
        }

        .modal-header {
            border-bottom: 1px solid var(--dorado-principal);
        }

        .modal-title {
            color: var(--dorado-principal);
        }

        .form-control {
            background-color: #2A2A2A;
            border: 1px solid #333333;
            color: var(--texto-blanco);
        }

        .form-control:focus {
            background-color: #333333;
            border-color: var(--dorado-principal);
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }

        /* Tarjetas */
        .card {
            background: var(--fondo-secundario);
            border: 1px solid #333333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: var(--dorado-principal);
        }

        /* Efectos especiales */
        .table-hover tbody tr:hover {
            background-color: rgba(255, 215, 0, 0.05);
            cursor: pointer;
        }

        /* Scrollbar personalizada */
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

        /* Panel Lateral Izquierdo - Gradiente Gris a Dorado */
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

        .sidebar ul li::before {
            content: '';
            position: absolute;
            left: -100%;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right,
                    rgba(212, 175, 55, 0.1) 0%,
                    rgba(212, 175, 55, 0.3) 50%,
                    rgba(212, 175, 55, 0.1) 100%);
            transition: left 0.4s ease;
        }

        .sidebar ul li:hover::before {
            left: 100%;
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

        .sidebar ul li a:hover i {
            color: #ffd700;
        }

        /* Efecto activo */
        .sidebar ul li.active {
            background: linear-gradient(to right,
                    rgba(212, 175, 55, 0.15),
                    rgba(212, 175, 55, 0.05));
            border-left: 4px solid #d4af37;
        }

        .sidebar ul li.active a {
            color: #ffd700;
        }

        /* Separador decorativo */
        .sidebar::after {
            content: '';
            position: absolute;
            right: -2px;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom,
                    transparent 0%,
                    #d4af37 50%,
                    transparent 100%);
            opacity: 0.3;
        }

        /* Añadir estas reglas CSS */
        .sidebar {
            transition: all 0.3s ease-in-out;
            z-index: 1000;
        }

        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed h2 {
            font-size: 0;
            padding: 0;
            margin: 20px 0;
        }

        .sidebar.collapsed h2::after {
            content: "LP";
            font-size: 1.2rem;
        }

        .sidebar.collapsed ul li a span {
            display: none;
        }

        .sidebar.collapsed ul li a i {
            margin-right: 0;
        }

        .sidebar.collapsed:hover {
            width: 280px;
        }

        .sidebar.collapsed:hover h2 {
            font-size: 1.4rem;
        }

        .sidebar.collapsed:hover ul li a span {
            display: inline-block;
        }

        .toggle-btn {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(212, 175, 55, 0.2);
            border: 1px solid #d4af37;
            color: #ffd700;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: rgba(212, 175, 55, 0.3);
        }

        /* Añade estas reglas al CSS */
        .table tbody td {
            color: #ffffff !important;
            /* Color blanco para datos de tabla */
        }

        /* Para los textos en modales */
        .modal-body {
            color: #ffffff !important;
        }

        /* Para los textos en alertas */
        .alert {
            color: #ffffff !important;
        }

        /* Para los textos en botones dinámicos */
        .btn-sm {
            color: #ffffff !important;
        }

        /* Asegurar color en todos los textos dinámicos */
        body,
        .table,
        .modal-content {
            color: #ffffff !important;
        }

        /* Específico para celdas de tabla */
        .table td,
        .table th {
            --bs-table-color: #ffffff;
            --bs-table-striped-color: #ffffff;
            --bs-table-active-color: #ffffff;
            --bs-table-hover-color: #ffffff;
        }
    </style>
</head>

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
                <h4 class="me-auto"><b>Equipos Designados</b></h4>
                <div class="d-flex align-items-center">
                    <span class="me-3"><i class="fas fa-bell"></i> <b>Notificaciones</b></span>
                    <span class="me-3"><i class="fas fa-user"></i> <b><?php echo $Operario['n_usuario']; ?> <?php echo $Operario['a_p']; ?> <?php echo $Operario['a_m']; ?></b></span>
                    <a href="../Logout.php" class="btn btn-danger btn-sm">Cerrar sesión</a>
                </div>
            </div>
        </nav>

        <!-- Formulario y Tabla -->
        <div class="container mt-4">
            <div class="d-flex justify-content-between mb-3">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar usuario" name="search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID Equipo</th>
                        <th>Fecha de Creación</th>
                        <th>Descripción</th>
                        <th>Estado Equipo</th>
                        <th>Proyecto designado</th>
                        <th>Miembros</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($equipos = mysqli_fetch_assoc($resultado_equipos)) : ?>
                        <tr>
                            <td><?php echo $equipos['id_equipo']; ?></td>
                            <td><?php echo $equipos['fecha_creacion']; ?></td>
                            <td><?php echo $equipos['descripcion']; ?></td>
                            <td><?php echo $equipos['estado_equipo']; ?></td>
                            <td><?php echo $equipos['n_proyecto']; ?></td>
                            <td><?php echo $equipos['miembros']; ?></td> <!-- Aquí se muestran los miembros -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap y JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const btnIcon = document.querySelector('.toggle-btn i');

            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
            btnIcon.classList.toggle('fa-bars');
            btnIcon.classList.toggle('fa-times');
        }
        // Asegurar que el contenido principal se ajuste
        document.querySelector('.main-content').style.marginLeft = '280px';

        //Script de Modal de creación
        function openCreateModal() {
            const createModal = new bootstrap.Modal(document.getElementById('createModal'));
            createModal.show();
        }
    </script>
</body>

</html>