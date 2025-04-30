<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();
    
    // Verifica si el usuario existe y si la contraseña coincide
    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        header('Location: index.php');
        exit(); // Añade exit() para evitar ejecución adicional
    } else {
        $error = "Correo o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <form method="POST">
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
    <a href="register.php">Registrarse</a>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>