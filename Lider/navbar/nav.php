<link rel="stylesheet" href="CSS/style.css" />
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Proyecto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Usuarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="usuariosDropdown">
                        <li><a class="dropdown-item" href="Usuarios/lisUsuarios.php">Lista de usuarios</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="equiposDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Equipos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="equiposDropdown">
                        <li><a class="dropdown-item" href="vista_equipos/index.php">Lista de equipos</a></li>

                        <li>
                            <a class="dropdown-item" href="#">Ver detalles de equipo</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="proyectosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Proyectos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="proyectosDropdown">
                        <li>
                            <a class="dropdown-item" href="proyectos_vista/listadoProyectos.php">Lista de
                                proyectos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="proyectos_vista/CreateProyectos.php">Crear nuevo
                                proyecto</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="actividadesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Actividades
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="actividadesDropdown">
                        <li>
                            <a class="dropdown-item" href="Actividades/reportes.php">Lista de actividades</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Crear nueva actividad</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Reportes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportesDropdown">
                        <li>
                            <a class="dropdown-item" href="crud_actividades/reportes.php">Reporte de actividades por
                                proyecto</a>
                        </li>
                </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>