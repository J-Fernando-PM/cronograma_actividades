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

        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: var(--fondo-oscuro);
        }

        .content {
            flex: 1;
        }

        footer {
            background-color: var(--fondo-oscuro) !important;
            border-top: 2px solid var(--dorado-principal);
            padding: 3rem 0 0;
            margin-top: auto;
        }

        .footer-heading {
            color: var(--dorado-principal) !important;
            font-size: 1.5rem;
            font-weight: 600;
            border-left: 3px solid var(--dorado-principal);
            padding-left: 1rem;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }

        .footer-text {
            color: var(--texto-gris);
            line-height: 1.7;
            max-width: 300px;
        }

        .footer-link {
            color: var(--texto-gris) !important;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 0.8rem;
        }

        .footer-link:hover {
            color: var(--dorado-secundario) !important;
            transform: translateX(5px);
        }

        .footer-icon {
            color: var(--dorado-principal);
            margin-right: 0.8rem;
            width: 20px;
        }

        .copyright {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--texto-gris);
            padding: 1.5rem 0;
            margin-top: 3rem;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
        }
    </style>
</head>

<body>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Información de la empresa -->
                <div class="col-md-4 mb-4">
                    <h4 class="footer-heading">WorkPilot</h4>
                    <p class="footer-text">Gestiona tus proyectos con eficiencia, organizando equipos, actividades y tiempos en una plataforma pensada para optimizar cada etapa del proceso.</p>
                </div>

                <!-- Sección de contacto -->
                <div class="col-md-4 mb-4">
                    <h4 class="footer-heading">Contacto</h4>
                    <div class="d-flex flex-column">
                        <a href="#" class="footer-link">
                            <i class="fas fa-map-marker-alt footer-icon"></i>
                            Av. Innovación 123, CDMX
                        </a>
                        <a href="tel:+525512345678" class="footer-link">
                            <i class="fas fa-phone footer-icon"></i>
                            +52 55 1234 5678
                        </a>
                        <a href="mailto:info@workpilot.com" class="footer-link">
                            <i class="fas fa-envelope footer-icon"></i>
                            info@workpilot.com
                        </a>
                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="col-md-4 mb-4">
                    <h4 class="footer-heading">Síguenos</h4>
                    <div class="d-flex flex-column">
                        <a href="#" class="footer-link">
                            <i class="fab fa-linkedin footer-icon"></i>
                            LinkedIn
                        </a>
                        <a href="#" class="footer-link">
                            <i class="fab fa-twitter footer-icon"></i>
                            Twitter
                        </a>
                        <a href="#" class="footer-link">
                            <i class="fab fa-github footer-icon"></i>
                            GitHub
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row copyright">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 WorkPilot. Todos los derechos reservados</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Iconos FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>