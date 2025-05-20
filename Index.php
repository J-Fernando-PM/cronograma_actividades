<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkPilot</title>
    <style>
        :root {
            --fondo-oscuro: #000000;
            --dorado-principal: #D4AF37;
            --dorado-secundario: #FFD700;
            --texto-blanco: #FFFFFF;
            --texto-gris: #CCCCCC;
        }

        body {
            background-color: var(--fondo-oscuro);
            color: var(--texto-blanco);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: var(--dorado-principal);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h2 {
            color: var(--dorado-secundario);
            font-size: 3.5rem;
            margin-top: 0;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(212, 175, 55, 0.3);
            transition: all 0.3s ease;
        }

        h2:hover {
            text-shadow: 0 4px 8px rgba(212, 175, 55, 0.5);
        }

        .lead {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.25rem;
            line-height: 1.6;
            max-width: 800px;
            margin: 2rem 0;
            padding: 1rem;
            border-left: 3px solid var(--dorado-principal);
        }

        /* Botón elegante */
        .btn-elegante {
            background-color: var(--dorado-principal);
            color: var(--fondo-oscuro);
            border: none;
            padding: 14px 28px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-elegante:hover {
            background-color: var(--dorado-secundario);
            color: var(--texto-blanco);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(212, 175, 55, 0.4);
        }

        a {
            text-decoration: none;
            color: var(--dorado-principal);
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--dorado-secundario);
        }
        :root {
    --fondo-oscuro: #000000;
    --dorado-principal: #D4AF37;
    --dorado-secundario: #FFD700;
    --texto-blanco: #FFFFFF;
    --texto-gris: #CCCCCC;
}

/* Fuerza el fondo negro en todos los elementos */
body, .container, .lead, h1, h2 {
    background-color: var(--fondo-oscuro) !important;
    color: var(--texto-blanco) !important;
}

.lead {
    opacity: 0.9;
    border-left: 3px solid var(--dorado-principal);
    /* Elimina cualquier fondo heredado */
    background: transparent !important;
}
    </style>
</head>

<body>
    <?php include 'components/Navbar.php'; ?>

    <div class="container">
        <br>
        <h1>Bienvenido a</h1>
        <h2>WorkPilot</h2>
        <br>
        <p class="lead">WorkPilot es una plataforma integral diseñada para planificar, organizar y optimizar todos tus proyectos.
             Permite un control eficiente de los usuarios, equipos de trabajo, tareas, cronogramas, tiempos estimados y horas reales utilizadas. Con WorkPilot,
             podrás llevar un seguimiento claro y ordenado de cada etapa del proyecto, mejorando la productividad y facilitando la toma de decisiones.</p>
       
    </div>

    <?php include 'components/Footer.php'; ?>
</body>

</html>
