<?php
include '../includes/db.php';
include '../includes/auth.php';
verificarAutenticacion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $objetivos = $_POST['objetivos'];
    $descripcion = $_POST['descripcion'];
    
    $stmt = $pdo->prepare("
        INSERT INTO proyectos 
        (n_proyecto, objetivos, descripcion, estado_proyecto, id_usuario) 
        VALUES (?, ?, ?, 'Activo', ?)
    ");
    $stmt->execute([$nombre, $objetivos, $descripcion, $_SESSION['id_usuario']]);
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre del proyecto" required>
        <input type="text" name="objetivos" placeholder="Objetivos">
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <button type="submit">Crear</button>
    </form>
</body>
</html>