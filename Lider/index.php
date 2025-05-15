<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 2) {
    header("Location: ../login.php");
    exit();
}
echo "Bienvenido Lider: " . $_SESSION['nombre'];
?>
<a href="../logout.php">Cerrar sesión</a>