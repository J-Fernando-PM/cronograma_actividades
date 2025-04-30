<?php
function verificarAutenticacion() {
    if (!isset($_SESSION['id_usuario'])) {
        header('Location: ../login.php');
        exit();
    }
}

// Hashear contraseñas (usar en register.php)
function hashContrasena($contrasena) {
    return password_hash($contrasena, PASSWORD_DEFAULT);
}
?>