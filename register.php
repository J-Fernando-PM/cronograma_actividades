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
<html>
<body>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido_p" placeholder="Apellido Paterno" required>
        <input type="text" name="apellido_m" placeholder="Apellido Materno" required>
        <input type="number" name="edad" placeholder="Edad" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
    </form>
    <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
</body>
</html>