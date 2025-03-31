<link rel="stylesheet" href="CSS/style.css" />
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Proyecto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Usuarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="usuariosDropdown">
                        <li><a class="dropdown-item" href="usuarios/usuario.php">Lista de usuarios</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="rolesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Roles
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="rolesDropdown">
                        <li><a class="dropdown-item" href="#">Lista de roles</a></li>
                        <li><a class="dropdown-item" href="#">Crear nuevo rol</a></li>
                        <li><a class="dropdown-item" href="#">Editar rol</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="equiposDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Equipos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="equiposDropdown">
                        <li><a class="dropdown-item" href="#">Lista de equipos</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Crear nuevo equipo</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Agregar usuarios a equipo</a>
                        </li>
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
                            <a class="dropdown-item" href="#">Lista de proyectos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Crear nuevo proyecto</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Editar proyecto</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Asignar equipos a proyectos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Ver detalles del proyecto</a>
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
                            <a class="dropdown-item" href="#">Lista de actividades</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Crear nueva actividad</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Editar actividad</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Registrar horas utilizadas</a>
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