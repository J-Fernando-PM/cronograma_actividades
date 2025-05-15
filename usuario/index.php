<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 3) {
    header("Location: ../login.php");
    exit();
}
echo "Bienvenido Usuario: " . $_SESSION['nombre'];
?>
<a href="../logout.php">Cerrar sesión</a>