<?php
include 'includes/db.php';
include 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $contrasena = hashContrasena($_POST['contrasena']);
    
    $stmt = $pdo->prepare("
        INSERT INTO usuarios 
        (n_usuario, a_p, a_m, edad, correo, contrasena, id_rol) 
        VALUES (?, ?, ?, ?, ?, ?, 1)
    ");
    $stmt->execute([$nombre, $apellido_p, $apellido_m, $edad, $correo, $contrasena]);
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <!-- Barra de navegación -->
    <nav class="nav">
        <div class="logo">Registrate</div>
        <ul>
            <li><a href="Index.html">Inicio</a></li>
        </ul>
    </nav>

    <!--Contenido-->
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Registrate</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Registrate Para poder hacer una solicitud</p>
        </div>

        <!--Inicia el Form-->
        <form action="altaRegistro.php" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                
                <!--NOMBRE-->
                <div class="sm:col-span-2">
                    <label for="nombre" class="block text-sm font-semibold leading-6 text-gray-900">Nombre</label>
                    <div class="mt-2.5">
                        <input type="texto" name="nombre" id="nombre" autocomplete="nombre" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!--A_PATERNO-->
                <div>
                    <label for="apellido_p" class="block text-sm font-semibold leading-6 text-gray-900">Apellido Paterno</label>
                    <div class="mt-2.5">
                        <input type="texto" name="apellido_p" id="apellido_p" autocomplete="apellido" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!--A_MATERNO-->
                <div>
                    <label for="apellido_m" class="block text-sm font-semibold leading-6 text-gray-900">Apellido Materno</label>
                    <div class="mt-2.5">
                        <input type="texto" name="apellido_m" id="apellido_m" autocomplete="apellido" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!--Edad-->
                <div class="sm:col-span-2">
                    <label for="edad" class="block text-sm font-semibold leading-6 text-gray-900">Edad</label>
                    <div class="mt-2.5">
                        <input type="number" name="edad" id="edad" autocomplete="edad" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!--CORREO-->
                <div class="sm:col-span-2">
                    <label for="correo" class="block text-sm font-semibold leading-6 text-gray-900">Correo</label>
                    <div class="mt-2.5">
                        <input type="email" name="correo" id="correo" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <!--CONTRASEÑA-->
                <div class="sm:col-span-2">
                    <label for="contrasena" class="block text-sm font-semibold leading-6 text-gray-900">Contraseña</label>
                    <div class="mt-2.5">
                        <input type="password" name="contrasena" id="contrasena" autocomplete="contrasena" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <!--BOTON-->
            <div class="mt-10">
                <button type="submit" id="Guardar" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Continuar</button>
            </div>
        </form><!--Termina el Form-->
    </div>

</body>

</html>