<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Líder') {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard Líder</title></head>
<body>
  <?php include 'navbar.php'; ?>
  <h1>Panel de Líder</h1>
  <p>Bienvenido, <?php echo $_SESSION['userId']; ?>.</p>
</body>
</html>