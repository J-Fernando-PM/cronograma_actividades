<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<nav>
  <a href="index.html">Inicio</a>
  <?php if (isset($_SESSION['userId'])): ?>
    <span>Bienvenido, <?php echo $_SESSION['userId']; ?> (<?php echo $_SESSION['rol']; ?>)</span>
    <a href="logout.php">Cerrar sesión</a>
  <?php else: ?>
    <a href="login.php">Iniciar sesión</a>
  <?php endif; ?>
</nav>