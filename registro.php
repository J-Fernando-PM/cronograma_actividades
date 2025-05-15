<?php
session_start();
include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n_usuario = $_POST['n_usuario'];
    $a_p = $_POST['a_p'];
    $a_m = $_POST['a_m'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena_confirmada = $_POST['contrasena_confirmada'];
    $id_rol = $_POST['id_rol'];  // Se elige el rol al registrar el usuario

    // Validar que las contraseñas coincidan
    if ($contrasena !== $contrasena_confirmada) {
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header("Location: registro.php");
        exit();
    }

    // Hashear la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Validar que el correo no esté registrado
    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['error'] = "El correo ya está registrado.";
        header("Location: registro.php");
        exit();
    }

    // Insertar el nuevo usuario en la base de datos
    $query = "INSERT INTO usuarios (n_usuario, a_p, a_m, edad, correo, contrasena, id_rol) VALUES (?, ?, ?, ?,?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "sssissi", $n_usuario, $a_p, $a_m, $edad, $correo, $contrasena_hash, $id_rol);
    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        $_SESSION['success'] = "Usuario registrado exitosamente.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="flex min-h-full flex-col items-center justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-32 w-auto" src="image/Logo itss.jpg" alt="Tec">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrarse</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="" method="POST">

                <div>
                    <label for="n_usuario" class="block text-sm font-medium leading-6 text-gray-900">Nombre de Usuario</label>
                    <div class="mt-2">
                        <input id="n_usuario" name="n_usuario" type="text" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="a_p" class="block text-sm font-medium leading-6 text-gray-900">Apellido Paterno</label>
                    <div class="mt-2">
                        <input id="a_p" name="a_p" type="text" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="a_m" class="block text-sm font-medium leading-6 text-gray-900">Apellido Materno</label>
                    <div class="mt-2">
                        <input id="a_m" name="a_m" type="text" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="edad" class="block text-sm font-medium leading-6 text-gray-900">Edad</label>
                    <div class="mt-2">
                        <input id="edad" name="edad" type="number" min="1" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="correo" class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
                    <div class="mt-2">
                        <input id="correo" name="correo" type="email" required autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="contrasena" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                    <div class="mt-2">
                        <input id="contrasena" name="contrasena" type="password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="contrasena_confirmada" class="block text-sm font-medium leading-6 text-gray-900">Confirmar Contraseña</label>
                    <div class="mt-2">
                        <input id="contrasena_confirmada" name="contrasena_confirmada" type="password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="id_rol" class="block text-sm font-medium leading-6 text-gray-900">Seleccionar Rol</label>
                    <div class="mt-2">
                        <select id="id_rol" name="id_rol" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">Administrador</option>
                            <option value="2">Líder</option>
                            <option value="3">Usuario</option>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrarse</button>
                </div>

            </form>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="mt-4 text-red-600 text-center">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="mt-4 text-green-600 text-center">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>