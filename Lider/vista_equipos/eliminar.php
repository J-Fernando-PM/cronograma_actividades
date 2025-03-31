<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = mysqli_connect("localhost","root","","gestor_proyectos") or die("Error");
    $id = mysqli_real_escape_string($conexion, $_POST['id']);
    
    // Consulta de eliminación
    $query = "DELETE FROM equipos WHERE id = $id";
    mysqli_query($conexion, $query);
    
    mysqli_close($conexion);
    header("Location: lista_equipos.php"); // Redirige al listado
    exit();
}
?>