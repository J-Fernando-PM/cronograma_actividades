<?php
include "../modelo/conexion.php";

$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

$consulta = "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'";

$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    header("location: index.php");
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>