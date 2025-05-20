<?php
include '../connection/connection.php'; // Conexión a la base de datos
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $pass = mysqli_real_escape_string($conexion, $_POST['pass']);

    // Consulta para verificar si el usuario existe
    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo' and pass = '$pass'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificación de contraseña
        if ($pass === $usuario['pass']) { // O usa password_verify($password, $usuario['pass']) si las contraseñas están encriptadas
            $_SESSION['id_usuario'] = $usuario['id_usuario']; // Guardar el ID en sesión
            $_SESSION['rol'] = $usuario['id_rol']; // Guardar el rol del usuario en sesión

            // Redirigir al dashboard según el rol
            if ($usuario['id_rol'] == 3) {
                header("Location: ../usuario/Dashboard.php");
            } else {
                header("Location: Login_Usuario.php");
            }
            exit();
        } else {
            echo '<script>alert("Contraseña incorrecta"); window.location="Login_Operario.php";</script>';
        }
    } else {
        echo '<script>alert("Correo no registrado"); window.location="Login_Operario.php";</script>';
    }
}
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuario</title>
       <style>
    :root {
        --fondo-oscuro: #0A0A0A;
        --fondo-secundario: #1A1A1A;
        --dorado-principal: #FFD700;
        --dorado-secundario: #D4AF37;
        --texto-blanco: #FFFFFF;
        --texto-gris: #CCCCCC;
    }

    body {
        background-color: var(--fondo-oscuro);
        color: var(--texto-blanco);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .card {
        background: var(--fondo-secundario) !important;
        border: 2px solid var(--dorado-secundario) !important;
        border-radius: 15px;
    }

    .form-control {
        background-color: #2A2A2A !important;
        border: 1px solid #333333 !important;
        color: var(--texto-blanco) !important;
    }

    .form-control:focus {
        border-color: var(--dorado-principal) !important;
        box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25) !important;
    }

    .btn-primary {
        background-color: var(--dorado-principal) !important;
        border-color: var(--dorado-secundario) !important;
        color: var(--fondo-oscuro) !important;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--dorado-secundario) !important;
        transform: translateY(-2px);
    }

    .form-label {
        color: var(--dorado-principal) !important;
        font-weight: 500;
    }

    ::placeholder {
        color: rgba(255, 255, 255, 0.5) !important;
    }

    h2 {
        color: var(--dorado-principal) !important;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    :root {
    --fondo-oscuro: #000000; /* Cambiado a negro puro */
    --fondo-secundario: #1A1A1A;
    --dorado-principal: #FFD700;
    --dorado-secundario: #D4AF37;
    --texto-blanco: #FFFFFF;
    --texto-gris: #CCCCCC;
}

body {
    background-color: var(--fondo-oscuro) !important; /* Fondo negro completo */
    color: var(--texto-blanco);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.card {
    background: var(--fondo-secundario) !important;
    border: 2px solid var(--dorado-secundario) !important;
    border-radius: 15px;
}
    </style>
</head>

<body>

    <?php include 'Navbar-Login.php'; ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required placeholder="Ingresa tu correo">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" required placeholder="Ingresa tu contraseña">
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>

</html>