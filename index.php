<?php
include 'includes/db.php';
include 'includes/auth.php';
verificarAutenticacion();

$stmt = $pdo->prepare("SELECT * FROM proyectos WHERE id_usuario = ?");
$stmt->execute([$_SESSION['id_usuario']]);
$proyectos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Tus Proyectos</h1>
    <a href="proyectos/crear.php">Nuevo Proyecto</a>
    <a href="logout.php">Cerrar sesión</a>
    <ul>
        <?php foreach ($proyectos as $proyecto): ?>
            <li>
                <a href="proyectos/detalle.php?id=<?= $proyecto['id_proyecto'] ?>">
                    <?= htmlspecialchars($proyecto['n_proyecto']) ?>
                </a>
                (<?= $proyecto['estado_proyecto'] ?>)
                <a href="proyectos/editar.php?id=<?= $proyecto['id_proyecto'] ?>">Editar</a>
                <a href="proyectos/eliminar.php?id=<?= $proyecto['id_proyecto'] ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>