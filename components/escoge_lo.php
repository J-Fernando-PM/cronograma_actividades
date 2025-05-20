<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos generales */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #121212; /* Fondo oscuro elegante */
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  color: #f5f5f5;
}

.home-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  max-width: 900px;
  width: 100%;
  max-width: 100vw;
  padding: 10px;
}

/* Tarjetas elegantes */
.card {
  width: 100%;
  max-width: 350px;
  background: #1c1c1e; /* Fondo de tarjeta oscuro */
  border-radius: 12px;
  box-shadow: 0 6px 12px rgba(212, 175, 55, 0.15); /* Sombra dorada sutil */
  overflow: hidden;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid #2c2c2e;
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 16px rgba(212, 175, 55, 0.3);
}

.card img {
  width: 130px;
  height: 130px;
  object-fit: cover;
  margin-top: 20px;
  border-radius: 50%;
  border: 2px solid #d4af37;
}

/* Contenido de tarjeta */
.card-content {
  padding: 20px;
}

.card-content h3 {
  font-size: 20px;
  color: #d4af37; /* Dorado */
  margin-bottom: 10px;
}

.card-content p {
  font-size: 14px;
  color: #c0c0c0; /* Gris claro para texto */
}

/* Enlaces dentro de las tarjetas */
.card a {
  text-decoration: none;
  color: inherit;
  display: block;
  transition: color 0.3s ease;
}

.card a:hover .card-content h3 {
  color: #f0d675;
}

.card a:hover .card-content p {
  color: #e0e0e0;
}


    </style>
</head>

<body>
   
    <div class="home-container">
        <div class="card">
            <a href="Login_Lider.php">
                <img src="../Img/lider.png" alt="Líder">
                <div class="card-content">
                    <h3>Entrar como Líder</h3>
                    <p>Lidera con claridad: organiza tu equipo, define actividades y lleva tu proyecto al siguiente nivel.</p>
                </div>
            </a>
        </div>
        <div class="card">
            <a href="Login_Admin.php">
                <img src="../Img/admi.png" alt="Administrador">
                <div class="card-content">
                    <h3>Entrar como Administrador</h3>
                    <p>Toma el control desde el principio: impulsa nuevos proyectos y elige a quienes los llevarán al éxito.</p>
                </div>
            </a>
        </div>
        <div class="card">
            <a href="Login_Usuario.php">
                <img src="../Img/operario.png" alt="Operario">
                <div class="card-content">
                    <h3>Entrar como Usuario</h3>
                    <p>Consulta fácilmente tus proyectos asignados, gestiona tus tareas y colabora con tu equipo sin complicaciones.</p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
